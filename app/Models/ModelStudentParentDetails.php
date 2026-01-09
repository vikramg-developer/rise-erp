<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

/**
 * Description of ModelStudentAddressDetails
 *
 * @author Sonal
 */
class ModelStudentParentDetails extends Model {

    use ActivityLoggerTrait;

    protected $table = 'student_parent_details';
    protected $primaryKey = 'student_parent_details_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['student_registration_id','student_mother_name','student_father_contact','student_mother_contact','student_father_occupation', 'student_mother_occupation', 'family_income', 'added_by', 'updated_by', 'is_deleted',
    ];
    protected $validationRules = [
        'student_mother_name' => 'required',
        'student_father_contact' => 'required',
        'student_mother_contact' => 'required',
        'student_father_occupation' => 'required',
        'student_mother_occupation' => 'required',
        'family_income' => 'required',
    ];
    protected $validationMessages = [
        'student_mother_name' => [
            'required' => 'Mother Name is required',
        ],
        'student_father_contact' => [
            'required' => 'Father Contact is required',
        ],
        'student_mother_contact' => [
            'required' => 'Mother Contact field is required',
        ],
        'student_father_occupation' => [
            'required' => 'Father Occupation is required',
        ],
        'student_mother_occupation' => [
            'required' => 'Mother Occupation is required',
        ],
       
    ];
//    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate', 'captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];

    protected function setUpdateOrDeleteDate(array $data) {
        // If `is_deleted` is being updated → set deleted_dt
        if (array_key_exists('is_deleted', $data['data'])) {
            $data['data']['deleted_at'] = date('Y-m-d H:i:s');
            return $data;
        }

        // Otherwise → set updated_dt
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}
