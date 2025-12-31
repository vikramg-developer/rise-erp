<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

class ModelBonafideCertificate extends Model{
     use ActivityLoggerTrait;
    
    protected $table = 'bonafide_certificate';
    protected $primaryKey = 'bonafide_certificate_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array'; // You can change to 'object' if needed
    protected $useSoftDeletes = false;   // You are using is_deleted instead of softDelete()
    protected $allowedFields = [
        'bonafide_certificate_no',
        'yearwise_student_data_id',
        'is_cancelled',
        'added_by',
        'updated_by',
        'added_at',
        'is_deleted'
    ];
    
    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate', 'captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];

}
