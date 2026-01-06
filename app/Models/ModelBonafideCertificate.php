<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Traits\ActivityLoggerTrait;

class ModelBonafideCertificate extends Model{
     use ActivityLoggerTrait;
    
    protected $table = 'bonafide_certificate';
    protected $primaryKey = 'bonafide_certificate_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array'; // You can change to 'object' if needed
    protected $useSoftDeletes = false;   // You are using is_deleted instead of softDelete()
    protected $allowedFields = [
        'bonafide_certificate_no',
        'yearwise_student_data_id',
        'authorized_person',
        'bonafide_valid_upto',
        'is_print',
        'is_cancelled',
        'added_by',
        'updated_by',
        'added_at',
        'is_deleted'
    ];
    
    /* ===================================Bonafide Certificate Start=================================*/
    // Validation Rules (Optional - add later if required)
    protected $validationRules = [
        'authorized_person' => 'required',   
        'bonafide_valid_upto' => 'required'
    ];
    protected $validationMessages = [
        'authorized_person' => [
            'required' => 'Authorized Person field is required.'
        ],      
        'bonafide_valid_upto' => [
            'required' => 'Bonafide expiry date is required'
        ]
    ];
    
    // Callbacks
    protected $beforeUpdate = ['captureOldData'];
    protected $afterInsert = ['logInsert'];
    protected $afterUpdate = ['logUpdate'];
    
    /* =======================================Bonafide Certificate End==================================*/
    
    /* =======================================Bonafide Certificate Report================================*/

    /* ==================BASE QUERY (LIST + COUNT)==================== */

    public function baseQuery($filters) {
        $builder = $this->db->table('bonafide_certificate AS bonafide');

        $builder->select('
            bonafide.bonafide_certificate_id,
            bonafide.yearwise_student_data_id,           
            bonafide.is_cancelled,
            bonafide.is_print,
            bonafide.added_at,
            sr.student_rise_no,
            sr.student_first_name,
            sr.student_middle_name,
            sr.student_last_name,
            dept.department_name,
            yr.year_name,
            aca.academic_year_name
            
        ');

        $builder->join('yearwise_student_data AS ysd', 'ysd.yearwise_student_data_id = bonafide.yearwise_student_data_id AND ysd.is_deleted=0', 'left');
        $builder->join('student_registration sr', 'sr.student_registration_id = ysd.student_registration_id AND sr.is_deleted=0', 'left');
        $builder->join('department dept', 'dept.department_id = ysd.department_id AND dept.is_deleted=0', 'left');
        $builder->join('year yr', 'yr.year_id = ysd.year_id AND yr.is_deleted=0', 'left');
        $builder->join('academic_year aca', 'aca.academic_year_id = ysd.academic_year_id AND aca.is_deleted=0', 'left');
        $builder->where('bonafide.added_at >=', $filters['from_date']);
        $builder->where('bonafide.added_at <=', $filters['to_date']);
        $builder->where([
            'ysd.department_id' => $filters['department_id'],      
            'bonafide.is_deleted' => 0,
        ]);
        return $builder;
    }

    /* ===================DATATABLE DATA (PAGINATED)================== */

    public function get_bonafide_report($filters, $length, $start, $search) {
        $builder = $this->baseQuery($filters)->orderBy('bonafide.bonafide_certificate_id', 'DESC');
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
