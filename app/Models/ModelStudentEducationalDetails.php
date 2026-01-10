<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

/**
 * Description of ModelStudentEducationalDetails
 *
 * @author Sonal
 */
class ModelStudentEducationalDetails extends Model {

    use ActivityLoggerTrait;

    protected $table = 'student_educational_details';
    protected $primaryKey = 'student_educational_details_id ';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['student_registration_id', 'student_department_id', 'student_institution_name', 'student_institution_university', 'student_month_of_passing', 'student_year_of_passing', 'student_seat_no', 'student_marking_system', 'student_total_marks', 'student_obtain_marks', 'student_percentage', 'student_grade', 'student_date_of_passing', 'added_by', 'updated_by', 'is_deleted',
    ];
    protected $validationRules = [
        'student_department_id' => 'required',
        'student_institution_name' => 'required',
        'student_institution_university' => 'required',
        'student_month_of_passing' => 'required',
        'student_year_of_passing' => 'required',
        'student_seat_no' => 'required',
        'student_marking_system' => 'required',
        'student_total_marks' => 'required',
        'student_obtain_marks' => 'required',
        'student_percentage' => 'required',
        'student_grade' => 'required',
        'student_date_of_passing' => 'required',
    ];
    protected $validationMessages = [
        'student_department_id' => [
            'required' => 'Department field is required',
        ],
        'student_institution_name' => [
            'required' => 'Institution Name field is required',
        ],
        'student_institution_university' => [
            'required' => 'Institution University field is required',
        ],
        'student_month_of_passing' => [
            'required' => 'Month Of Passing field is required',
        ],
        'student_year_of_passing' => [
            'required' => 'Year Of Passing field is required',
        ],
        'student_seat_no' => [
            'required' => 'Seat Number field is required',
        ],
        'student_marking_system' => [
            'required' => 'Marking System field is required',
        ],
        'student_date_of_passing' => [
            'required' => 'Date Of Passing field is required',
        ],
    ];
//    // Callbacks
    protected $beforeUpdate = ['setUpdateOrDeleteDate', 'captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];

    public function countAllStudent() {
        return $this->builder()
                        ->countAllResults();
    }

    public function countFilteredData($search) {
        $builder = $this->builder();

        if (!empty($search)) {
            $builder->like('student_registration_id', $search);
        }

        return $builder->countAllResults();
    }

    public function getFilteredData($length, $start, $search) {
        $builder = $this->builder()
                ->orderBy('student_registration_id', 'ASC');

//        if (!empty($search)) {
//            $builder->like('student_rise_no', $search);
//        }
        if (!empty($search)) {
            $builder->groupStart()
                    ->like('student_registration_id', $search)
                    ->orLike('student_institution_name', $search)
                    ->orLike('student_institution_university', $search)
                    ->orLike('student_month_of_passing', $search)
                    ->orLike('student_year_of_passing', $search)
                    ->orLike('student_seat_no', $search)
                    ->orLike('student_marking_system', $search)
                    ->orLike('student_total_marks', $search)
                    ->orLike('student_obtain_marks', $search)
                    ->orLike('student_percentage', $search)
                    ->orLike('student_grade', $search)
                    ->orLike('student_date_of_passing', $search)
                    ->groupEnd();
        }

        return $builder->get($length, $start)->getResultArray();
    }

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
