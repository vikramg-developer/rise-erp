<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;
use CodeIgniter\Model;

class ModelLeavingCertificate extends Model{
   
    public function getLcData()
    {
//        $db=\$config\database::connect();
//        $this->db->table('leaving_certificate')->get()->getResult();
        $query=$this->db->query('select * from leaving_certificate');
	$result=$query->getresult();
	If(count($result)>0){
	    return $result;
	}
	else{
            echo 'No, Record Found!!';
	}

    }
    
    //put your code here
}
