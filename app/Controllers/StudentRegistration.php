<?php

namespace App\Controllers;

use App\Models\ModelStudentRegistration;
use App\Models\ModelBranch;

class StudentRegistration extends BaseController {

    protected $modelstudentregistration;
    protected $branchModel;
    protected $db;

    public function __construct() {
        $this->modelstudentregistration = new ModelStudentRegistration();
        $this->branchModel = new ModelBranch();
        $this->db = \Config\Database::connect();
    }

    public function index() {
        return view('student_registration/registration-page');
    }

    public function add_registration() {
        $session = \Config\Services::session();

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('student-registration');
        }


        $studentData = [
            'student_first_name' => clean_name($this->request->getPost('student_first_name')),
            'student_middle_name' => clean_name($this->request->getPost('student_middle_name')),
            'student_last_name' => clean_name($this->request->getPost('student_last_name')),
            'student_aadhar_number' => $this->request->getPost('student_aadhar_number'),
            'student_password' => $this->request->getPost('student_password'),
            'student_role_id' => 4,
        ];

        if (!$this->modelstudentregistration->validate($studentData)) {
            return redirect()->back()
                            ->withInput()
                            ->with('errors', $this->modelstudentregistration->errors());
        }


        $this->db->transBegin();

        try {


            if (!$this->modelstudentregistration->insert($studentData)) {
                throw new \Exception(json_encode($this->modelstudentregistration->errors()));
            }

            $insertId = $this->modelstudentregistration->getInsertID();

            $this->db->query(
                    "INSERT IGNORE INTO rise_number_counter
                 (user_type_id, academic_year_id, rise_no)
                 VALUES (?, ?, ?)",
                    [4, 36, 1]
            );

            $counter = $this->db->query(
                            "SELECT rise_no
                 FROM rise_number_counter
                 WHERE user_type_id = ? AND academic_year_id = ?
                 FOR UPDATE",
                            [4, 36]
                    )->getRowArray();

            if (!$counter) {
                throw new \Exception('Rise counter missing');
            }

            $currentRise = (int) $counter['rise_no'];
            $nextRise = $currentRise + 1;
            $branch = $this->branchModel->getSingleBranch();

            $branchCode = $branch['branch_code'] ?? '000';

            $year = date('Y');

            $finalRiseNo = 'S' . $year . $branchCode . str_pad($currentRise, 4, '0', STR_PAD_LEFT);

            $this->modelstudentregistration
                    ->skipValidation(true)
                    ->update($insertId, [
                        'student_rise_no' => $finalRiseNo
            ]);

            $this->db->table('rise_number_counter')
                    ->where('user_type_id', 4)
                    ->where('academic_year_id', 36)
                    ->update(['rise_no' => $nextRise]);

            $this->db->transCommit();

            $session->setTempdata(
                    'success',
                    'Registration successful! Your Rise No is <b>' . $finalRiseNo . '</b>',
                    5
            );
        } catch (\Throwable $e) {


            $this->db->transRollback();

            $session->setTempdata(
                    'error',
                    'Registration failed: ' . $e->getMessage(),
                    5
            );
        }

        return redirect()->to('student-registration');
    }
}

//    public function add_registration() {
//        $page_session = \Config\Services::session();
//
//        if ($this->request->getMethod() !== 'post') {
//            return redirect()->to('student-registration');
//        }
//        if ($this->request->getMethod() === 'post') {
//
//            $aadhar = clean_name($this->request->getVar('student_aadhar_number'));
//            $allAadhar = $this->modelstudentregistration->findColumn('student_aadhar_number');
//
//            if ($allAadhar && in_array($aadhar, $allAadhar)) {
//                $page_session->setTempdata('error', 'This Aadhar Number is already registered!', 4);
//                return redirect()->back();
//            }
//
//            $insert_data = [
//                'student_first_name' => clean_name($this->request->getVar('student_first_name')),
//                'student_middle_name' => clean_name($this->request->getVar('student_middle_name')),
//                'student_last_name' => clean_name($this->request->getVar('student_last_name')),
//                'student_aadhar_number' => $aadhar,
//                'student_password' => password_hash($this->request->getVar('student_password'),PASSWORD_DEFAULT),
//            ];
//
//            $insert = $this->modelstudentregistration->save($insert_data);
//            if (!$insert) {
//                return view('student_registration/registration-page', ['errors' => $this->modelstudentregistration->errors()]);
//            }
//            $insertId = $this->modelstudentregistration->getInsertID();
//            $branch = $this->branchModel->getSingleBranch();
//
//            $branchCode = $branch['branch_code'] ?? '000';
//
//            $year = date('Y');
//            $serial = str_pad($insertId, 4, '0', STR_PAD_LEFT);
//
//            $newRiseNo = 'S' . $year . $branchCode . $serial;
////                $newRiseNo = 'S20261010000' . $insertId;
//            $this->modelstudentregistration->update($insertId, ['student_rise_no' => $newRiseNo]);
//
//            if ($insert) {
//                $page_session->setTempdata(
//                        'success',
//                        'Account created successfully! Please Login. Your Rise No is: <b>' . $newRiseNo . '</b>',
//                        4
//                );
//            } else {
//
//
//                return view('student_registration/registration-page', ['errors' => $this->modelstudentregistration->errors()]);
//            }
//
//            return redirect()->to('student-registration');
//        }
//    }
//}
