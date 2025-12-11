<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

use App\Models\ModelStudentRegistration;


/**
 * Description of StudentRegistration
 *
 * @author Sonal
 */
class StudentRegistration extends BaseController {

    public $modelstudentregistration;

    public function __construct() {
        $this->modelstudentregistration = model('ModelStudentRegistration');
    }

//put your code here
    public function index() {
        
       return view('student_registration/registration-page');
    }
    public function add_registration() {
        if ($this->request->getMethod() == 'post') {
            
//            $lastrise = $this->modelstudentregistration->getLastRiseNo();
            $lastrise = $this->modelstudentregistration->findAll();
            if ($lastrise) {
            $nextRiseNo = $lastrise['student_registration_id'] + 1;
            } else {
                $nextRiseNo = 1; 
            }
            $newRiseNo = 'S20261010000' . $nextRiseNo;
            $insert_data = [
                'student_first_name' => $this->request->getVar('first-name', FILTER_SANITIZE_STRING),
                'student_middle_name' => $this->request->getVar('middle-name', FILTER_SANITIZE_STRING),
                'student_last_name' => $this->request->getVar('last-name', FILTER_SANITIZE_STRING),
                'student_last_name' => $this->request->getVar('last-name', FILTER_SANITIZE_STRING),
                'student_aadhar_number' => $this->request->getVar('aadhar-number', FILTER_SANITIZE_STRING),
                'student_password' => $this->request->getVar('student-password', FILTER_SANITIZE_STRING),
                 'student_rise_no'  => $newRiseNo,
                ];

            $insert = $this->modelstudentregistration->save($insert_data);
            if ($insert) {
            return redirect()->to('/student-registration');
        } else {
            return redirect()->back()->with('error', 'Failed to register');
        }
            
        }
    }

    
}
