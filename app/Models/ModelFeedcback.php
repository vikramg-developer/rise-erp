<?php
namespace App\Models;
use CodeIgniter\Model;

class ModelFeedback extends Model{
   
    public function getData()
    {
//        $db=\$config\database::connect();
//        $this->db->table('leaving_certificate')->get()->getResult();
        $query=$this->db->query('select * from feedback_master');
	$result=$query->getresult();
	If(count($result)>0)
        {
	    return $result;
	}
	else{
            echo 'No, Record Found!!';
	}

    }
}
