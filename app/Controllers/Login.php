<?php   

namespace App\Controllers;

use App\Models\ModelLogin;

class Login extends BaseController {

    public $ModelLogin;

    public function __construct() {
        $this->ModelLogin= new ModelLogin();
    }

    public function login() {
        return view('registration/login-page');
    }
     public function studentDashboard() {
        render_page('registration/studentDashboard');
    }
   

    public function checkuser() {
        $session = session();
        $request = $this->request;

        $riseNo = $request->getPost('login-username');
        $password = $request->getPost('login-password');

        $user = $this->ModelLogin->checkuser($riseNo, $password);

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

        return redirect()->to(base_url('studentDashboard'));
    }
}
