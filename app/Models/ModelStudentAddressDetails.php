<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

/**
 * Description of ModelStudentAddressDetails
 *
 * @author Sonal
 */
class ModelStudentAddressDetails extends Model {

    use ActivityLoggerTrait;

    protected $table = 'student_address_details';
    protected $primaryKey = 'student_address_details_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['student_registration_id', 'student_permanent_address', 'student_permanent_country', 'student_permanent_pincode', 'student_permanent_state_id', 'student_permanent_district_id', 'student_permanent_taluka_id', 'student_correspondence_address', 'student_correspondence_country', 'student_correspondence_pincode', 'student_correspondence_state_id', 'student_correspondence_district_id', 'student_correspondence_taluka_id', 'added_by', 'updated_by', 'is_deleted',
    ];
    protected $validationRules = [
        'student_permanent_address' => 'required',
        'student_permanent_country' => 'required',
        'student_permanent_pincode' => 'required',
        'student_permanent_state_id' => 'required',
        'student_permanent_district_id' => 'required',
        'student_permanent_taluka_id' => 'required',
        'student_correspondence_address' => 'required',
        'student_correspondence_country' => 'required',
        'student_correspondence_pincode' => 'required',
        'student_correspondence_state_id' => 'required',
        'student_correspondence_district_id' => 'required',
        'student_correspondence_taluka_id' => 'required',
    ];
    protected $validationMessages = [
        'student_permanent_address' => [
            'required' => 'permanent Address is required',
        ],
        'student_permanent_country' => [
            'required' => 'permanent Country field is required',
        ],
        'student_permanent_pincode' => [
            'required' => 'permanent Pincode is required',
        ],
        'student_permanent_state_id' => [
            'required' => 'permanent State field is required',
        ],
        'student_permanent_district_id' => [
            'required' => 'permanent District field is required',
        ],
        'student_permanent_taluka_id' => [
            'required' => 'permanent Taluka field is required',
        ],
        'student_correspondence_address' => [
            'required' => 'Correspondence Address is required',
        ],
        'student_correspondence_country' => [
            'required' => 'Correspondence Country field is required',
        ],
        'student_correspondence_pincode' => [
            'required' => 'Correspondence Pincode is required',
        ],
        'student_correspondence_state_id' => [
            'required' => 'Correspondence State field is required',
        ],
        'student_correspondence_district_id' => [
            'required' => 'Correspondence District field is required',
        ],
        'student_correspondence_taluka_id' => [
            'required' => 'Correspondence Taluka field is required',
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
