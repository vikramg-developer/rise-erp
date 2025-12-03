<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTicket extends Model {

    public function getTicketData() {
        $query = $this->db->query('select * from ticket');
        $result = $query->getresult();
        If (count($result) > 0) {
            return $result;
        } else {
            echo 'No, Record Found!!';
        }
    }

//    public function create_ticket($data){
//      return $this->db->table('ticket')->insert($data); 
//    }


    public function create_ticket($data) {
        
        $builder = $this->db->table('ticket');

        $res = $builder->insert($data);

        return $this->db->affectedRows() > 0 ? true : false;
    }

    //put your code here
}
