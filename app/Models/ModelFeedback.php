<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFeedback extends Model {

   

    public function add_master_data($data) {
        
        $builder = $this->db->table('feedback_master');

        $res = $builder->insert($data);

        return $this->db->affectedRows() > 0 ? true : false;
    }

    //put your code here
}
