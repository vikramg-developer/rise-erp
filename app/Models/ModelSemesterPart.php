<?php
namespace App\Models;
use CodeIgniter\Model;


class ModelSemesterPart extends Model {   
     
     protected $table='semester_part';
     protected $PrimaryKey='semester_part_id';
     protected $useAutoIncrement= true;
     protected $returnType ='array';
     protected $allowFields=[
         'semester_part_name',
         'added_by',
         'updated_by',
     ];
    
     public function get_semester_part()
     {
        return $this->where('is_deleted', 0)->findAll();   
     }
     
    
}
