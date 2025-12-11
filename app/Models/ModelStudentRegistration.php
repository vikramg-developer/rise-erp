<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of ModelStudentRegistration
 *
 * @author Sonal
 */
class ModelStudentRegistration extends Model{
    protected $table      = 'student_registration';
    protected $primaryKey = 'student_registration_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
//    protected $useSoftDeletes = true;
//
    protected $allowedFields = ['student_rise_no','student_first_name','student_middle_name','student_last_name','student_aadhar_number','student_password',];
//
//    protected bool $allowEmptyInserts = false;
//    protected bool $updateOnlyChanged = true;
//
//    // Dates
//    protected $useTimestamps = false;
//    protected $dateFormat    = 'datetime';
//    protected $createdField  = 'added_at';
//    protected $updatedField  = 'updated_at';
//    protected $deletedField  = 'deleted_at';
//
//    // Validation
//    protected $validationRules      = [];
//    protected $validationMessages   = [];
//    protected $skipValidation       = false;
//    protected $cleanValidationRules = true;
//
//    // Callbacks
//    protected $allowCallbacks = true;
//    protected $beforeInsert   = [];
//    protected $afterInsert    = [];
//    protected $beforeUpdate   = [];
//    protected $afterUpdate    = [];
//    protected $beforeFind     = [];
//    protected $afterFind      = [];
//    protected $beforeDelete   = [];
//    protected $afterDelete    = [];
 
public function getLastRiseNo()
{
    $last = $this->select('student_registration_id')
                 ->orderBy('student_registration_id', 'DESC')
                 ->first();

    if ($last) {
        return $last['student_registration_id'] + 1;  
    } else {
        return 1;  
    }
}



}
