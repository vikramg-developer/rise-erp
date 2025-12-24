<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of ModelStudentPersonalInformation
 *
 * @author Sonal
 */
class ModelStudentPersonalInformation extends Model {

    protected $table = 'student_personal_info';
    protected $primaryKey = 'student_personal_info_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['student_registration_id', 'student_mobile_no', 'student_email_id', 'student_gender', 'student_birthdate', 'student_birthplace', 'student_bloodgroup', 'student_religion_id', 'student_category_id', 'student_caste_id', 'student_subcaste_id', 'student_marital_status', 'student_nationality_id', 'student_minority_id', 'student_physically_handicap_id', 'student_physically_handicap_type', 'added_by', 'updated_by', 'is_deleted',
    ];
    protected $validationRules = [
        'student_mobile_no' => 'required|numeric|exact_length[10]',
        'student_mobile_no' => 'required|numeric|exact_length[10]|is_unique[student_personal_info.student_mobile_no]',
        'student_email_id' => 'required|trim|valid_email|is_unique[student_personal_info.student_email_id]',
        'student_gender' => 'required',
        'student_bloodgroup' => 'required',
        'student_birthdate' => 'required',
        'student_birthplace' => 'required',
        'student_religion_id' => 'required',
        'student_category_id' => 'required',
        'student_caste_id' => 'required',
        'student_subcaste_id' => 'required',
        'student_nationality_id' => 'required',
        'student_marital_status' => 'required',
        'student_minority_id' => 'required',
        'student_physically_handicap_id' => 'required',
    ];
    protected $validationMessages = [
        'student_mobile_no' => [
            'required' => 'Mobile number is required',
            'numeric' => 'Mobile number must be numeric',
            'exact_length' => 'Mobile number must be 10 digits',
            'is_unique' => 'This Mobile number is already registered.',
        ],
        'student_email_id' => [
            'required' => 'Email field is required',
            'valid_email' => 'Please enter a valid email',
            'is_unique' => 'This Email ID is already registered.',
        ],
        'student_gender' => [
            'required' => 'Gender field is required',
        ],
        'student_bloodgroup' => [
            'required' => 'Blood Group field is required',
        ],
        'student_birthdate' => [
            'required' => 'Birth Date field is required',
        ],
        'student_birthplace' => [
            'required' => 'Birth Place field is required',
        ],
        'student_religion_id' => [
            'required' => 'Religion field is required',
        ],
        'student_category_id' => [
            'required' => 'Category field is required',
        ],
        'student_caste_id' => [
            'required' => 'Caste field is required',
        ],
        'student_subcaste_id' => [
            'required' => 'Subcaste field is required',
        ],
        'student_nationality_id' => [
            'required' => 'Nationality  field is required',
        ],
        'student_marital_status' => [
            'required' => 'Marital Status field is required',
        ],
        'student_minority_id' => [
            'required' => 'Minority field is required',
        ],
        'student_physically_handicap_id' => [
            'required' => 'Physically Handicap field is required',
        ],
    ];

    public function verify_student_data($studentRegistrationId) {
        return $this->where('student_registration_id', $studentRegistrationId)->first();
    }
}
