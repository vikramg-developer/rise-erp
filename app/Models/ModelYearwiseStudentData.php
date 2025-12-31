<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelYearwiseStudentData extends Model {

    protected $table = 'yearwise_student_data';
    protected $primaryKey = 'yearwise_student_data_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'student_registration_id',
        'academic_year_id',
        'department_id',
        'year_id',
        'semester_type_id',
        'division_id',
        'batch_id',
        'roll_number',
        'prefix',
        'admission_status',
        'is_detained',
        'added_by',
        'updated_by',
        'is_deleted',
    ];
    // Validation
    protected $validationRules = [
        'academic_year_id' => 'required',
        'year_id' => 'required',
        'department_id' => 'required'
    ];
    protected $validationMessages = [];

    /* ======================BASE QUERY (LIST + COUNT)=============*/

    public function baseQuery($filters) {
        $builder = $this->db->table('yearwise_student_data AS ysd');

        $builder->select('
            ysd.yearwise_student_data_id,
            sr.student_rise_no,
            sr.student_first_name,
            sr.student_middle_name,
            sr.student_last_name,
            dept.department_name,
            yr.year_name,
            aca.academic_year_name
            
        ');

        $builder->join('student_registration sr', 'sr.student_registration_id = ysd.student_registration_id AND sr.is_deleted=0', 'left');
        $builder->join('department dept', 'dept.department_id = ysd.department_id AND dept.is_deleted=0', 'left');
        $builder->join('year yr', 'yr.year_id = ysd.year_id AND yr.is_deleted=0', 'left');
        $builder->join('academic_year aca', 'aca.academic_year_id = ysd.academic_year_id AND aca.is_deleted=0', 'left');

        $builder->where([
            'ysd.department_id' => $filters['department_id'],
            'ysd.year_id' => $filters['year_id'],
            'ysd.academic_year_id' => $filters['academic_year_id'],
            'ysd.is_deleted' => 0,
        ]);
        return $builder;
    }

    /* ====================================DATATABLE DATA (PAGINATED)============================= */

    public function get_yearwise_student_list($filters, $limit, $offset, $search) {
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
        return $builder->get($limit, $offset)->getResultArray();

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
    /* ========================CERTIFICATE DATA (FULL DATA, ONE ROW)============================= */
    public function get_student_data_for_lc(int $yearwise_student_data_id): array
    {
        return $this->db->table('yearwise_student_data AS ysd')
            ->select('
                sr.student_rise_no,sr.student_first_name,
                sr.student_middle_name,sr.student_last_name,
                dept.department_name,yr.year_name,aca.academic_year_name,spi.student_general_register_no,
                spi.student_birthdate
            ')
            ->join('student_registration sr', 'sr.student_registration_id = ysd.student_registration_id AND sr.is_deleted=0', 'left')
            ->join('student_personal_info spi', 'spi.student_registration_id = ysd.student_registration_id AND spi.is_deleted=0', 'left')
            ->join('department dept', 'dept.department_id = ysd.department_id AND dept.is_deleted=0', 'left')
            ->join('year yr', 'yr.year_id = ysd.year_id AND yr.is_deleted=0', 'left')
            ->join('academic_year aca', 'aca.academic_year_id = ysd.academic_year_id AND aca.is_deleted=0', 'left')
            ->where('ysd.yearwise_student_data_id', $yearwise_student_data_id)
            ->where('ysd.is_deleted', 0)
            ->get()
            ->getRowArray();
    }
    
    public function get_student_data_for_bonafide(int $yearwise_student_data_id): array
    {
        return $this->db->table('yearwise_student_data AS ysd')
            ->select('
                sr.student_rise_no,sr.student_first_name,
                sr.student_middle_name,sr.student_last_name,
                dept.department_name,yr.year_name,aca.academic_year_name,spi.student_general_register_no,
                spi.student_birthdate
            ')
            ->join('student_registration sr', 'sr.student_registration_id = ysd.student_registration_id AND sr.is_deleted=0', 'left')
            ->join('student_personal_info spi', 'spi.student_registration_id = ysd.student_registration_id AND spi.is_deleted=0', 'left')
            ->join('department dept', 'dept.department_id = ysd.department_id AND dept.is_deleted=0', 'left')
            ->join('year yr', 'yr.year_id = ysd.year_id AND yr.is_deleted=0', 'left')
            ->join('academic_year aca', 'aca.academic_year_id = ysd.academic_year_id AND aca.is_deleted=0', 'left')
            ->where('ysd.yearwise_student_data_id', $yearwise_student_data_id)
            ->where('ysd.is_deleted', 0)
            ->get()
            ->getRowArray();
    }
}
