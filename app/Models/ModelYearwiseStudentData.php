<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelYearwiseStudentData {

    protected $table = 'yearwise_student_data';
    protected $primaryKey = 'yearwise_student_data_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'registration_id',
        'academic_year_id',
        'department_id',
        'year_id',
        'semester_type_id',
        'division_id',
        'batch_id',
        'roll_number',
        'prefix',
        'admission_status',
        'is_detained',
        'added_by',
        'updated_by',
        'is_deleted',
    ];
    // Validation
    protected $validationRules = [
        'academic_year_id' => 'required',
        'year_id' => 'required',
        'department_id' => 'required'
    ];
    protected $validationMessages = [
        'head_group_name' => [
            'required' => 'Head Group is required'
        ]
    ];
    
//    Reusable function 
    public function fetch_ysd_student_for_lc($data){
        return $this->select('
            ysd.*,
            sr.student_first_name,
            sr.student_middle_name,
            sr.student_last_name,
            sr.student_rise_no,
            spi.student_general_register_no
            spi.student_birthdate
        ')
        ->from('yearwise_student_data AS ysd')
        ->join(
            'student_registration AS sr',
            'sr.student_registration_id = ysd.student_registration_id AND sr.is_deleted = 0',
            'left'
        )
        ->join(
            'student_personal_info AS spi',
            'spi.student_registration_id = ysd.student_registration_id AND spi.is_deleted = 0',
            'left'
        )
        ->where([
            'ysd.academic_year_id' => $data['academic_year_id'],
            'ysd.year_id' => $data['year_id'],
            'ysd.department_id' => $data['department_id'],
            'ysd.is_deleted'       => 0,
        ])
        ->findAll();
    }
}
