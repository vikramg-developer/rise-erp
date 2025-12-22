<?php

namespace App\Models;
use CodeIgniter\Model;

/**
 * Description of ModelStudentPersonalInformation
 *
 * @author Sonal
 */
class ModelStudentPersonalInformation extends Model{
   protected $table = 'student_personal_info';
    protected $primaryKey = 'student_personal_info_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['student_registration_id', 'student_mobile_no','student_email','student_gender','student_birthdate','student_birthplace','student_bloodgroup','student_religion_id','student_category_id','student_caste_id','student_subcaste','student_marital_status','student_nationality','student_minority','student_physically_handicap','student_physically_handicap_type','added_by','updated_by','is_deleted',
    ];
    //    // Validation
    protected $validationRules      = [
        'student_registration_id' => 'required',
         'student_first_name' => 'required|min_length[2]|alpha_space',
        'student_middle_name' => 'required|min_length[2]|alpha_space',
        'student_last_name' => 'required|min_length[2]|alpha_space',
        'student_mobile_number' => 'required|numeric|exact_length[10]|is_unique[student_registration.student_mobile_number]',
        'student_email_id' => 'required|trim|valid_email|is_unique[student_registration.student_email_id]',
        'student_aadhar_number' => 'required|numeric|exact_length[12]|is_unique[student_registration.student_aadhar_number]',
        'student_gender' => 'required',
        'student_blood_group' => 'required',
        'student_blood_group' => 'required',
        'student_birthdate' => 'required',
        
    ];
    protected $validationMessages   = [
        'student_registration_id' => [
            'required' => 'student registration is required.',
        ],
        'student_first_name' => [
            'required' => 'First Name is required.',
            'min_length' => 'First Name must be at least 2 characters.',
            'alpha_space' => 'First Name must contain only letters.',
        ],
        'student_middle_name' => [
            'required' => 'Middle Name is required.',
            'min_length' => 'Middle Name must be at least 2 characters.',
            'alpha_space' => 'Middle Name must contain only letters.',
        ],
        'student_last_name' => [
            'required' => 'Last Name is required.',
            'min_length' => 'Last Name must be at least 2 characters.',
            'alpha_space' => 'Last Name must contain only letters.',
        ],
        'student_mobile_number' => [
            'required' => 'Mobile Number is required.',
            'numeric' => 'Mobile Number must contain only digits.',
            'exact_length' => 'Mobile Number must be exactly 10 digits.',
            'is_unique' => 'This Mobile Number is already registered.',
        ],
        'student_email_id' => [
            'required' => 'Email ID is required.',
            'valid_email' => 'Enter a valid Email Address.',
            'is_unique' => 'This Email ID is already registered.',
        ],
        'student_aadhar_number' => [
            'required' => 'Aadhar Number is required.',
            'numeric' => 'Aadhar Number must contain only digits.',
            'exact_length' => 'Aadhar Number must be exactly 12 digits.',
            'is_unique' => 'This Aadhar Number is already registered.',
        ],
        'student_birthdate' => [
            'required' => 'Birth Date is required.',
           
        ],
    ];
}
