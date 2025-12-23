<?php

namespace App\Controllers;

class StudentRegistration extends BaseController {

    protected $modelstudentregistration;
    protected $branchModel;
    protected $academicyearModel;
    protected $studentpersonalinformationModel;
    protected $srisecounterModel;
    protected $db;

    public function __construct() {
        $this->modelstudentregistration = model('ModelStudentRegistration');
        $this->branchModel = model('ModelBranch');
        $this->academicyearModel = model('ModelAcademicYear');
        $this->studentpersonalinformationModel = model('ModelStudentPersonalInformation');
        $this->risecounterModel = model('ModelRiseCounter');
        $this->db = \Config\Database::connect();
    }

    public function index() {
        return view('student_registration/registration-page');
    }

//===============================Add Student Registration===============================
    public function add_registration() {
       $session= session();
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('student-registration');
        }
        // Get academic year
        $academic_year_data = $this->academicyearModel->getCurrentAcademicYear();
        $academic_year_id = $academic_year_data['academic_year_id'];

        $rise_counter_data = $this->risecounterModel->where(['user_type_id' => 3, 'academic_year_id' => $academic_year_id])->first();

        if ($rise_counter_data == null) {
            $data = ['user_type_id' => 3,
                'academic_year_id' => $academic_year_id,
                'rise_no' => 1
            ];
            $this->risecounterModel->insert($data);
        }
        $this->db->transBegin();
        try {
//            echo "try";
            // Lock counter row
            $rise_no_counter = $this->risecounterModel->get_rise_no($academic_year_id);
//            echo($this->db->getLastQuery());
//            print_r($rise_no_counter);
            // Branch & year
            $branch = $this->branchModel->getSingleBranch();
            $branchCode = $branch['branch_code'] ?? '000';
            $yearPrefix = substr($academic_year_data['academic_year_name'], 0, 4);

            // Generate RISE NO
            $finalRiseNo = 'S' . $yearPrefix . $branchCode . str_pad($rise_no_counter['rise_no'], 4, '0', STR_PAD_LEFT);
            $studentData = [
                'student_first_name' => clean_name($this->request->getPost('student_first_name')),
                'student_middle_name' => clean_name($this->request->getPost('student_middle_name')),
                'student_last_name' => clean_name($this->request->getPost('student_last_name')),
                'student_aadhar_number' => $this->request->getPost('student_aadhar_number'),
                'student_password' => $this->request->getPost('student_password'),
                'student_role_id' => 3,
                'student_rise_no' => $finalRiseNo
            ];

//        // Validate
            if (!$this->modelstudentregistration->insert($studentData)) {
                return redirect()->back()
                                ->withInput()
                                ->with('errors', $this->modelstudentregistration->errors());
            }

            $insert_id = $this->modelstudentregistration->getInsertId();
            if ($insert_id) {
                $update_data = ['rise_no' => ($rise_no_counter['rise_no'] + 1)];
                $this->risecounterModel->update($rise_no_counter['rise_number_counter_id'], $update_data);
            }
            if ($this->db->transStatus() === false) {
                throw new\Exception('Registration Failed.');
            }
            $this->db->transCommit();
            $session->getFlashdata(
            'success',
            'Registration successful! Your Rise No is <b>' . $finalRiseNo . '</b>',
            5
        );
//            return true;
        } catch (\Throwable $e) {
            $this->db->transRollback();
             $session->getFlashdata(
            'error',
            'Registration failed: ' . $e->getMessage(),
            5
        );
//            return false;
        }


        return redirect()->to('student-registration');
    }

//===============================Add Student Registration===============================
//public function add_registration()
//{
//    $session = \Config\Services::session();
//
//    if ($this->request->getMethod() !== 'post') {
//        return redirect()->to('student-registration');
//    }
//
//    $this->db->transBegin();
//
//    try {
//
//        // Get academic year
//        $academic_year_data = $this->academicyearModel->getCurrentAcademicYear();
//        $academic_year_id   = $academic_year_data['academic_year_id'];
//        
////        print_r($academic_year_id);die();
//        // Ensure counter exists
//        $this->db->query(
//            "INSERT IGNORE INTO rise_number_counter (user_type_id, academic_year_id,rise_no)
//             VALUES (?, ?, ?)",
//            [3, $academic_year_id, 1]
//        );
//
//        // Lock counter row
//        $counter = $this->db->query(
//            "SELECT rise_no FROM rise_number_counter
//             WHERE user_type_id = ? AND academic_year_id = ?
//             FOR UPDATE",
//            [3, $academic_year_id]
//        )->getRowArray();
//
//        if (!$counter) {
//            throw new \Exception('Rise counter missing');
//        }
//
//        $currentRise = (int) $counter['rise_no'];
//
//        // Branch & year
//        $branch     = $this->branchModel->getSingleBranch();
//        $branchCode = $branch['branch_code'] ?? '000';
//          $yearPrefix       = substr($academic_year_data['academic_year_name'], 0, 4);
//
//        // Generate RISE NO
//        $finalRiseNo = 'S' . $yearPrefix . $branchCode . str_pad($currentRise, 4, '0', STR_PAD_LEFT);
//
//        // Student data WITH RISE NO
//        $studentData = [
//            'student_first_name'     => clean_name($this->request->getPost('student_first_name')),
//            'student_middle_name'    => clean_name($this->request->getPost('student_middle_name')),
//            'student_last_name'      => clean_name($this->request->getPost('student_last_name')),
//            'student_aadhar_number'  => $this->request->getPost('student_aadhar_number'),
//            'student_password'       => $this->request->getPost('student_password'),
//            'student_role_id'        => 3,
//            'student_rise_no'        => $finalRiseNo
//        ];
//
//        // Validate
//        if (!$this->modelstudentregistration->validate($studentData)) {
//            return redirect()->back()
//                ->withInput()
//                ->with('errors', $this->modelstudentregistration->errors());
//        }
//
//        // Insert student
//        if (!$this->modelstudentregistration->insert($studentData)) {
//            throw new \Exception(json_encode($this->modelstudentregistration->errors()));
//        }
//
//        // Increment counter
//        $this->db->table('rise_number_counter')
//            ->where('user_type_id', 3)
//            ->where('academic_year_id', $academic_year_id)
//            ->update(['rise_no' => $currentRise + 1]);
//
//        $this->db->transCommit();
//
//        $session->setTempdata(
//            'success',
//            'Registration successful! Your Rise No is <b>' . $finalRiseNo . '</b>',
//            5
//        );
//
//    } catch (\Throwable $e) {
//
//        $this->db->transRollback();
//
//        $session->setTempdata(
//            'error',
//            'Registration failed: ' . $e->getMessage(),
//            5
//        );
//    }
//
//    return redirect()->to('student-registration');
//}
//
//    public function add_registration() {
//        $session = \Config\Services::session();
//
//        if ($this->request->getMethod() !== 'post') {
//            return redirect()->to('student-registration');
//        }
//
//
//        $studentData = [
//            'student_first_name' => clean_name($this->request->getPost('student_first_name')),
//            'student_middle_name' => clean_name($this->request->getPost('student_middle_name')),
//            'student_last_name' => clean_name($this->request->getPost('student_last_name')),
//            'student_aadhar_number' => $this->request->getPost('student_aadhar_number'),
//            'student_password' => $this->request->getPost('student_password'),
//            'student_role_id' => 3,
//        ];
//
//        if (!$this->modelstudentregistration->validate($studentData)) {
//            return redirect()->back()
//                            ->withInput()
//                            ->with('errors', $this->modelstudentregistration->errors());
//        }
//
//
//        $this->db->transBegin();
//
//        try {
//
//
//            if (!$this->modelstudentregistration->insert($studentData)) {
//                throw new \Exception(json_encode($this->modelstudentregistration->errors()));
//            }
//
//            $insertId = $this->modelstudentregistration->getInsertID();
//            $academic_year_data = $this->academicyearModel->getCurrentAcademicYear();
//            $academic_year_id = $academic_year_data['academic_year_id'];
//
//            $this->db->query(
//                    "INSERT IGNORE INTO rise_number_counter
//                 (user_type_id, academic_year_id, rise_no)
//                 VALUES (?, ?, ?)",
//                    [3, $academic_year_id, 1]
//            );
//
//            $counter = $this->db->query(
//                            "SELECT rise_no
//                 FROM rise_number_counter
//                 WHERE user_type_id = ? AND academic_year_id = ?
//                 FOR UPDATE",
//                            [3, $academic_year_id]
//                    )->getRowArray();
//
//            if (!$counter) {
//                throw new \Exception('Rise counter missing');
//            }
//
//            $currentRise = (int) $counter['rise_no'];
//            $nextRise = $currentRise + 1;
//            $branch = $this->branchModel->getSingleBranch();
//
//            $branchCode = $branch['branch_code'] ?? '000';
//
//            $year = date('Y');
//
//            $finalRiseNo = 'S' . $year . $branchCode . str_pad($currentRise, 4, '0', STR_PAD_LEFT);
//
//            $this->modelstudentregistration
//                    ->skipValidation(true)
//                    ->update($insertId, [
//                        'student_rise_no' => $finalRiseNo
//            ]);
//
//            $this->db->table('rise_number_counter')
//                    ->where('user_type_id', 3)
//                    ->where('academic_year_id', $academic_year_id)
//                    ->update(['rise_no' => $nextRise]);
//
//            $this->db->transCommit();
//
//            $session->setTempdata(
//                    'success',
//                    'Registration successful! Your Rise No is <b>' . $finalRiseNo . '</b>',
//                    5
//            );
//        } catch (\Throwable $e) {
//
//
//            $this->db->transRollback();
//
//            $session->setTempdata(
//                    'error',
//                    'Registration failed: ' . $e->getMessage(),
//                    5
//            );
//        }
//
//        return redirect()->to('student-registration');
//    }
    //=============================== Student Profile===============================
    public function student_Profile() {

        $student_registration_id = session()->get('registration_id');
//    print_r($student_registration_id);die();


        $StudentRegistrationData = $this->modelstudentregistration
                ->where('student_registration_id', $student_registration_id)
                ->first();

        return render_page(
                'student_registration/student-profile',
                ['StudentRegistrationData' => $StudentRegistrationData]
        );
    }
}
