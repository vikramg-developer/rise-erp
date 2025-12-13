<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDepartment extends Model{

    protected $table = 'department';
    protected $primaryKey = 'department_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'department_name',
        'is_deleted',
        'added_by',
        'updated_by',
    ];
    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];

    //    Reusable Query Methods
    public function get_departments() {
        return $this->where('is_deleted', 0)->findAll();
    }
}
