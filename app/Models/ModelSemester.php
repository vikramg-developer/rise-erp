<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSemester extends Model {

    protected $table = 'semester';
    protected $primaryKey = 'semester_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'semester_name',
        'is_active',
        'added_by',
        'updated_by',
        'is_deleted',
    ];

    //Reusable Query Methods
    public function get_active_semester() {
        return $this->where(['is_active' => 1, 'is_deleted' => 0])->findAll();
    }
}
