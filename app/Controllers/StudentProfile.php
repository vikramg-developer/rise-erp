<?php

namespace App\Controllers;

class StudentProfile extends BaseController {

    protected $modelstudentregistration;
    protected $modelacademicyear;
    protected $modelstudentpersonalinformation;
    protected $modelbloodgroup;
    protected $modelreligion;
    protected $modelcaste;
    protected $modelcastecategory;

    public function __construct() {
        $this->modelstudentregistration = model('ModelStudentRegistration');
        $this->modelacademicyear = model('ModelAcademicYear');
        $this->modelstudentpersonalinformation = model('ModelStudentPersonalInformation');
        $this->modelbloodgroup = model('ModelBloodGroup');
        $this->modelreligion = model('ModelReligion');
        $this->modelcaste = model('ModelCaste');
        $this->modelcastecategory = model('ModelCasteCategory');
    }

    //=============================== Student Profile===============================
    public function index() {

        $student_registration_id = session()->get('registration_id');
        $data['jspath'] = 'student-profile/student-personal-details';
        $data['title'] = lang('App.rise') . "-" . lang('App.student') . " " . lang('App.profile');
        $data['student_registration_data'] = $this->modelstudentregistration->find($student_registration_id);
        $data['student_personalinfo_data'] = $this->modelstudentpersonalinformation->where('student_registration_id', $student_registration_id)->first();
        $data['blood_group'] = $this->modelbloodgroup->findAll();
        $data['religion'] = $this->modelreligion->findAll();
        $data['caste'] = $this->modelcaste->findAll();
        $data['caste_category'] = $this->modelcastecategory->findAll();
        return render_page('student_profile/student-profile-dashboard', $data);
    }

    public function add_personal_information() {
        $studentRegistrationId = session('registration_id');

        $post = $this->request->getPost();

        //  Existing record
        $existing = $this->modelstudentpersonalinformation
                ->where('student_registration_id', $studentRegistrationId)
                ->first();

        /* ===============================
          DUPLICATE MOBILE CHECK
          ================================ */
        if (!empty($post['student_contact_no'])) {
            $mobileExists = $this->modelstudentpersonalinformation
                    ->where('student_contact_no', $post['student_contact_no'])
                    ->where('student_personal_info_id !=', $existing['student_personal_info_id'] ?? 0)
                    ->first();

            if ($mobileExists) {
                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => ['student_contact_no' => 'Mobile number already exists'],
                            'csrfHash' => csrf_hash(),
                ]);
            }
        }

        /* ===============================
          DUPLICATE EMAIL CHECK
          ================================ */
        if (!empty($post['student_email'])) {
            $emailExists = $this->modelstudentpersonalinformation
                    ->where('student_email', $post['student_email'])
                    ->where('student_personal_info_id !=', $existing['student_personal_info_id'] ?? 0)
                    ->first();

            if ($emailExists) {
                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => ['student_email' => 'Email ID already exists'],
                            'csrfHash' => csrf_hash(),
                ]);
            }
        }

        $data = [
            'student_contact_no' => $post['student_contact_no'],
            'student_email' => clean_email($post['student_email']),
            'student_gender' => $post['student_gender'],
            'student_birthdate' => $post['dob'],
            'student_age' => $post['age'],
            'student_birthplace' => $post['student_birthplace'],
            'student_bloodgroup_id' => $post['student_bloodgroup_id'],
            'student_religion_id' => $post['student_religion_id'],
            'student_category_id' => $post['student_category_id'],
            'student_caste_id' => $post['student_caste_id'],
            'student_subcaste' => $post['student_subcaste'],
            'student_nationality' => $post['student_nationality'],
            'student_marital_status' => $post['student_marital_status'],
            'student_minority' => $post['student_minority'],
            'student_physically_handicap' => $post['student_physically_handicap'],
            'student_physically_handicap_type' => $post['student_physically_handicap_type'],
        ];

       
        if ($existing) {
            $data['updated_by'] = session('rise_no');
            $result = $this->modelstudentpersonalinformation
                    ->update($existing['student_personal_info_id'], $data);
        } else {
            $data['student_registration_id'] = $studentRegistrationId;
            $data['added_by'] = session('rise_no');
            $result = $this->modelstudentpersonalinformation->insert($data);
        }

        if ($result === false) {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelstudentpersonalinformation->errors(),
                        'csrfHash' => csrf_hash(),
            ]);
        }

        return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Personal information saved successfully',
                    'csrfHash' => csrf_hash(),
        ]);
    }

//    public function add_personal_information() {
//        $studentRegistrationId = session('registration_id');
//
////    if (!$studentRegistrationId) {
////        return $this->response->setJSON([
////            'status' => 'error',
////            'message' => 'Session expired. Registration ID missing.',
////        ]);
////    }
//
//        $data = [
//            'student_contact_no' => $this->request->getVar('student_contact_no'),
//            'student_email' => clean_email($this->request->getVar('student_email')),
//            'student_gender' => clean_name($this->request->getVar('student_gender')),
//            'student_bloodgroup_id' => clean_name($this->request->getVar('student_bloodgroup_id')),
//            'student_birthdate' => $this->request->getVar('dob'),
//            'student_age' => $this->request->getVar('age'),
//            'student_birthplace' => clean_name($this->request->getVar('student_birthplace')),
//            'student_religion_id' => clean_name($this->request->getVar('student_religion_id')),
//            'student_category_id' => clean_name($this->request->getVar('student_category_id')),
//            'student_caste_id' => clean_name($this->request->getVar('student_caste_id')),
//            'student_subcaste' => clean_name($this->request->getVar('student_subcaste')),
//            'student_nationality' => clean_name($this->request->getVar('student_nationality')),
//            'student_marital_status' => clean_name($this->request->getVar('student_marital_status')),
//            'student_minority' => clean_name($this->request->getVar('student_minority')),
//            'student_physically_handicap' => clean_name($this->request->getVar('student_physically_handicap')),
//            'updated_by' => session('rise_no'),
//        ];
//
//        // 🔍 Fetch existing record
//        $existing = $this->modelstudentpersonalinformation
//                ->where('student_registration_id', $studentRegistrationId)
//                ->first();
//
//        if ($existing) {
//
//            //  UPDATE 
//            $result = $this->modelstudentpersonalinformation
//                    ->update($existing['student_personal_info_id'], $data);
//        } else {
//
//            // INSERT
//            $data['student_registration_id'] = $studentRegistrationId;
//            $data['added_by'] = session('rise_no');
//
//            $result = $this->modelstudentpersonalinformation->insert($data);
//        }
//
//        //  VALIDATION ERROR
//        if ($result === false) {
//            return $this->response->setJSON([
//                        'status' => 'error',
//                        'errors' => $this->modelstudentpersonalinformation->errors(),
//                        'csrfHash' => csrf_hash(),
//            ]);
//        }
//
//
//        log_message('debug', (string) $this->modelstudentpersonalinformation->db->getLastQuery());
//
//        return $this->response->setJSON([
//                    'status' => 'success',
//                    'message' => 'Personal information saved successfully.',
//                    'csrfHash' => csrf_hash(),
//        ]);
//    }
}
