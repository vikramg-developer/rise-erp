<?php

namespace App\Controllers;

use App\Models\ModelStudentRegistration;
use App\Models\ModelBranch;
use App\Models\ModelAcademicYear;
use App\Models\ModelStudentPersonalInformation;

class StudentRegistration extends BaseController {

    protected $modelstudentregistration;
    protected $branchModel;
    protected $academicyearModel;
    protected $studentpersonalinformationModel;
    protected $db;

    public function __construct() {
        $this->modelstudentregistration = new ModelStudentRegistration();
        $this->branchModel = new ModelBranch();
        $this->academicyearModel = new ModelAcademicYear();
        $this->studentpersonalinformationModel = new ModelStudentPersonalInformation();
        $this->db = \Config\Database::connect();
    }

    public function index() {
        return view('student_registration/registration-page');
    }

//===============================Add Student Registration===============================
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
            'student_role_id' => 3,
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
            $academic_year_data = $this->academicyearModel->getCurrentAcademicYear();
            $academic_year_id = $academic_year_data['academic_year_id'];

            $this->db->query(
                    "INSERT IGNORE INTO rise_number_counter
                 (user_type_id, academic_year_id, rise_no)
                 VALUES (?, ?, ?)",
                    [3, $academic_year_id, 1]
            );

            $counter = $this->db->query(
                            "SELECT rise_no
                 FROM rise_number_counter
                 WHERE user_type_id = ? AND academic_year_id = ?
                 FOR UPDATE",
                            [3, $academic_year_id]
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
                    ->where('user_type_id', 3)
                    ->where('academic_year_id', $academic_year_id)
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

    //=============================== Student Profile===============================
    public function student_Profile()
{
        
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
