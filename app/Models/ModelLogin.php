<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model {

    public function checkAadharExists($aadhar) {
        $builder = $this->db->table('student_registration');
        $row = $builder->where('student_aadhar_number', $aadhar)->get()->getRow();
    }


    public function getRiseNO() {
        // Get last rise number
        $row = $this->db->table('student_registration')
                ->select('student_registration_id')
                ->orderBy('student_registration_id', 'DESC')
                ->get()
                ->getRow();

        $lastRiseNO = $row->student_registration_id ?? 0;

        // Return next rise number
        return $lastRiseNO + 1;
    }

    
    public function checkuser($riseNo, $password) {
        return $this->db->table('student_registration')
                        ->where('student_rise_no', $riseNo)
                        ->where('student_password', $password)
                        ->get()
                        ->getRowArray();
    }

}
