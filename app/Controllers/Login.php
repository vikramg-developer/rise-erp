<?php

namespace App\Controllers;

class Login extends BaseController {

    public $ModelStudentRegistration;

//    public $ModelFacultyRegistration;
//    public $ModelParentsRegistration;

    public function __construct() {
        $this->ModelStudentRegistration = model('ModelStudentRegistration');
//        $this->ModelFacultyRegistration = model('ModelFacultyRegistration');   
//        $this->ModelParentsRegistration = model('ModelParentsRegistration');
    }

    public function login() {
        return view('login/login-page');
    }

    public function studentDashboard() {
        $session = session();

        if (!$session->get('student_logged_in')) {
            $session->setFlashdata('error', 'Please login first');
            return redirect()->to('/login');
        }

        render_page('student_registration/studentDashboard');
    }

   public function check_user() {
    $session = session();

    // Only allow POST requests
    if ($this->request->getMethod() !== 'post') {
        $session->setFlashdata('error', 'Please login first');
        return redirect()->to('/login');
    }

    $user_type = clean_name($this->request->getVar('user_type'));
    $riseNo = clean_name($this->request->getVar('login_username')); // fixed missing $
    $password = trim($this->request->getVar('login_password'));

    // Fetch student by rise number
    $user = $this->ModelStudentRegistration->verify_rise_no($riseNo);

    if ($user) {
        if (password_verify($password, $user['student_password'])) {
            // Set session data
            $session->set([
                'student_id' => $user['student_registration_id'],
                'rise_no' => $user['student_rise_no'],
                'student_logged_in' => true
            ]);

            // Redirect to dashboard
            return redirect()->to('/studentDashboard'); 
        } else {
            // Password incorrect
            $session->setFlashdata('error', 'Invalid password');
            return redirect()->to('/login');
        }
    } else {
        // Student not found
        $session->setFlashdata('error', 'Student not found');
        return redirect()->to('/login');
    }
}


//    public function check_user() {
//        $session = session();
//        $request = $this->request;
//        $data = [];
//        if ($this->request->getMethod() == 'post') {
//            $user_type = clean_name($this->request->getVar('user_type'));
//            $rise_no = clean_name($this->request->getVar('login_username'));
//            $password = clean_name($this->request->getVar('login_password'));
//
//            if ($user_type == 1) {
//
//                $userdata = $this->ModelFacultyRegistration->verify_rise_no($data);
//                if ($userdata) {
//                    if (password_verify($password, $userdata['password'])) {
//                        render_page('faculty/faculty-dashboard');
//                    } else {
//                        return view('login/login-page', ['errors' => $this->ModelFacultyRegistration->errors()]);
//                    }
//                } else {
//                    return view('login/login-page', ['errors' => $this->ModelFacultyRegistration->errors()]);
//                }
//            } 
//            elseif ($user_type == 2) {
//                $userdata = $this->ModelStudentRegistration->verify_rise_no($data);
//                if ($userdata) {
//                    if (password_verify($password, $userdata['password'])) {
//                        render_page('student/student-dashboard');
//                    } else {
//                        return view('login/login-page', ['errors' => $this->ModelStudentRegistration->errors()]);
//                    }
//                } else {
//                    return view('login/login-page', ['errors' => $this->ModelStudentRegistration->errors()]);
//                }
//            } 
//            elseif ($user_type == 3) {
//                $userdata = $this->ModelParentsRegistration->verify_rise_no($data);
//                if ($userdata) {
//                    if (password_verify($password, $userdata['password'])) {
//                        render_page('parents/parents-dashboard');
//                    } else {
//                        return view('login/login-page', ['errors' => $this->ModelParentsRegistration->errors()]);
//                    }
//                } else {
//                    return view('login/login-page', ['errors' => $this->ModelParentsRegistration->errors()]);
//                }
//            }
//        } 
//        else {
//            $this->session->setTempdata('error', 'Please Login Again', 3);
//            return redirect()->to(current_url());
//        }
//    }
}
