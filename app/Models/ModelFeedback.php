<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFeedback extends Model {
    protected $table      = 'feedback_master';
    protected $primaryKey = 'master_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
//    protected $useSoftDeletes = true;
//
    protected $allowedFields = ['feedback_master','type_id','semester_id','part_id','academic_year_id','is_deleted'];
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
//    // Validation
//    protected $validationRules      = [];
//    protected $validationMessages   = [];
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
