<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFacultyType extends Model{
    
    Protected $table='faculty_type';
    Protected $pimaryKey='faculty_type_id';
    Protected $useAutoIncrement=true;
    Protected $returntype='array';
    Protected $allowedFields=[
        'faculty_type',
        'added_by',
        'updated_by',
        'is_deleted'
    ];
    
    public function getFacultyTypeData(){
        return $this->where('is_deleted',0)->findAll();
    }
    
    
}