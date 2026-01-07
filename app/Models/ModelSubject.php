<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

/**
 * Description of ModelSubject
 *
 * @author VG
 */
class ModelSubject extends Model {
    use ActivityLoggerTrait;

    protected $table = 'subject';
    protected $primaryKey = 'subject_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['subject_name', 'added_by', 'updated_by', 'deleted_by', 'is_deleted'];
//    // Validation
    protected $validationRules = [
        'subject_name' => 'required|alpha_numeric_space|is_unique[subject.subject_name]'
    ];
    protected $validationMessages = [
        'subject_name' => [
            'required' => 'Subject is required',
            'is_unique' => 'Subject already exist',
        ]
    ];
//    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate', 'captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];

    public function search_subject(string $term) {
        return $this->select('subject_name')
                        ->like('subject_name', $term)
                        ->limit(10)
                        ->findAll();
    }

    public function countAllSubject() {
        return $this->builder()
                        ->countAllResults();
    }

    public function countFilteredSubject($search) {
        $builder = $this->builder();

        if (!empty($search)) {
            $builder->like('subject_name', $search);
        }

        return $builder->countAllResults();
    }

    public function getFilteredSubject($length, $start, $search) {
        $builder = $this->builder()
                ->orderBy('subject_id', 'DESC');

        if (!empty($search)) {
            $builder->like('subject_name', $search);
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
            'subject_id' => 'required|is_natural_no_zero',
            'subject_name' => "required|alpha_numeric_space|is_unique[subject.subject_name,subject_id,{$id}]",
        ];
    }
}
