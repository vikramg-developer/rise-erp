<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

/**
 * Description of ModelDepartment
 *
 * @author Shoeb
 */
class ModelDepartment extends Model {

    use ActivityLoggerTrait;

    protected $table = 'department';
    protected $primaryKey = 'department_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['department_name', 'added_by', 'updated_by', 'deleted_by', 'is_deleted'];
//    // Validation
    protected $validationRules = [
        'department_name' => 'required|alpha_numeric_space|is_unique[department.department_name]'
    ];
    protected $validationMessages = [
        'department_name' => [
            'required' => 'Department is required',
            'is_unique' => 'Department already exist',
        ]
    ];
//    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate', 'captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];

    public function search_department(string $term) {
        return $this->select('department_name')
                        ->like('department_name', $term)
                        ->limit(10)
                        ->findAll();
    }

    public function countAllDepartment() {
        return $this->builder()
                        ->countAllResults();
    }

    public function countFilteredDepartment($search) {
        $builder = $this->builder();

        if (!empty($search)) {
            $builder->like('department_name', $search);
        }

        return $builder->countAllResults();
    }

    public function getFilteredDepartment($length, $start, $search) {
        $builder = $this->builder()
                ->orderBy('department_id', 'DESC');

        if (!empty($search)) {
            $builder->like('department_name', $search);
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
            'department_id' => 'required|is_natural_no_zero',
            'department_name' => "required|alpha_numeric_space|is_unique[department.department_name,department_id,{$id}]",
        ];
    }
}
