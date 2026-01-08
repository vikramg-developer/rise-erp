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
    protected $modelcountriesdata;
    protected $modelstatedata;
    protected $modeltalukadata;
    protected $modeldistrictdata;

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
        $this->modelcountriesdata = model('ModelCountriesData');
        $this->modelstatedata = model('ModelStateData');
        $this->modeltalukadata = model('ModelTalukaData');
        $this->modeldistrictdata = model('ModelDistrictData');
    }

    //=============================== Student Profile -Personal Information START===============================
    public function index() {

        $student_registration_id = session()->get('registration_id');
//        $data['jspath'] = 'student-profile/student-personal-details';
//        $data['jspath'] = 'student-profile/student-profile-index';
        $data['title'] = lang('App.rise') . "-" . lang('App.student') . " " . lang('App.profile');
        $data['student_registration_data'] = $this->modelstudentregistration->find($student_registration_id);
        $data['student_personalinfo_data'] = $this->modelstudentpersonalinformation->where('student_registration_id', $student_registration_id)->first();
        $data['student_address_data'] = $this->modelstudentaddressdetails->where('student_registration_id', $student_registration_id)->first();
        $data['blood_group'] = $this->modelbloodgroup->findAll();
        $data['religion'] = $this->modelreligion->findAll();
        $data['caste'] = $this->modelcaste->findAll();
        $data['caste_category'] = $this->modelcastecategory->findAll();
        $data['countriesdata'] = $this->modelcountriesdata->findAll();
        $data['statedata'] = $this->modelstatedata->findAll();
        $data['talukadata'] = $this->modeltalukadata->findAll();
        $data['districtdata'] = $this->modeldistrictdata->findAll();
        return render_page('student_profile/student-profile-dashboard', $data);
    }

// Add Personal Information
    public function add_personal_information() {
        $studentRegistrationId = session('registration_id');

        $post = $this->request->getPost();

        //  Existing record
        $existing = $this->modelstudentpersonalinformation
                ->where('student_registration_id', $studentRegistrationId)
                ->first();

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
            'student_sport_reserved' => $post['sport_reserv'],
            'student_sport_level' => $post['sport_level'],
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

    //=============================== Student Profile -Personal Information END===============================
    //=============================== Student Profile -Personal Information START===============================
    public function add_address_details() {
        $studentRegistrationId = session('registration_id');
        $post = $this->request->getPost();
//        print_r($studentRegistrationId);die();
//
//        // Check if record exists
        $existing = $this->modelstudentaddressdetails->where('student_registration_id', $studentRegistrationId)->first();
//
        $data = [
            'student_permanent_address' => $post['student_permanent_address'],
            'student_permanent_pincode' => $post['student_permanent_pincode'],
            'student_permanent_country' => $post['student_permanent_country'],
            'student_permanent_state_id' => $post['student_permanent_state_id'],
            'student_permanent_taluka_id' => $post['student_permanent_taluka_id'],
            'student_permanent_district_id' => $post['student_permanent_district_id'],
            'student_correspondence_address' => $post['student_correspondence_address'],
            'student_correspondence_pincode' => $post['student_correspondence_pincode'],
            'student_correspondence_country' => $post['student_correspondence_country'],
            'student_correspondence_state_id' => $post['student_correspondence_state_id'],
            'student_correspondence_taluka_id' => $post['student_correspondence_taluka_id'],
            'student_correspondence_district_id' => $post['student_correspondence_district_id'],
        ];
//
        if ($existing) {
            $data['updated_by'] = session('rise_no');
            $result = $this->modelstudentaddressdetails->update($existing['student_address_details_id'], $data);
        } else {
            $data['student_registration_id'] = $studentRegistrationId;
            $data['added_by'] = session('rise_no');
            $result = $this->modelstudentaddressdetails->insert($data);
            
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
}
