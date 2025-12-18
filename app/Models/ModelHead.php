<?php

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of ModelHead
 *
 * @author Shoeb
 */
class ModelHead extends Model{
    protected $table      = 'head';
    protected $primaryKey = 'head_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
//    protected $useSoftDeletes = true;
//
    protected $allowedFields = ['head_name','added_by','updated_by','is_deleted'];
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
    protected $validationRules      = [
        'head_name' => 'required|alpha_numeric_space'
    ];
    protected $validationMessages   = [
        'head_name' => [
            'required' => 'Head is required'
        ]
    ];
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
}
