<?php

namespace App\Controllers;

class StudentProfile extends BaseController {

    protected $modelstudentregistration;
    protected $modelacademicyear;
    protected $modelstudentpersonalinformation;
    protected $modelbloodgroup;
    protected $modelreligion;

    public function __construct() {
        $this->modelstudentregistration = model('ModelStudentRegistration');
        $this->modelacademicyear = model('ModelAcademicYear');
        $this->modelstudentpersonalinformation = model('ModelStudentPersonalInformation');
        $this->modelbloodgroup = model('ModelBloodGroup');
        $this->modelreligion = model('ModelReligion');
    }

    //=============================== Student Profile===============================
    public function index() {

        $student_registration_id = session()->get('registration_id');
        $data['jspath'] = 'student-profile/student-personal-details';
        $data['title'] = lang('App.rise') . "-" . lang('App.student') . " " . lang('App.profile');
        $data['student_registration_data'] = $this->modelstudentregistration->find($student_registration_id);
        $data['student_personalinfo_data'] = $this->modelstudentpersonalinformation->find($student_registration_id);
        $data['blood_group'] = $this->modelbloodgroup->findAll();
        $data['religion'] = $this->modelreligion->findAll();
        return render_page('student_profile/student-profile-dashboard',$data);
    }

    public function add_personal_information() {
        $post = $this->request->getPost();
        $studentRegistrationId = session('registration_id');
        $insertData = [
            'student_registration_id' => $studentRegistrationId,
            'student_mobile_no' => $this->request->getVar('student_mobile_no'),
            'student_email_id' => clean_email($this->request->getVar('student_email_id')),
            'student_gender' => clean_name($this->request->getVar('student_gender')),
            'student_bloodgroup' => clean_name($this->request->getVar('student_bloodgroup')),
            'student_birthdate' => clean_name($this->request->getVar('student_birthdate')),
            'student_birthplace' => clean_name($this->request->getVar('student_birthplace')),
            'student_religion_id' => clean_name($this->request->getVar('student_religion_id')),
            'student_category_id' => clean_name($this->request->getVar('student_category_id')),
            'student_caste_id' => clean_name($this->request->getVar('student_caste_id')),
            'student_subcaste_id' => clean_name($this->request->getVar('student_subcaste_id')),
            'student_nationality_id' => clean_name($this->request->getVar('student_nationality_id')),
            'student_marital_status' => clean_name($this->request->getVar('student_marital_status')),
            'student_minority_id' => clean_name($this->request->getVar('student_minority_id')),
            'student_physically_handicap_id' => clean_name($this->request->getVar('student_physically_handicap_id')),
//            'student_aadhar_number' => clean_number($this->request->getVar('student_aadhar_number')),
            'added_by' => session('rise_no'),
        ];

        $student_data = $this->modelstudentpersonalinformation->verify_student_data($studentRegistrationId);
        if ($student_data) {
            $this->modelstudentpersonalinformation->update($studentRegistrationId, $insertData);
            $this->modelstudentpersonalinformation->where('student_registration_id', $studentRegistrationId)->set($insertData)->update();
        } else {
            if (!$this->modelstudentpersonalinformation->insert($insertData)) {
                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => $this->modelstudentpersonalinformation->errors(),
                            'csrfHash' => csrf_hash(),
                ]);
            }
        }

        log_message('debug', $this->modelstudentpersonalinformation->db->getLastQuery()->getQuery());
        return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Personal Details added successfully.',
                    'csrfHash' => csrf_hash(),
        ]);
    }
}
