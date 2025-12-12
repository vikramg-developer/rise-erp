<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelLeavingCertificate extends Model
{
    protected $table            = 'leaving_certificate';
    protected $primaryKey       = 'lc_id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array'; // You can change to 'object' if needed
    protected $useSoftDeletes   = false;   // You are using is_deleted instead of softDelete()

    protected $allowedFields = [
        'ysd_id',
        'examination',
        'exam_held_in',
        'date_of_leaving',
        'is_duplicate',
        'previous_lc_date',        
        'is_deleted'
    ];

    // Validation Rules (Optional - add later if required)
    protected $validationRules = [        
        'course_id' => 'required',
        'year_id' => 'required',
        'aca_year_id' => 'required'
    ];
    protected $validationMessages = [
        'course_id'=>['required'=>'course is required'],
        'year_id'=>['required'=>'course is required'],
        'aca_year_id'=>['required'=>'course is required'],
        
    ];
//    protected $skipValidation = false;
}