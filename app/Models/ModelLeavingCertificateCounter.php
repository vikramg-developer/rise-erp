<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLeavingCertificateCounter extends Model {

    protected $table = 'leaving_certificate_number_counter';
    protected $primaryKey = 'leaving_certificate_no_counter_id';
    protected $allowedFields = [
        'leaving_certificate_no',
        'added_by',
        'updated_by',
        'is_deleted',
    ];

    public function get_leaving_certificate_no() {
        $result = $this->db->query(
                        "SELECT * FROM leaving_certificate_number_counter
             WHERE leaving_certificate_no_counter_id = ?
             FOR UPDATE",
                        [1]
                )->getRowArray();

        return $result;
    }
}
