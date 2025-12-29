<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

/**
 * Description of ModelHead
 *
 * @author Shoeb
 */
class ModelHeadGroup extends Model {

    use ActivityLoggerTrait;

    protected $table = 'head_group';
    protected $primaryKey = 'head_group_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['head_group_name', 'added_by', 'updated_by', 'deleted_by', 'is_deleted'];
//    // Validation
    protected $validationRules = [
        'head_group_name' => 'required|alpha_numeric_space|is_unique[head_group.head_group_name]'
    ];
    protected $validationMessages = [
        'head_group_name' => [
            'required' => 'Head Group is required',
            'is_unique' => 'Head Group already exist',
        ]
    ];
//    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate', 'captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];

    public function search_head_group(string $term) {
        return $this->select('head_group_name')
                        ->like('head_group_name', $term)
                        ->limit(10)
                        ->findAll();
    }

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
                ->orderBy('head_group_id', 'DESC');

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

    public function rulesForUpdate($id) {
        return [
            'head_group_id' => 'required|is_natural_no_zero',
            'head_group_name' => "required|alpha_numeric_space|is_unique[head_group.head_group_name,head_group_id,{$id}]",
        ];
    }
}
