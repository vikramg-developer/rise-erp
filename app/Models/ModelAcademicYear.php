<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAcademicYear extends \CodeIgniter\Model {

    protected $table = 'academic_year';
    protected $primaryKey = 'academic_year_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'academic_year_name',
        'is_active',
        'is_current',
        'added_by',
        'updated_by',
        'is_deleted',
    ];

    //    Reusable Query Methods
    public function get_active_aca_years() {
        return $this->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
    }
    
    //get current academicyear
    public function getCurrentAcademicYear()
{
    return $this->where([
        'is_current' => 1,
        'is_deleted' => 0
    ])->first();
}

}
