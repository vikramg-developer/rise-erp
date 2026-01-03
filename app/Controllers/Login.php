<?php

namespace App\Controllers;

class Login extends BaseController {

    protected $modelstudentregistration;
    protected $modelfacultyregistration;
    protected $modellogin;
//    protected $modelParentsRegistration;
//    protected $session;
    protected $modelrole;

    public function __construct() {
//        session() = session();
        $this->modelstudentregistration = model('ModelStudentRegistration');
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
        $this->modellogin = model('ModelLogin');
        $this->modelrole = model('ModelRole');
//        $this->ModelParentsRegistration = model('ModelParentsRegistration');
    }

//    public function login() {
//        return view('login/login-page');
//    }
    public function login() {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        return response()
                        ->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                        ->setHeader('Pragma', 'no-cache')
                        ->setHeader('Expires', '0')
                        ->setBody(view('login/login-page'));
    }

    public function studentDashboard() {
        return render_page('dashboard/student-dashboard');
    }

    public function check_user() {

        $data = [];
        $rules = [
            'user_type' => 'required',
            'login_username' => 'required|exact_length[12]',
            'login_password' => 'required'
        ];
        $messages = [
            'user_type' => [
                'required' => 'Please select a User Type.'
            ],
            'login_username' => [
                'required' => 'Rise number is required.',
                'exact_length' => 'Rise number must be exactly 12 characters.'
            ],
            'login_password' => [
                'required' => 'Password cannot be empty.'
            ]
        ];

        if ($this->validate($rules, $messages)) {
            // Validation passed, now process input
            $user_type = ($this->request->getVar('user_type'));
            $username = ($this->request->getVar('login_username'));
            $password = trim($this->request->getVar('login_password'));
//================================================Faculty Login--start================================================
            if ($user_type === '1') {
                $faculty_data = $this->modelfacultyregistration->verify_rise_no($username);

                if ($faculty_data) {
                    if (password_verify($password, $faculty_data['faculty_password'])) {

                        $role_data = $this->modelrole->find($faculty_data['faculty_role_id']);
                        session()->set([
                            'registration_id' => $faculty_data['faculty_registration_id'],
                            'rise_no' => $faculty_data['faculty_rise_no'],
                            'username' => $faculty_data['faculty_first_name'] . " " . $faculty_data['faculty_last_name'],
                            'role_id' => $faculty_data['faculty_role_id'],
                            'role_name' => $role_data['role_name'],
                            'logged_in' => true,
                            'permissions' => json_decode($role_data['permissions'], true) ?? [],
                            'last_activity' => time(),
                        ]);
                        return redirect()->to('/dashboard');
                    } else {
                        // Wrong password
                        return redirect()->to('/login')
                                        ->with('error', 'Password is Invalid!')
                                        ->withInput();
                    }
                } else {
                    // Rise No not found
                    return redirect()->to('/login')
                                    ->with('error', 'Rise No is Invalid!')
                                    ->withInput();
                }
            }
//================================================Faculty Login--end================================================
//================================================Student Login--start================================================
            if ($user_type === '2') {
                $student_data = $this->modelstudentregistration->verify_rise_no($username);
//                    print_r($student_data);die();
                if ($student_data) {
                    if (password_verify($password, $student_data['student_password'])) {

                        $role_data = $this->modelrole->find($student_data['student_role_id']);
                        session()->set([
                            'registration_id' => $student_data['student_registration_id'],
                            'rise_no' => $student_data['student_rise_no'],
                            'username' => $student_data['student_first_name'] . " " . $student_data['student_last_name'],
                            'role_id' => $student_data['student_role_id'],
                            'role_name' => $role_data['role_name'],
                            'logged_in' => true,
                            'permissions' => json_decode($role_data['permissions'], true) ?? []
                        ]);
                        return redirect()->to('/dashboard');
                    } else {
                        // Wrong password
                        return redirect()->to('/login')
                                        ->with('error', 'Password is Invalid!')
                                        ->withInput();
                    }
                } else {
                    // Rise No not found
                    return redirect()->to('/login')
                                    ->with('error', 'Rise No is Invalid!')
                                    ->withInput();
                }
            }
            //                Student Login--end
        } else {
            // Validation failed, go back to login with validation errors and old input
            return redirect()->to('/login')
                            ->withInput()
                            ->with('validation', $this->validator);
        }
    }

      public function logout() {
        // Destroy all session data
        session()->destroy();

        return redirect()->to('/login');
    }
}
