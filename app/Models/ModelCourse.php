<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCourse {

    protected $table = 'course';
    protected $primaryKey = 'course_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'course_name',
        'is_deleted',
        'added_by',
        'updated_by',
    ];
    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];

    //    Reusable Query Methods
    public function get_courses() {
        return $this->where(['is_deleted' => 0])->findAll();
    }
}
