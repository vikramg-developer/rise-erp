<?php


namespace App\Models;

use CodeIgniter\Model;

class ModelReligion extends Model {

    protected $table = 'religion';
    protected $primaryKey = 'religion_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'religion_name',
    ];
}
