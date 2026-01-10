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
    protected $modelstudentaddressdetails;
    protected $modelpincodedata;
    protected $modelstudentparentdetails;
    protected $modelstudenteducationaldetails;
    protected $modeldepartment;

    public function __construct() {
        $this->modelstudentregistration = model('ModelStudentRegistration');
        $this->modelacademicyear = model('ModelAcademicYear');
        $this->modelstudentpersonalinformation = model('ModelStudentPersonalInformation');
        $this->modelbloodgroup = model('ModelBloodGroup');
        $this->modelreligion = model('ModelReligion');
        $this->modelcaste = model('ModelCaste');
        $this->modelcastecategory = model('ModelCasteCategory');
        $this->modelstudentaddressdetails = model('ModelStudentAddressDetails');
        $this->modelpincodedata = model('ModelPincodeData');
        $this->modelstudentparentdetails = model('ModelStudentParentDetails');
        $this->modelstudenteducationaldetails = model('ModelStudentEducationalDetails');
        $this->modeldepartment = model('ModelDepartment');
    }

    //=============================== Student Profile -Personal Information START===============================
    public function index() {

        $student_registration_id = session()->get('registration_id');
        $data['title'] = lang('App.rise') . "-" . lang('App.student') . " " . lang('App.profile');
        $data['student_registration_data'] = $this->modelstudentregistration->find($student_registration_id);
        $data['student_personalinfo_data'] = $this->modelstudentpersonalinformation->where('student_registration_id', $student_registration_id)->first();
        $data['student_address_data'] = $this->modelstudentaddressdetails->where('student_registration_id', $student_registration_id)->first();
        $data['student_parent_data'] = $this->modelstudentparentdetails->where('student_registration_id', $student_registration_id)->first();
        $data['student_educational_data'] = $this->modelstudenteducationaldetails->where('student_registration_id', $student_registration_id)->first();
        $data['blood_group'] = $this->modelbloodgroup->findAll();
        $data['religion'] = $this->modelreligion->findAll();
        $data['caste'] = $this->modelcaste->findAll();
        $data['caste_category'] = $this->modelcastecategory->findAll();
        $data['department'] = $this->modeldepartment->findAll();
        $data['passing_year'] = $this->modelacademicyear->findAll();

        return render_page('student_profile/student-profile-dashboard', $data);
    }

// Add Personal Information
    public function add_personal_details() {
        $studentRegistrationId = session('registration_id');

        $post = $this->request->getPost();

        //  Existing record
        $existing = $this->modelstudentpersonalinformation->where('student_registration_id', $studentRegistrationId)->first();
        //  Existing contact no
        if (!empty($post['student_contact_no'])) {
            $mobileExists = $this->modelstudentpersonalinformation->where('student_contact_no', $post['student_contact_no'])->where('student_personal_info_id !=', $existing['student_personal_info_id'] ?? 0)->first();
            if ($mobileExists) {
                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => ['student_contact_no' => 'Mobile number already exists'],
                            'csrfHash' => csrf_hash(),
                ]);
            }
        }

        //  Existing email
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
        //  Post data
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
            'student_sport_reserved' => $post['sport_reserv'],
            'student_sport_level' => $post['sport_level'],
        ];
        //  update data
        if ($existing) {
            $data['updated_by'] = session('rise_no');
            $result = $this->modelstudentpersonalinformation->update($existing['student_personal_info_id'], $data);
        }
        //  Insert data
        else {
            $data['student_registration_id'] = $studentRegistrationId;
            $data['added_by'] = session('rise_no');
            $result = $this->modelstudentpersonalinformation->insert($data);
//            if ($result) {
//                $updateResult = $this->modelstudentregistration
//                        ->where('student_registration_id', $studentRegistrationId)
//                        ->set('student_personal_details', 1)
//                        ->update();
//
//                log_message('debug', 'UPDATE RESULT: ' . $updateResult);
//                log_message('debug', (string) $this->modelstudentregistration->db->getLastQuery());
//            }
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

    //=============================== Student Profile -Personal Information END===============================
    //=============================== Student Profile -Address Details START===============================
    public function add_address_details() {
        $studentRegistrationId = session('registration_id');
        $post = $this->request->getPost();
        $existing = $this->modelstudentaddressdetails->where('student_registration_id', $studentRegistrationId)->first();
        $data = [
            'student_permanent_address' => $post['student_permanent_address'],
            'student_permanent_pincode' => $post['student_permanent_pincode'],
            'student_permanent_locality_id' => $post['student_permanent_locality_id'],
            'student_correspondence_address' => $post['student_correspondence_address'],
            'student_correspondence_pincode' => $post['student_correspondence_pincode'],
            'student_correspondence_locality_id' => $post['student_correspondence_locality_id'],
        ];
        if ($existing) {
            $data['updated_by'] = session('rise_no');
            $result = $this->modelstudentaddressdetails->update($existing['student_address_details_id'], $data);
        } else {
            $data['student_registration_id'] = $studentRegistrationId;
            $data['added_by'] = session('rise_no');
            $result = $this->modelstudentaddressdetails->insert($data);
//            if ($result) {
//                $updateResult = $this->modelstudentregistration
//                        ->where('student_registration_id', $studentRegistrationId)
//                        ->set('student_address_details', 1)
//                        ->update();
//
//                log_message('debug', 'UPDATE RESULT: ' . $updateResult);
//                log_message('debug', (string) $this->modelstudentregistration->db->getLastQuery());
//            }
        }
        log_message('debug', (string) $this->modelstudentaddressdetails->db->getLastQuery());
//
        if ($result === false) {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelstudentaddressdetails->errors(),
                        'csrfHash' => csrf_hash(),
            ]);
        }

        return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Address Details saved successfully',
                    'csrfHash' => csrf_hash(),
        ]);
    }

    //=============================== Student Profile -Address Details END===============================
    //=============================== Student Profile -Parent Details START===============================
    public function add_parent_details() {
        $studentRegistrationId = session('registration_id');
        $post = $this->request->getPost();

        $existing = $this->modelstudentparentdetails->where('student_registration_id', $studentRegistrationId)->first();

        $data = [
            'student_mother_name' => $post['student_mother_name'],
            'student_mother_contact' => $post['student_mother_contact'],
            'student_father_contact' => $post['student_father_contact'],
            'student_father_occupation' => $post['student_father_occupation'],
            'student_mother_occupation' => $post['student_mother_occupation'],
            'student_family_income' => $post['student_family_income'],
        ];

        if ($existing) {
            $data['updated_by'] = session('rise_no');
            $result = $this->modelstudentparentdetails->update($existing['student_parent_details_id'], $data);
        } else {
            $data['student_registration_id'] = $studentRegistrationId;
            $data['added_by'] = session('rise_no');
            $result = $this->modelstudentparentdetails->insert($data);

//            if ($result) {
//                $updateResult = $this->modelstudentregistration
//                        ->where('student_registration_id', $studentRegistrationId)
//                        ->set('student_parent_details', 1)
//                        ->update();
//
//                log_message('debug', 'UPDATE RESULT: ' . $updateResult);
//                log_message('debug', (string) $this->modelstudentregistration->db->getLastQuery());
//            }
        }

        log_message('debug', (string) $this->modelstudentparentdetails->db->getLastQuery());

        if ($result === false) {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelstudentparentdetails->errors(),
                        'csrfHash' => csrf_hash(),
            ]);
        }

        return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Parent Details saved successfully',
                    'csrfHash' => csrf_hash(),
        ]);
    }

    //=============================== Student Profile -Parent Details END===============================
    //=============================== Student Profile -Educational Details START===============================
    public function fetch_student_educational_data() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modelstudenteducationaldetails->countAllStudent();

        // FILTERED
        $recordsFiltered = $this->modelstudenteducationaldetails->countFilteredData($search);

        // DATA
        $rows = $this->modelstudenteducationaldetails->getFilteredData($length, $start, $search);

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                $sr_no++,
                $row['student_department_id'],
                $row['student_institution_name'],
                $row['student_institution_university'],
                $row['student_year_of_passing'],
                $row['student_month_of_passing'],
                $row['student_date_of_passing'],
                $row['student_seat_no'],
                $row['student_marking_system'],
                $row['student_total_marks'],
                $row['student_obtain_marks'],
                $row['student_percentage'],
                $row['student_grade'],
            ];
        }

        return $this->response->setJSON([
                    'draw' => $draw,
                    'recordsTotal' => $recordsTotal,
                    'recordsFiltered' => $recordsFiltered,
                    'data' => $data,
                    'csrfHash' => csrf_hash() // send fresh token back
        ]);
    }

    public function add_educational_details() {
        $studentRegistrationId = session('registration_id');

        $existing = $this->modelstudenteducationaldetails->where('student_registration_id', $studentRegistrationId)->first();

        $data = [
            'student_department_id' => $this->request->getPost('student_department_id'),
            'student_institution_name' => $this->request->getPost('student_institution_name'),
            'student_institution_university' => $this->request->getPost('student_institution_university'),
            'student_month_of_passing' => $this->request->getPost('student_month_of_passing'),
            'student_year_of_passing' => $this->request->getPost('student_year_of_passing'),
            'student_seat_no' => $this->request->getPost('student_seat_no'),
            'student_marking_system' => $this->request->getPost('student_marking_system'),
            'student_total_marks' => $this->request->getPost('student_total_marks'),
            'student_obtain_marks' => $this->request->getPost('student_obtain_marks'),
            'student_percentage' => $this->request->getPost('student_percentage'),
            'student_grade' => $this->request->getPost('student_grade'),
            'student_date_of_passing' => $this->request->getPost('student_date_of_passing'),
        ];

        if ($existing) {
            $data['updated_by'] = session('rise_no');
            $result = $this->modelstudenteducationaldetails->update($existing['student_educational_details_id'], $data);
        } else {
            $data['student_registration_id'] = $studentRegistrationId;
            $data['added_by'] = session('rise_no');
            $result = $this->modelstudenteducationaldetails->insert($data);

//            if ($result) {
//                $updateResult = $this->modelstudentregistration
//                        ->where('student_registration_id', $studentRegistrationId)
//                        ->set('student_educational_details', 1)
//                        ->update();
//
//                log_message('debug', 'UPDATE RESULT: ' . $updateResult);
//                log_message('debug', (string) $this->modelstudentregistration->db->getLastQuery());
//            }
        }

        log_message('debug', (string) $this->modelstudenteducationaldetails->db->getLastQuery());

        if ($result === false) {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelstudenteducationaldetails->errors(),
                        'csrfHash' => csrf_hash(),
            ]);
        }

        return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Parent Details saved successfully',
                    'csrfHash' => csrf_hash(),
        ]);
    }

    //=============================== Student Profile -Educational Details END===============================
}
