<?php


namespace App\Models;

use CodeIgniter\Model;

class ModelCasteCategory extends Model {

    protected $table = 'caste_category';
    protected $primaryKey = 'caste_category_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'caste_category_name',
    ];
}
