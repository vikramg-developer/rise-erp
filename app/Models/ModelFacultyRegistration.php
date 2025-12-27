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
        'faculty_role_id',
        'faculty_first_name',
        'faculty_middle_name',
        'faculty_last_name',
        'faculty_mobile_number',
        'faculty_email_id',
        'faculty_aadhar_number',
        'faculty_pan_number',
        'faculty_password',
        'faculty_status',
        'added_by',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at',
        'is_deleted',
    ];
    protected $validationRules = [
        'faculty_role_id' => 'required',
        'faculty_first_name' => 'required|min_length[2]|alpha_space',
        'faculty_middle_name' => 'required|min_length[2]|alpha_space',
        'faculty_last_name' => 'required|min_length[2]|alpha_space',
        'faculty_mobile_number' => 'required|numeric|exact_length[10]|is_unique[faculty_registration.faculty_mobile_number]',
        'faculty_email_id' => 'required|trim|valid_email|is_unique[faculty_registration.faculty_email_id]',
        'faculty_aadhar_number' => 'required|numeric|exact_length[12]|is_unique[faculty_registration.faculty_aadhar_number]',
        'faculty_pan_number' => 'required|regex_match[/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/]|is_unique[faculty_registration.faculty_pan_number]',
        'faculty_password' => 'required|min_length[8]',
    ];
    protected $validationMessages = [
        'faculty_role_id' => [
            'required' => 'Faculty Role is required.',
        ],
        'faculty_first_name' => [
            'required' => 'First Name is required.',
            'min_length' => 'First Name must be at least 2 characters.',
            'alpha_space' => 'First Name must contain only letters.',
        ],
        'faculty_middle_name' => [
            'required' => 'Middle Name is required.',
            'min_length' => 'Middle Name must be at least 2 characters.',
            'alpha_space' => 'Middle Name must contain only letters.',
        ],
        'faculty_last_name' => [
            'required' => 'Last Name is required.',
            'min_length' => 'Last Name must be at least 2 characters.',
            'alpha_space' => 'Last Name must contain only letters.',
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
            'matches' => 'Password and Confirm Password must match.',
        ],
    ];
    protected $skipValidation = false;
    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data) {
        if (!empty($data['data']['faculty_password'])) {
            $data['data']['faculty_password'] = password_hash($data['data']['faculty_password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

//    Reusable Functions

    public function verify_rise_no($rise_no) {
        return $this->where('faculty_rise_no', $rise_no)->first();
    }

//    public function findAllRecord($length, $start) {
//        return $this->where('faculty_registration_id !=', 1)
//                        ->orderBy('faculty_registration_id', 'DESC')
//                        ->findAll($length, $start);
//    }

    public function findAllRecord($length, $start, $search = null) {
        $builder = $this->builder();

        $builder->where('faculty_registration_id !=', 1);

        // 🔍 SEARCH (DataTables)
        if (!empty($search)) {
            $builder->groupStart()
                    ->like('faculty_rise_no', $search)
                    ->orLike('faculty_first_name', $search)
                    ->orLike('faculty_middle_name', $search)
                    ->orLike('faculty_last_name', $search)
                    ->orLike('faculty_mobile_number', $search)
                    ->orLike('faculty_email_id', $search)
                    ->groupEnd();
        }

        $builder->orderBy('faculty_registration_id', 'DESC');
        $builder->limit($length, $start);

        return $builder->get()->getResultArray();
    }

    public function countFiltered($search = null) {
        $builder = $this->builder();

        $builder->where('faculty_registration_id !=', 1);

        if (!empty($search)) {
            $builder->groupStart()
                    ->like('faculty_rise_no', $search)
                    ->orLike('faculty_first_name', $search)
                    ->orLike('faculty_middle_name', $search)
                    ->orLike('faculty_last_name', $search)
                    ->orLike('faculty_mobile_number', $search)
                    ->orLike('faculty_email_id', $search)
                    ->groupEnd();
        }

        return $builder->countAllResults();
    }

    public function getFacultyById($facultyId) {
        return $this->where('faculty_registration_id', $facultyId)->first();
    }

    /**
     * This map method is used to convert faculty_rise_no stored in added_by and updated_by
     * columns into readable faculty names without using SQL JOINs. It fetches all faculty
     * names once, creates a rise_no => "FirstName LastName" map, and allows fast lookup
     * while building DataTable data, keeping the code clean and easy to maintain.
     */
    public function getRiseNoNameMap() {
        $rows = $this->select('faculty_rise_no, faculty_first_name, faculty_last_name')
                ->findAll();

        $map = [];

        foreach ($rows as $row) {
            $map[$row['faculty_rise_no']] = $row['faculty_first_name'] . ' ' . $row['faculty_last_name'];
        }

        return $map;
    }

    public function rulesForUpdate($id) {
        return [
            'faculty_role_id' => 'required',
            'faculty_first_name' => 'required|min_length[2]|alpha_space',
            'faculty_middle_name' => 'required|min_length[2]|alpha_space',
            'faculty_last_name' => 'required|min_length[2]|alpha_space',
            'faculty_mobile_number' => "required|numeric|exact_length[10]|is_unique[faculty_registration.faculty_mobile_number,faculty_registration_id,{$id}]",
            'faculty_email_id' => "required|valid_email|is_unique[faculty_registration.faculty_email_id,faculty_registration_id,{$id}]",
            'faculty_aadhar_number' => "required|numeric|exact_length[12]|is_unique[faculty_registration.faculty_aadhar_number,faculty_registration_id,{$id}]",
            'faculty_pan_number' => "required|regex_match[/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/]|is_unique[faculty_registration.faculty_pan_number,faculty_registration_id,{$id}]",
        ];
    }
    
    
    protected $beforeUpdate = ['setUpdateOrDeleteDate'];

    protected function setUpdateOrDeleteDate(array $data)
    {
        // DELETE or REVERT
        if (array_key_exists('is_deleted', $data['data'])) {
            $data['data']['deleted_at'] = date('Y-m-d H:i:s');
            return $data;
        }

        // NORMAL UPDATE
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

}
