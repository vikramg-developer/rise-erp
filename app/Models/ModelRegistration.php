<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRegistration extends Model {

    public function checkAadharExists($aadhar) {
        $builder = $this->db->table('student_registration');
        $row = $builder->where('student_aadhar_number', $aadhar)->get()->getRow();
    }

//  public function getRiseNO()
//{
// $builder = $this->db->table('student_registration');
//$row = $builder->get()->getRow();
//}
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

    public function add_registration_data($data) {

        $builder = $this->db->table('student_registration');

        $res = $builder->insert($data);

        return $this->db->affectedRows() > 0 ? true : false;
    }

   

}
