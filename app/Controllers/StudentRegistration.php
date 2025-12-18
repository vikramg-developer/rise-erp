<?php

namespace App\Controllers;

use App\Models\ModelStudentRegistration;
use App\Models\ModelBranch;

/**
 * Description of StudentRegistration
 *
 * @author Sonal
 */
class StudentRegistration extends BaseController {

    public $modelstudentregistration;
    public $branchModel;

    public function __construct() {
        $this->modelstudentregistration = model('ModelStudentRegistration');
        $this->branchModel = new ModelBranch();
    }

    public function index() {

        return view('student_registration/registration-page');
    }

    public function add_registration() {
        $page_session = \Config\Services::session();

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('student-registration');
        }
        if ($this->request->getMethod() === 'post') {

            $aadhar = clean_name($this->request->getVar('student_aadhar_number'));
            $allAadhar = $this->modelstudentregistration->findColumn('student_aadhar_number');

            if ($allAadhar && in_array($aadhar, $allAadhar)) {
                $page_session->setTempdata('error', 'This Aadhar Number is already registered!', 4);
                return redirect()->back();
            }

            $insert_data = [
                'student_first_name' => clean_name($this->request->getVar('student_first_name')),
                'student_middle_name' => clean_name($this->request->getVar('student_middle_name')),
                'student_last_name' => clean_name($this->request->getVar('student_last_name')),
                'student_aadhar_number' => $aadhar,
                'student_password' => password_hash($this->request->getVar('student_password'),PASSWORD_DEFAULT),
            ];

            $insert = $this->modelstudentregistration->save($insert_data);
            if (!$insert) {
                return view('student_registration/registration-page', ['errors' => $this->modelstudentregistration->errors()]);
            }
            $insertId = $this->modelstudentregistration->getInsertID();
            $branch = $this->branchModel->getSingleBranch();

            $branchCode = $branch['branch_code'] ?? '000';

            $year = date('Y');
            $serial = str_pad($insertId, 4, '0', STR_PAD_LEFT);

            $newRiseNo = 'S' . $year . $branchCode . $serial;
//                $newRiseNo = 'S20261010000' . $insertId;
            $this->modelstudentregistration->update($insertId, ['student_rise_no' => $newRiseNo]);

            if ($insert) {
                $page_session->setTempdata(
                        'success',
                        'Account created successfully! Please Login. Your Rise No is: <b>' . $newRiseNo . '</b>',4);
            } else {


                return view('student_registration/registration-page', ['errors' => $this->modelstudentregistration->errors()]);
            }

            return redirect()->to('student-registration');
        }
    }
}
