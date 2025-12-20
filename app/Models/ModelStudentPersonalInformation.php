<?php

namespace App\Models;
use CodeIgniter\Model;

/**
 * Description of ModelStudentPersonalInformation
 *
 * @author Sonal
 */
class ModelStudentPersonalInformation extends Model{
   protected $table = 'student_personal_info';
    protected $primaryKey = 'student_personal_info_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['student_registration_id', 'student_mobile_no','student_email','student_gender','student_birthdate','student_birthplace','student_bloodgroup','student_religion_id','student_category_id','student_caste_id','student_subcaste','student_marital_status','student_nationality','student_minority','student_physically_handicap','student_physically_handicap_type','added_by','updated_by','is_deleted',
    ];
}
