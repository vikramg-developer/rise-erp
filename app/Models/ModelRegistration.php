<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRegistration extends Model {

    public function create_ticket($data) {
        return $this->db->table('ticket')->insert($data);
    }

    public function add_registration_data($data) {
        
        $builder = $this->db->table('student_registration');

        $res = $builder->insert($data);

        return $this->db->affectedRows() > 0 ? true : false;
    }

    //put your code here
}
