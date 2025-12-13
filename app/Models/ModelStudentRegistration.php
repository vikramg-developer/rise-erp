<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of ModelStudentRegistration
 *
 * @author Sonal
 */
class ModelStudentRegistration extends Model {

    protected $table = 'student_registration';
    protected $primaryKey = 'student_registration_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
//    protected $useSoftDeletes = true;
//
    protected $allowedFields = ['student_rise_no', 'student_first_name', 'student_middle_name', 'student_last_name', 'student_aadhar_number', 'student_password',];
//
    protected bool $allowEmptyInserts = false;
//    protected bool $updateOnlyChanged = true;
//
//    // Dates
//    protected $useTimestamps = false;
//    protected $dateFormat    = 'datetime';
//    protected $createdField  = 'added_at';
//    protected $updatedField  = 'updated_at';
//    protected $deletedField  = 'deleted_at';
//
//    // Validation
    protected $validationRules = [
        'student_first_name' => 'required|alpha',
        'student_middle_name' => 'required|alpha',
        'student_last_name' => 'required|alpha',
        'student_aadhar_number' => 'required|exact_length[12]|numeric|is_unique[student_registration.student_aadhar_number]',
    ];
    protected $validationMessages = [
        'student_first_name' => [
            'required' => 'Student First Name is required',
            'alpha' => 'Student First Name must contain only letters'
        ],
        'student_middle_name' => [
            'required' => 'Student Middle Name is required',
            'alpha' => 'Student Middle Name must contain only letters'
        ],
        'student_last_name' => [
            'required' => 'Student Last Name is required',
            'alpha' => 'Student Last Name must contain only letters'
        ],
        'student_aadhar_number' => [
            'required' => 'Student Aadhar Number is required',
            'numeric' => 'Aadhaar number must be 12 digits and numeric only.',
            'is_unique' => 'This Aadhaar number is already registered'
        ],
        'student_password' => [
            'required' => 'Password is required',
            'min_length' => 'Password must be 8 characters',
            'max_length' => 'Password must be 8 characters'
        ],
        'signup-confirmpassword' => [
            'required' => 'Confirm Password is required',
            'matches' => 'Passwords do not match'
        ]
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
    protected $afterDelete    = [];
    
    public function verify_rise_no($rise_no)
    {
        return $this->where('student_rise_no', $rise_no)->first(); 
    }
    
}
