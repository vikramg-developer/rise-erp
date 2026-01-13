<?php

namespace App\Controllers;

class StudentRegistration extends BaseController {

    protected $modelstudentregistration;
    protected $modelbranch;
    protected $modelacademicyear;
    protected $modelstudentpersonalinfo;
    protected $modelrisecounter;
    protected $db;

    public function __construct() {
        $this->modelstudentregistration = model('ModelStudentRegistration');
        $this->modelbranch = model('ModelBranch');
        $this->modelacademicyear = model('ModelAcademicYear');
        $this->modelstudentpersonalinfo = model('ModelStudentPersonalInformation');
        $this->modelrisecounter = model('ModelRiseCounter');
        $this->db = \Config\Database::connect();
    }

    public function index() {
        return view('student_registration/registration-page');
    }

//===============================Add Student Registration===============================
    public function add_registration() {
        $session = session();
        
        // Get academic year
        $academic_year_data = $this->modelacademicyear->getCurrentAcademicYear();
        $academic_year_id = $academic_year_data['academic_year_id'];

        $rise_counter_data = $this->modelrisecounter->where(['user_type_id' => 3, 'academic_year_id' => $academic_year_id])->first();

        if ($rise_counter_data == null) {
            $data = ['user_type_id' => 3,
                'academic_year_id' => $academic_year_id,
                'rise_no' => 1
            ];
            $this->modelrisecounter->insert($data);
        }
        $this->db->transBegin();
        try {
            // Lock counter row
            $rise_no_counter = $this->modelrisecounter->get_rise_no($academic_year_id);
            // Branch & year
            $branch = $this->modelbranch->getSingleBranch();
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
                $this->modelrisecounter->update($rise_no_counter['rise_number_counter_id'], $update_data);
            }
            if ($this->db->transStatus() === false) {
                throw new\Exception('Registration Failed.');
            }
            $this->db->transCommit();
            $session->setFlashdata(
                    'success',
                    'Registration successful! Your Rise No is <b>' . $finalRiseNo . '</b>',
                    5
            );
//            return true;
        } catch (\Throwable $e) {
            $this->db->transRollback();
            $session->setFlashdata(
                    'error',
                    'Registration failed: ' . $e->getMessage(),
                    5
            );
//            return false;
        }


        return redirect()->to('student-registration');
    }
}
