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
        'added_by',
        'added_at',
        'updated_by',
        'updated_at',
        'is_deleted'
    ];

    // Timestamps handling
    protected $useTimestamps = false; // set true when using CI4 timestamp auto handling
    protected $createdField  = 'added_at';
    protected $updatedField  = 'updated_at';

    // Validation Rules (Optional - add later if required)
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}