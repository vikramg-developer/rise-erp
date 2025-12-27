<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of ModelHeadGroup
 *
 * @author Shoeb
 */
class ModelHeadGroup extends Model {

    protected $table = 'head_group';
    protected $primaryKey = 'head_group_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['head_group_name', 'added_by', 'updated_by', 'deleted_by', 'is_deleted'];
//    // Validation
    protected $validationRules = [
        'head_group_name' => 'required|alpha_numeric_space'
    ];
    protected $validationMessages = [
        'head_group_name' => [
            'required' => 'Head Group is required'
        ]
    ];
//    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate'];

    public function countAllHeadGroup() {
        return $this->builder()
                        ->countAllResults();
    }

    public function countFilteredHeadGroup($search) {
        $builder = $this->builder();

        if (!empty($search)) {
            $builder->like('head_group_name', $search);
        }

        return $builder->countAllResults();
    }

    public function getFilteredHeadGroup($length, $start, $search) {
        $builder = $this->builder()
                ->orderBy('head_group_id', 'ASC');

        if (!empty($search)) {
            $builder->like('head_group_name', $search);
        }

        return $builder->get($length, $start)->getResultArray();
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
