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


    public function index() {
        
       return view('student_registration/registration-page');
    }
        public function add_registration()
        {
            $page_session = \Config\Services::session();
 
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/student-registration');
        }
            if ($this->request->getMethod() === 'post') {

                $aadhar = clean_name($this->request->getVar('student_aadhar_number'));

                $allAadhar = $this->modelstudentregistration->findColumn('student_aadhar_number');

                if ($allAadhar && in_array($aadhar, $allAadhar)) {
                    $page_session->setTempdata('error', 'This Aadhar Number is already registered!', 4);
                    return redirect()->back();
                }

                $insert_data = [
                    'student_first_name'    => clean_name($this->request->getVar('student_first_name')),
                    'student_middle_name'   => clean_name($this->request->getVar('student_middle_name')),
                    'student_last_name'     => clean_name($this->request->getVar('student_last_name')),
                    'student_aadhar_number' => $aadhar,
                    'student_password'  => password_hash($this->request->getVar('student_password'), PASSWORD_DEFAULT),

                    
                ];

                $insert = $this->modelstudentregistration->save($insert_data);
                $insertId =$this->modelstudentregistration->getInsertID();
                $newRiseNo = 'S20261010000' . $insertId;
                $this->modelstudentregistration->update($insertId, ['student_rise_no' => $newRiseNo]);

                if ($insert) {
                    $page_session->setTempdata(
                        'success',
                        'Account created successfully! Please Login. Your Rise No is: <b>' . $newRiseNo . '</b>',
                        4
                    );
                } else {
   

                    return view('student_registration/registration-page', ['errors' => $this->modelstudentregistration->errors()]);
                 }

                return redirect()->to('/student-registration');
            }
           

        }
}
