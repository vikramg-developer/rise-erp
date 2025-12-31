<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

class ModelFeedback extends Model {

    use ActivityLoggerTrait;

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
        'deleted_by',
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
            'required' => 'Feedback Subject Type is required'
        ],
        'semester_id' => [
            'required' => 'Semester is required'
        ],
        'part_id' => [
            'required' => 'Semester Part is required'
        ],
        'academic_year_id' => [
            'required' => 'Academic Year is required'
        ],
    ];
    protected $beforeUpdate = ['setUpdateOrDeleteDate', 'captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];

    public function getFeedbackMasterList($length, $start) {

        $builder = $this->db->table('feedback_master fm');
        $builder->select([
            'fm.*',
            'st.subject_type_name',
            's.semester_name',
            'sem_part.semester_part_name',
            'aca_year.academic_year_name',
        ]);

        // 🔗 JOINS
        $builder->join('subject_type st', 'st.subject_type_id  = fm.type_id', 'left');
        $builder->join('semester s', 's.semester_id = fm.semester_id', 'left');
        $builder->join('semester_part sem_part', 'sem_part.semester_part_id = fm.part_id', 'left');
        $builder->join('academic_year aca_year', 'aca_year.academic_year_id = fm.academic_year_id', 'left');
        return $builder->limit($length, $start)->get()->getResultArray();
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
