<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of ModelRole
 *
 * @author Dell
 */
class ModelRole extends Model {

    protected $table = 'role';
    protected $primaryKey = 'role_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
//    protected $useSoftDeletes = true;
//
    protected $allowedFields = ['role_id', 'role_name', 'permissions', 'added_by', 'updated_by', 'deleted_by', 'is_deleted'];
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
    protected $validationRules = [
        'role_name' => 'required|alpha_numeric_space'
    ];
    protected $validationMessages = [
        'role_name' => [
            'required' => 'Role name is required'
        ]
    ];
//    protected $skipValidation       = false;
//    protected $cleanValidationRules = true;
//
//    // Callbacks
//    protected $allowCallbacks = true;
//    protected $beforeInsert   = [];
//    protected $afterInsert    = [];
    protected $beforeUpdate = ['setUpdateOrDeleteDate'];

//    protected $afterUpdate    = [];
//    protected $beforeFind     = [];
//    protected $afterFind      = [];
//    protected $beforeDelete   = [];
//    protected $afterDelete    = [];

    public function countAllRoles() {
        return $this->builder()
                        ->where('role_id !=', 1)
                        ->countAllResults();
    }

    public function countFilteredRoles($search) {
        $builder = $this->builder()
                ->where('role_id !=', 1);

        if (!empty($search)) {
            $builder->like('role_name', $search);
        }

        return $builder->countAllResults();
    }

    public function getFilteredRoles($length, $start, $search) {
        $builder = $this->builder()
                ->where('role_id !=', 1)
                ->orderBy('role_id', 'ASC');

        if (!empty($search)) {
            $builder->like('role_name', $search);
        }

        return $builder->get($length, $start)->getResultArray();
    }

//        for faculty registration dropdwon
    public function getRoles() {
        return $this->whereNotIn('role_id', [1, 3])
                        ->where('is_deleted', 0)
                        ->orderBy('role_id')
                        ->findAll();
    }

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
}
