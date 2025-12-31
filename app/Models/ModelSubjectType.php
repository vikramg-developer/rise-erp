<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelSubjectType extends Model {
    
    protected $table = 'subject_type';
    protected $primaryKey = 'subject_type_id';
    protected $useAutoIncrement=true;
    protected $returnType ='array';
    protected $allowFields= [
        'subject_type_name',
        'added_by',
        'updated_by',
        'is_deleted',
    ];
    
    public function get_subject_type() 
    {
        return $this->where('is_deleted', 0)->findAll();
    }
}
