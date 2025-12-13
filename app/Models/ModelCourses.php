<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of ModelCourse
 *
 * @author Dell
 */
class ModelCourses {
    protected $table ='courses';
    protected $primaryKey ='course_id';
    protected $useAutoIncrement =true;
    protected $returnType ='array';
    protected $allowedFields=[
        'course',
        'is_deleted',
        'added_by',
        'updated_by',
        'is_deleted'
        ];  
    
    //    Reusable Query Methods
    public function get_courses(){
        return $this->where(['is_deleted'=>0])->findAll();
        
    } 
}
