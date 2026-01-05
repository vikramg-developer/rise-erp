<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBloodGroup extends Model {

    protected $table = 'blood_group';
    protected $primaryKey = 'blood_group_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'blood_group_name',
       
    ];

  
    
    

}
