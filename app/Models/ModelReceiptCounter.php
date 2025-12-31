<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelReceiptCounter extends Model {

    protected $table = 'receipt_number_counter';
    protected $primaryKey = 'receipt_number_counter_id';
    protected $allowedFields = [
        'head_group_id',
        'academic_year_id',
        'receipt_no',
        'added_by',
        'updated_by',
        'is_deleted',
    ];

    public function get_receipt_no($head_group_id,$academic_year_id) {
        $result = $this->db->query(
                        "SELECT * FROM receipt_number_counter
             WHERE head_group_id = ? AND academic_year_id = ?
             FOR UPDATE",
                        [$head_group_id, $academic_year_id]
                )->getRowArray();

        return $result;
    }
}
