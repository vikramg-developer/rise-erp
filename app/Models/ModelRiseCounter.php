<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRiseCounter extends Model {

    protected $table = 'rise_number_counter';
    protected $primaryKey = 'rise_number_counter_id';
    protected $allowedFields = [
        'user_type_id',
        'academic_year_id',
        'rise_no',
        'added_by',
        'updated_by',
        'is_deleted',
    ];

    public function get_rise_no($academic_year_id) {
        $result = $this->db->query(
                        "SELECT * FROM rise_number_counter
             WHERE user_type_id = ? AND academic_year_id = ?
             FOR UPDATE",
                        [3, $academic_year_id]
                )->getRowArray();

        return $result;
    }
}
