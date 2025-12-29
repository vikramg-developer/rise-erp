<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLeavingCertificate extends Model {

    protected $table = 'leaving_certificate';
    protected $primaryKey = 'leaving_certificate_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array'; // You can change to 'object' if needed
    protected $useSoftDeletes = false;   // You are using is_deleted instead of softDelete()
    protected $allowedFields = [
        'leaving_certificate_no',
        'yearwise_student_data_id',
        'examination',
        'exam_period',
        'date_of_leaving',
        'is_duplicate',
        'is_cancelled',
        'added_by',
        'updated_by',
        'is_deleted'
    ];
//    =====================================Generate Leaving Certificate===================================
    // Validation Rules (Optional - add later if required)
    protected $validationRules = [
        'examination' => 'required',
        'exam_period' => 'required',
        'date_of_leaving' => 'required'
    ];
    protected $validationMessages = [
        'examination' => [
            'required' => 'Examination field is required.'
        ],
        'exam_period' => [
            'required' => 'Exam Period field is required',
        ],
        'date_of_leaving' => [
            'required' => 'Date of Leaving field is required'
        ]
    ];

    /* ====================== Resusable function==================== */

    public function get_lc_data($ysd_id) {
        return $this->where('yearwise_student_data_id', $ysd_id)->findAll();
    }

//    --------------------------------------end leaving certificate-----------------------------------
//    =======================================Leaving Certificate Report================================

    /* ==================BASE QUERY (LIST + COUNT)==================== */

    public function baseQuery($filters) {
        $builder = $this->db->table('leaving_certificate AS lc');

        $builder->select('
            lc.yearwise_student_data_id,
            sr.student_rise_no,
            sr.student_first_name,
            sr.student_middle_name,
            sr.student_last_name,
            dept.department_name,
            yr.year_name,
            aca.academic_year_name
            
        ');

        $builder->join('yearwise_student_data AS ysd', 'ysd.yearwise_student_data_id = lc.yearwise_student_data_id AND ysd.is_deleted=0', 'left');
        $builder->join('student_registration sr', 'sr.student_registration_id = ysd.student_registration_id AND sr.is_deleted=0', 'left');
        $builder->join('department dept', 'dept.department_id = ysd.department_id AND dept.is_deleted=0', 'left');
        $builder->join('year yr', 'yr.year_id = ysd.year_id AND yr.is_deleted=0', 'left');
        $builder->join('academic_year aca', 'aca.academic_year_id = ysd.academic_year_id AND aca.is_deleted=0', 'left');
        $builder->where('lc.added_at >=', $filters['from_date']);
        $builder->where('lc.added_at <=', $filters['to_date']);
        $builder->where([
            'ysd.department_id' => $filters['department_id'],      
            'lc.is_deleted' => 0,
        ]);
        return $builder;
    }

    /* ===================DATATABLE DATA (PAGINATED)================== */

    public function get_lc_report($filters, $length, $start, $search) {
        $builder = $this->baseQuery($filters)->orderBy('sr.student_rise_no', 'ASC');
        if (!empty($search)) {
            $builder->groupStart()
                    ->like('sr.student_rise_no', $search)
                    ->orLike('sr.student_first_name', $search)
                    ->orLike('sr.student_middle_name', $search)
                    ->orLike('sr.student_last_name', $search)
                    ->orLike('dept.department_name', $search)
                    ->orLike('yr.year_name', $search)
                    ->orLike('aca.academic_year_name', $search)
                    ->groupEnd();
        }
        return $builder->get($length, $start)->getResultArray();
    }
    
    /* =============================SINGLE COUNT (SEARCH-AWARE)=========================== */

    public function count_all_results($filters) {
        return $this->baseQuery($filters)
                        ->countAllResults();
    }

    public function count_filter_results($filters,$search) {
        $builder= $this->baseQuery($filters);
            if (!empty($search)) {
                $builder->groupStart()
                    ->like('sr.student_rise_no', $search)
                    ->orLike('sr.student_first_name', $search)
                    ->orLike('sr.student_middle_name', $search)
                    ->orLike('sr.student_last_name', $search)
                    ->orLike('dept.department_name', $search)
                    ->orLike('yr.year_name', $search)
                    ->orLike('aca.academic_year_name', $search)
                    ->groupEnd();
            }
        return $builder->countAllResults();
    }
}
