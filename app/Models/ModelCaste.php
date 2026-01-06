<?php


namespace App\Models;

use CodeIgniter\Model;

class ModelCaste extends Model {

    protected $table = 'caste';
    protected $primaryKey = 'caste';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'caste_name',
    ];
}
