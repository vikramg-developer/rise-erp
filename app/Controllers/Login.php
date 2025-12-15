<?php

namespace App\Controllers;

class Login extends BaseController {

    public $ModelStudentRegistration;
    public $ModelFacultyRegistration;
    public $ModelLogin;
//    public $ModelParentsRegistration;
    protected $session;

    public function __construct() {
        $this->session = session();
        $this->ModelStudentRegistration = model('ModelStudentRegistration');
        $this->ModelFacultyRegistration = model('ModelFacultyRegistration');
        $this->ModelLogin = model('ModelLogin');
//        $this->ModelParentsRegistration = model('ModelParentsRegistration');
    }

    public function login() {
        return view('login/login-page');
    }

    public function studentDashboard() {


        if (!$this->session->get('logged_in')) {
            $this->session->setFlashdata('error', 'Please login first');
            return redirect()->to('/login');
        }

        return render_page('student_registration/studentDashboard');
    }

    public function check_user() {
        $data = [];
        $rules = [
            'role_id' => 'required',
            'login_username' => 'required|exact_length[12]',
            'login_password' => 'required'
        ];
        $messages = [
            'role_id' => [
                'required' => 'Please select a role.'
            ],
            'login_username' => [
                'required' => 'Rise number is required.',
                'exact_length' => 'Rise number must be exactly 12 characters.'
            ],
            'login_password' => [
                'required' => 'Password cannot be empty.'
            ]
        ];

        if ($this->request->getMethod() == 'post') {

            if ($this->validate($rules, $messages)) {
                // Validation passed, now process input
                $role_id = clean_name($this->request->getVar('role_id'));
                $username = clean_name($this->request->getVar('login_username'));
                $password = trim($this->request->getVar('login_password'));

                if ($role_id === '1') {
                    $faculty_data = $this->ModelFacultyRegistration->verify_rise_no($username);

                    if ($faculty_data) {
                        if (password_verify($password, $faculty_data['faculty_password'])) {
                            $this->session->set([
                                'faculty_registration_id' => $faculty_data['faculty_registration_id'],
                                'faculty_rise_no' => $faculty_data['faculty_rise_no'],
                                'role_id' => '1',
                                'logged_in' => true,
                                'permissions' => $faculty_data['permissions']
                            ]);
                            return redirect()->to('/student-dashboard');
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

                // You can add other roles here: 2 => Student, 3 => Parent
            } else {
                // Validation failed, go back to login with validation errors and old input
                return redirect()->to('/login')
                                ->withInput()
                                ->with('validation', $this->validator);
            }
        }

        // If someone accesses check_user() directly, redirect to login
        return redirect()->to('/login');
    }

    public function logout() {
        // Destroy all session data
        $this->session->destroy();

        return redirect()->to('/login');
    }
}
