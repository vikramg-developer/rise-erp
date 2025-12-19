<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFeedback extends Model {

    protected $table = 'feedback_master';
    protected $primaryKey = 'feedback_master_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $allowedFields = [
        'feedback_name', 
        'type_id', 
        'semester_id',
        'part_id', 
        'academic_year_id', 
        'is_deleted',
        'added_by',
        'updated_by',
     ];

    // Validation
    protected $validationRules = [
        'feedback_name' => 'required|min_length[3]',
        'type_id' => 'required',
        'semester_id' => 'required',
        'part_id' => 'required',
        'academic_year_id' => 'required',
    ];
    protected $validationMessages = [
        'feedback_name' => [
            'required' => 'Feedback Name is required',
//            'min_length' => 'Feedback Name must be at least 3 characters'
        ],
        'type_id' => [
            'required' => 'Feedback Type is required'
        ],
        'semester_id' => [
            'required' => 'Semester is required'
        ],
        'part_id' => [
            'required' => 'Part is required'
        ],
        'academic_year_id' => [
            'required' => 'Academic Year is required'
        ],
    ];
    
//    protected $skipValidation = false;
   
//
//    protected bool $allowEmptyInserts = false;
//    protected bool $updateOnlyChanged = true;
//
//    // Dates
//    protected $useTimestamps = false;
//    protected $dateFormat    = 'datetime';
//    protected $createdField  = 'created_at';
//    protected $updatedField  = 'updated_at';
//    protected $deletedField  = 'deleted_at';
//

//    protected $skipValidation       = false;
//    protected $cleanValidationRules = true;
//
//    // Callbacks
//    protected $allowCallbacks = true;
//    protected $beforeInsert   = [];
//    protected $afterInsert    = [];
//    protected $beforeUpdate   = [];
//    protected $afterUpdate    = [];
//    protected $beforeFind     = [];
//    protected $afterFind      = [];
//    protected $beforeDelete   = [];
//    protected $afterDelete    = [];
//    public function add_master_data($data) {
//        
//        $builder = $this->db->table('feedback_master');
//
//        $res = $builder->insert($data);
//
//        return $this->db->affectedRows() > 0 ? true : false;
//    }
    //put your code here
}
