<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBonafideCertificateCounter extends Model {

    protected $table = 'bonafide_certificate_number_counter';
    protected $primaryKey = 'bonafide_certificate_no_counter_id';
    protected $allowedFields = [
        'bonafide_certificate_no',
        'added_by',
        'updated_by',
        'is_deleted',
    ];

    public function get_bonafide_certificate_no() {
        $result = $this->db->query(
                        "SELECT * FROM bonafide_certificate_number_counter
             WHERE bonafide_certificate_no_counter_id = ?
             FOR UPDATE",
                        [1]
                )->getRowArray();

        return $result;
    }
}
