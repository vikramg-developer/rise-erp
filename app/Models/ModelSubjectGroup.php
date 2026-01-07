<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

/**
 * Description of ModelSubjectGroup
 *
 * @author VG
 */
class ModelSubjectGroup extends Model {
    use ActivityLoggerTrait;

    protected $table = 'subject_group';
    protected $primaryKey = 'subject_group_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['subject_group_name', 'added_by', 'updated_by', 'deleted_by', 'is_deleted'];
//    // Validation
    protected $validationRules = [
        'subject_group_name' => 'required|alpha_numeric_space|is_unique[subject_group.subject_group_name]'
    ];
    protected $validationMessages = [
        'subject_group_name' => [
            'required' => 'Subject Group is required',
            'is_unique' => 'Subject Group already exist',
        ]
    ];
//    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate', 'captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];

    public function search_subject_group(string $term) {
        return $this->select('subject_group_name')
                        ->like('subject_group_name', $term)
                        ->limit(10)
                        ->findAll();
    }

    public function countAllSubjectGroup() {
        return $this->builder()
                        ->countAllResults();
    }

    public function countFilteredSubjectGroup($search) {
        $builder = $this->builder();

        if (!empty($search)) {
            $builder->like('subject_group_name', $search);
        }

        return $builder->countAllResults();
    }

    public function getFilteredSubjectGroup($length, $start, $search) {
        $builder = $this->builder()
                ->orderBy('subject_group_id', 'DESC');

        if (!empty($search)) {
            $builder->like('subject_group_name', $search);
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
            'subject_group_id' => 'required|is_natural_no_zero',
            'subject_group_name' => "required|alpha_numeric_space|is_unique[subject_group.subject_group_name,subject_group_id,{$id}]",
        ];
    }
}
