<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

/**
 * Description of ModelStudentPersonalInformation
 *
 * @author Sonal
 */
class ModelStudentPersonalInformation extends Model {

    use ActivityLoggerTrait;

    protected $table = 'student_personal_info';
    protected $primaryKey = 'student_personal_info_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['student_registration_id', 'student_contact_no', 'student_email', 'student_gender', 'student_birthdate', 'student_birthplace', 'student_bloodgroup_id', 'student_religion_id', 'student_category_id', 'student_caste_id', 'student_subcaste', 'student_marital_status', 'student_nationality', 'student_minority', 'student_physically_handicap', 'student_physically_handicap_type', 'student_age', 'added_by', 'updated_by', 'is_deleted',
    ];
    protected $validationRules = [
        'student_contact_no' => 'required|numeric|exact_length[10]',
        'student_email' => 'required|valid_email',
        'student_gender' => 'required',
        'student_bloodgroup_id' => 'required',
        'student_birthdate' => 'required',
        'student_age' => 'required',
        'student_birthplace' => 'required',
        'student_religion_id' => 'required',
        'student_category_id' => 'required',
        'student_caste_id' => 'required',
        'student_subcaste' => 'required',
        'student_nationality' => 'required',
        'student_marital_status' => 'required',
        'student_minority' => 'required',
        'student_physically_handicap' => 'required',
    ];
    protected $validationMessages = [
        'student_contact_no' => [
            'required' => 'Mobile number is required',
            'numeric' => 'Mobile number must be numeric',
            'exact_length' => 'Mobile number must be 10 digits',
            'is_unique' => 'This Mobile number is already registered.',
        ],
        'student_email' => [
            'required' => 'Email field is required',
            'valid_email' => 'Please enter a valid email',
            'is_unique' => 'This Email ID is already registered.',
        ],
        'student_gender' => [
            'required' => 'Gender field is required',
        ],
        'student_bloodgroup_id' => [
            'required' => 'Blood Group field is required',
        ],
        'student_birthdate' => [
            'required' => 'Birth Date field is required',
        ],
        'student_age' => [
            'required' => 'Age field is required',
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
        'student_subcaste' => [
            'required' => 'Subcaste field is required',
        ],
        'student_nationality' => [
            'required' => 'Nationality  field is required',
        ],
        'student_marital_status' => [
            'required' => 'Marital Status field is required',
        ],
        'student_minority' => [
            'required' => 'Minority field is required',
        ],
        'student_physically_handicap' => [
            'required' => 'Physically Handicap field is required',
        ],
    ];
//    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate', 'captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];

    protected function setUpdateOrDeleteDate(array $data) {
        // If `is_deleted` is being updated → set deleted_dt
        if (array_key_exists('is_deleted', $data['data'])) {
            $data['data']['deleted_at'] = date('Y-m-d H:i:s');
            return $data;
        }

        // Otherwise → set updated_dt
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    public function verify_student_data($studentRegistrationId) {
        return $this->where('student_registration_id', $studentRegistrationId)->first();
    }
}
