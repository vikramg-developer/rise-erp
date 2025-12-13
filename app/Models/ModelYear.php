<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelYear extends Model {

    protected $table = 'year';
    protected $primaryKey = 'year_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'year_name',
        'added_by',
        'updated_by',
        'is_deleted'
    ];

    //    Reusable Query Methods
    public function get_years() {
        return $this->where('is_deleted', 0)->findAll();
    }
}