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

    /* =====================================================
      COMMON SEARCH (UNCHANGED)
      ===================================================== */

    private function applySearch($builder,$search) {
        if ($search === '') {
            return;
        }

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

    /* =====================================================
      BASE QUERY (LIST + COUNT)
      ===================================================== */

    public function baseQuery($filters, $search) {
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

        // 🔍 common search used everywhere
        $this->applySearch($builder, $search);

        return $builder;
    }

    /* =====================================================
      DATATABLE DATA (PAGINATED)
      ===================================================== */

//    public function getStudentsForTable(array $filters, int $limit, int $offset, string $search = '') {
    public function getStudentsForTable($filters,$limit,$offset,$search = '') {
        return $this->baseQuery($filters, $search)
            ->orderBy('sr.student_rise_no', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();

//        return $this->orderBy('yearwise_student_data_id', 'DESC')->findAll($limit, $offset);
    }

    /* =====================================================
      SINGLE COUNT (SEARCH-AWARE)
      ===================================================== */
    public function count_all_results($filters){
        return $this->baseQuery($filters, $search)
                        ->countAllResults();
    }
    public function count_filter_results(array $filters, string $search = ''){
        return $this->baseQuery($filters, $search)
                        ->countAllResults();
    }
    
    

    /* =====================================================
      CERTIFICATE DATA (FULL DATA, ONE ROW)
      ===================================================== */
//    public function getCertificateData(int $ysdId): array
//    {
//        return $this->db->table('yearwise_student_data AS ysd')
//            ->select('
//                ysd.*,
//                sr.*,
//                spi.*,
//                d.department_name,
//                y.year_name,
//                ay.academic_year_name
//            ')
//            ->join('student_registration sr', 'sr.student_registration_id = ysd.student_registration_id AND sr.is_deleted=0', 'left')
//            ->join('student_personal_info spi', 'spi.student_registration_id = ysd.student_registration_id AND spi.is_deleted=0', 'left')
//            ->join('department d', 'd.department_id = ysd.department_id AND dept.is_deleted=0', 'left')
//            ->join('year y', 'y.year_id = ysd.year_id AND yr.is_deleted=0', 'left')
//            ->join('academic_year ay', 'ay.academic_year_id = ysd.academic_year_id AND aca.is_deleted=0', 'left')
//            ->where('ysd.yearwise_student_data_id', $ysdId)
//            ->where('ysd.is_deleted', 0)
//            ->get()
//            ->getRowArray();
//    }
}
