<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBranch extends Model {
 
    protected $table = 'branch_details';
    protected $primaryKey = 'branch_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'branch_code',
        'branch_name',
        'signature_name',
        'branch_email',
        'branch_contact_no',
        'branch_website',
        'branch_type_id',
        'branch_address',
        'branch_region_id',
        'branch_location_id',
        'branch_district_id',
        'branch_taluka_id',
        'branch_pincode_id',
        'branch_principal_name',
        'branch_principal_mobile_no',
        'branch_logo',
        'branch_header',
        'branch_udise_no',
        'branch_otp',
        'added_by',
        'updated_by',
    ];

    protected $validationRules = [
        'branch_code' => 'required|min_length[2]|max_length[10]|is_unique[branch_details.branch_code,branch_id,{branch_id}]',
        'branch_name' => 'required|min_length[3]|max_length[100]',
        'signature_name' => 'required|min_length[3]|max_length[100]',
        'branch_email' => 'required|valid_email|is_unique[branch_details.branch_email,branch_id,{branch_id}]',
        'branch_contact_no' => 'required|numeric|exact_length[10]',
        'branch_website' => 'permit_empty|valid_url',
        'branch_type_id' => 'required|integer',
        'branch_address' => 'required|min_length[5]|max_length[500]',
        'branch_region_id' => 'required|integer',
        'branch_location_id' => 'required|integer',
        'branch_district_id' => 'required|integer',
        'branch_taluka_id' => 'required|integer',
        'branch_pincode_id' => 'required|integer',
        'branch_principal_name' => 'required|min_length[3]|max_length[100]',
        'branch_principal_mobile_no' => 'required|numeric|exact_length[10]',
        'branch_logo' => 'permit_empty|max_length[255]',
        'branch_header' => 'permit_empty|max_length[255]',
        'branch_udise_no' => 'required|numeric|min_length[11]|max_length[11]',
        'branch_otp' => 'permit_empty|integer',
    ];

    protected $validationMessages = [
        'branch_code' => [
            'required' => 'Branch Code is required.',
            'min_length' => 'Branch Code must be at least 2 characters.',
            'max_length' => 'Branch Code cannot exceed 10 characters.',
            'is_unique' => 'This Branch Code already exists.',
        ],
        'branch_name' => [
            'required' => 'Branch Name is required.',
            'min_length' => 'Branch Name must be at least 3 characters.',
        ],
        'signature_name' => [
            'required' => 'Signature Name is required.',
        ],
        'branch_email' => [
            'required' => 'Branch Email is required.',
            'valid_email' => 'Enter a valid Email address.',
            'is_unique' => 'This Email is already registered.',
        ],
        'branch_contact_no' => [
            'required' => 'Contact Number is required.',
            'numeric' => 'Contact Number must contain digits only.',
            'exact_length' => 'Contact Number must be exactly 10 digits.',
        ],
        'branch_website' => [
            'valid_url' => 'Please enter a valid Website URL.',
        ],
        'branch_type_id' => [
            'required' => 'Branch Type is required.',
        ],
        'branch_address' => [
            'required' => 'Branch Address is required.',
        ],
        'branch_region_id' => [
            'required' => 'Region is required.',
        ],
        'branch_location_id' => [
            'required' => 'Location is required.',
        ],
        'branch_district_id' => [
            'required' => 'District is required.',
        ],
        'branch_taluka_id' => [
            'required' => 'Taluka is required.',
        ],
        'branch_pincode_id' => [
            'required' => 'Pincode is required.',
        ],
        'branch_principal_name' => [
            'required' => 'Principal Name is required.',
        ],
        'branch_principal_mobile_no' => [
            'required' => 'Principal Mobile Number is required.',
            'numeric' => 'Mobile Number must contain digits only.',
            'exact_length' => 'Mobile Number must be exactly 10 digits.',
        ],
        'branch_udise_no' => [
            'required' => 'UDISE Number is required.',
            'numeric' => 'UDISE Number must be numeric.',
        ],
    ];
    protected $skipValidation = false;

    public function getSingleBranch() {
        return $this->orderBy('branch_id', 'ASC')->first();
    }

    public function getAllBranchdata() {
        return $this->orderBy('branch_name', 'ASC')->findAll();
    }
}
 