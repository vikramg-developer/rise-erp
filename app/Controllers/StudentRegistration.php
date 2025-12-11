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
    public function add_registration()
    {
        $page_session = \Config\Services::session();

        if ($this->request->getMethod() === 'post') {

            $aadhar = $this->request->getVar('aadhar-number', FILTER_SANITIZE_STRING);

            $allAadhar = $this->modelstudentregistration->findColumn('student_aadhar_number');

            if ($allAadhar && in_array($aadhar, $allAadhar)) {
                $page_session->setTempdata('error', 'This Aadhar Number is already registered!', 4);
                return redirect()->back();
            }

            $lastrise = $this->modelstudentregistration->getLastRiseNo();
            $newRiseNo = 'S20261010000' . $lastrise;

            $insert_data = [
                'student_first_name'    => $this->request->getVar('first-name', FILTER_SANITIZE_STRING),
                'student_middle_name'   => $this->request->getVar('middle-name', FILTER_SANITIZE_STRING),
                'student_last_name'     => $this->request->getVar('last-name', FILTER_SANITIZE_STRING),
                'student_aadhar_number' => $aadhar,
                'student_password'      => password_hash($this->request->getVar('student-password', FILTER_SANITIZE_STRING),PASSWORD_DEFAULT),
                'student_rise_no'       => $newRiseNo,
            ];

            $insert = $this->modelstudentregistration->save($insert_data);

            if ($insert) {
                $page_session->setTempdata(
                    'success',
                    'Account created successfully! Please Login. Your Rise No is: <b>' . $newRiseNo . '</b>',
                    4
                );
            } else {
                $page_session->setTempdata('error', 'Sorry! Something went wrong. Try again.', 4);
            }

            return redirect()->to('/student-registration');
        }

       
    }
}
