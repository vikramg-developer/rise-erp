<?php   

namespace App\Controllers;

use App\Models\ModelRegistration;

class Registration extends BaseController {

    public $ModelRegistration;

    public function __construct() {
        $this->ModelRegistration = new ModelRegistration();
    }

    public function index() {
//        render_page('registration/student-registration');
        return view('registration/student-registration');
    }

//    public function login() {
////        render_page('registration/student-registration');
//        return view('registration/login-page');
//    }
   
    public function studentProfile() {
//        render_page('registration/student-registration');
        render_page('registration/student-profile');
    }

    public function saveSignup() {
        $session = session();
        $page_session = \Config\Services::session();

        $aadhar = trim($this->request->getVar('aadhar-number'));
        $first = trim($this->request->getVar('first-name'));
        $middle = trim($this->request->getVar('middle-name'));
        $last = trim($this->request->getVar('last-name'));
        $rawPwd = $this->request->getVar('signup-password');

        try {
            $builder = $this->ModelRegistration->builder();
            $builder->where('student_aadhar_number', $aadhar)->where('delete_status !=', 'y');
            log_message('debug', 'Aadhar check SQL: ' . $builder->getCompiledSelect());
        } catch (\Throwable $t) {
            log_message('error', 'Could not compile aadhar check SQL: ' . $t->getMessage());
        }

        $exists = $this->ModelRegistration->checkAadharExists($aadhar);
        $lastRiseNO = $this->ModelRegistration->getRiseNO();
//    print_r($lastRiseNO);
        if ($exists) {
            // stop here — do not proceed to insert
            $session->setTempdata('error', 'You are already registered with this Aadhar number.', 4);
            return redirect()->to(base_url('login'));
        }

        $data = [
            'student_first_name' => $first,
            'student_middle_name' => $middle ?: null,
            'student_last_name' => $last,
            'student_aadhar_number' => $aadhar,
//        'student_password'      => password_hash($rawPwd, PASSWORD_DEFAULT),
            'student_password' => $rawPwd,
            'student_rise_no' => 'S20261010000' . $lastRiseNO,
//        'student_rise_no'       => $aadhar,
        ];
        $rise_no = 'S20261010000' . $lastRiseNO;
        try {
            $result = $this->ModelRegistration->add_registration_data($data);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            log_message('error', 'DB insert exception: ' . $e->getMessage());
            if (stripos($e->getMessage(), 'Duplicate') !== false || stripos($e->getMessage(), '1062') !== false) {
                $result = 'aadhar_exists';
            } else {
                $result = false;
            }
        }

        if ($result === true) {
            $page_session->setTempdata(
                    'success',
                    'Account created successfully! Please Login. Your Rise No is: <b>' . $rise_no . '</b>',
                    4
            );
        } elseif ($result === 'aadhar_exists') {
            $page_session->setTempdata('error', 'Aadhar number already exists. Please login .', 4);
        } else {
            $page_session->setTempdata('error', 'Sorry! Something went wrong. Try again.', 4);
        }
        return redirect()->to(base_url('registration'))->withInput();
    }

    public function authenticate() {
        $session = session();
        $request = $this->request;

        $riseNo = $request->getPost('login-username');
        $password = $request->getPost('login-password');

        $user = $this->ModelRegistration->checkAuthenticate($riseNo, $password);

        if (!$user) {
            // no such rise number
            $session->setTempdata('error', 'Invalid Rise No or password.', 4);
            return redirect()->back()->withInput();
        }
        $sessionData = [
//            'student_id' => $user->STUDENT_REGISTRATION_ID,
//            'rise_no' => $user->student_rise_no,
//            'isLoggedIn' => true,
//                 add other user info as needed
        ];
        $session->set($sessionData);
        $session->setTempdata('success', 'Login successful. Welcome back!', 4);

        // Redirect to dashboard (adjust route)
        return redirect()->to(base_url('studentDashboard'));
    }
}
