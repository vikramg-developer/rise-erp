<?php

namespace App\Controllers;

class Login extends BaseController {

    public $ModelStudentRegistration;
    public $ModelFacultyRegistration;
    public $ModelParentsRegistration;
//    public $ModelRegistration;

    public function __construct() {
        $this->ModelFacultyRegistration = model('ModelFacultyRegistration');
        $this->ModelStudentRegistration = model('ModelStudentRegistration');        
        $this->ModelParentsRegistration = model('ModelParentsRegistration');
    }

    public function login() {
        return view('login/login-page');
    }

    public function student_dashboard() {
        render_page('login/student-dashboard');
    }

    public function check_user() {
//        $session = session();
//        $request = $this->request;
        $data=[];
        if($this->request->getMethod()=='post'){
            $user_type=$this->request->getVar('user_type');                   
            $rise_no = $this->request->getVar('login_username');
            $password = $this->request->getVar('login_password');             
            
//            $user_exist;
            if($user_type==1){
                
                $userdata=$this->ModelFacultyRegistration->verify_rise_no($data);
                if($userdata){
                    if(password_verify($password,$userdata['password']))
                    {
                        render_page(student/faculty-dashboard);
                    }
                    else
                    {
                        $this->session->setTempdata('error','sorry!Wrong Password',3);       
                        return redirect()->to(current_url());
                    }
                }
                else{                    
                    $this->session->setTempdata('error','sorry!login unsuccessfull',3);       
                    return redirect()->to(current_url());
                }
                
            }
//            elseif($user_type==2){
//                $user_exist=$this->ModelStudentRegistration->check_user($data);
//                if($user_exist){
//                    render_page(student/student-dashboard);
//                }
//                else{
//                    return view('login/login-page',['errors'=>$this->ModelStudentRegistration->errors()]);
//                }
//            }
//            elseif($user_type==3){
//                $user_exist=$this->ModelParentsRegistration->check_user($data);
//                if($user_exist){
//                    render_page(parents/parents-dashboard);
//                }
//                else{
//                    return view('login/login-page',['errors'=>$this->ModelFacultyRegistration->errors()]);
//                }
//            }
            
            
        }
        else{
            $this->session->setTempdata('error','sorry!login unsuccessfull',3);
            return view('login/login-page');
            return redirect()->to(current_url());
        }
        
        

//        $user = $this->ModelLogin->check_user($riseNo, $password);
//
//        if (!$user) {
//            // no such rise number
//            $session->setTempdata('error', 'Invalid Rise No or password.', 4);
//            return redirect()->back()->withInput();
//        }
//        $sessionData = [
////            'student_id' => $user->STUDENT_REGISTRATION_ID,
////            'rise_no' => $user->student_rise_no,
////            'isLoggedIn' => true,
////                 add other user info as needed
//        ];
//        $session->set($sessionData);
//        $session->setTempdata('success', 'Login successful. Welcome back!', 4);

//        return redirect()->to(base_url('studentDashboard'));
        
    }
}