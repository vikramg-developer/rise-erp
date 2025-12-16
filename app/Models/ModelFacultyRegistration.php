<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFacultyRegistration extends Model {

    protected $table = 'faculty_registration';
    protected $primaryKey = 'faculty_registration_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'faculty_rise_no',
        'role_id',
        'faculty_first_name',
        'faculty_middle_name',
        'faculty_last_name',
        'faculty_mobile_number',
        'faculty_email_id',
        'faculty_aadhar_number',
        'faculty_pan_number',
        'faculty_password',
        'added_by',
    ];
    protected $validationRules = [
        'role_id' => 'required',
        'faculty_first_name' => 'required|min_length[2]',
        'faculty_middle_name' => 'required|min_length[2]',
        'faculty_last_name' => 'required|min_length[2]',
        'faculty_mobile_number' => 'required|numeric|exact_length[10]|is_unique[faculty_registration.faculty_mobile_number]',
        'faculty_email_id' => 'required|is_unique[faculty_registration.faculty_email_id]',
        'faculty_aadhar_number' => 'required|numeric|exact_length[12]|is_unique[faculty_registration.faculty_aadhar_number]',
        'faculty_pan_number' => 'required|regex_match[/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/]|is_unique[faculty_registration.faculty_pan_number]',
        'faculty_password' => 'required|min_length[6]',
        
    ];
    protected $validationMessages = [
        
        'role_id' => [
            'required' => 'Faculty Role is required.',
        ],
        'faculty_first_name' => [
            'required' => 'First Name is required.',
            'min_length' => 'First Name must be at least 2 characters.',
        ],
        'faculty_middle_name' => [
            'required' => 'Middle Name is required.',
            'min_length' => 'Middle Name must be at least 2 characters.',
        ],
        'faculty_last_name' => [
            'required' => 'Last Name is required.',
            'min_length' => 'Last Name must be at least 2 characters.',
        ],
        'faculty_mobile_number' => [
            'required' => 'Mobile Number is required.',
            'numeric' => 'Mobile Number must contain only digits.',
            'exact_length' => 'Mobile Number must be exactly 10 digits.',
            'is_unique' => 'This Mobile Number is already registered.',
        ],
        'faculty_email_id' => [
            'required' => 'Email ID is required.',
            'valid_email' => 'Enter a valid Email Address.',
            'is_unique' => 'This Email ID is already registered.',
        ],
        'faculty_aadhar_number' => [
            'required' => 'Aadhar Number is required.',
            'numeric' => 'Aadhar Number must contain only digits.',
            'exact_length' => 'Aadhar Number must be exactly 12 digits.',
            'is_unique' => 'This Aadhar Number is already registered.',
        ],
        'faculty_pan_number' => [
            'required' => 'PAN Number is required.',
            'regex_match' => 'Enter a valid PAN Number (Format: ABCDE1234F).',
            'is_unique' => 'This PAN Number is already registered.',
        ],
        'faculty_password' => [
            'required' => 'Password is required.',
            'min_length' => 'Password must be at least 6 characters.',
        ],
        'confirm_password' => [
        'required' => 'Confirm Password is required.',
        'matches'  => 'Password and Confirm Password must match.',
    ],
        
        
    ];
    protected $skipValidation = false;
//    Reusable Functions
    
    public function verify_rise_no($rise_no)
    {
        return $this->where('faculty_rise_no', $rise_no)->first(); 
    }
}

