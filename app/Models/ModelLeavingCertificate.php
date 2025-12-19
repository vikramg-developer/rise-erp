<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLeavingCertificate extends Model {

    protected $table = 'leaving_certificate';
    protected $primaryKey = 'leaving_certificate_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array'; // You can change to 'object' if needed
    protected $useSoftDeletes = false;   // You are using is_deleted instead of softDelete()
    protected $allowedFields = [
        'yearwise_student_data_id',
        'examination',
        'exam_period',
        'date_of_leaving',
        'is_duplicate',        
        'is_cancelled',        
        'added_by',        
        'updated_by',        
        'is_deleted'
    ];
    // Validation Rules (Optional - add later if required)
    protected $validationRules = [
        'examination' => 'required',
            'exam_period' => 'required',
            'date_of_leaving' => 'required'
    ];
    protected $validationMessages = [
        'examination' => [
                'required' => 'Examination field is required.'
            ],
            'exam_period' => [
                'required' => 'Exam Period field is required',
            ],
            'date_of_leaving' => [
                'required' => 'Date of Leaving field is required'
            ]
    ];
}
