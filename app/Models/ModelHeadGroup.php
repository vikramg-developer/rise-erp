<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of ModelHeadGroup
 *
 * @author Shoeb
 */
class ModelHeadGroup extends Model {

    protected $table = 'head_group';
    protected $primaryKey = 'head_group_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['head_group_name', 'is_deleted'];
//    // Validation
    protected $validationRules = [
        'head_group_name' => 'required|alpha_numeric_space'
    ];
    protected $validationMessages = [
        'head_group_name' => [
            'required' => 'Head Group is required'
        ]
    ];
//    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate'];
}
