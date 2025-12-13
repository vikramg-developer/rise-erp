<?php
namespace App\Models;
use CodeIgniter\Model;
class ModelAcademicYear extends \CodeIgniter\Model {
    protected $table ='academic_year';
    protected $primaryKey ='academic_year_id';
    protected $useAutoIncrement =true;
    protected $returnType ='array';
    protected $allowedFields=[
        'academic_year_name',
        'is_active',
        'added_by',
        'updated_by',
        'is_deleted',
        ];

    //    Reusable Query Methods
    public function get_active_aca_years(){
        return $this->where(['is_active'=>1,'is_deleted'=>0])->findAll();
        
    }    
  
}
