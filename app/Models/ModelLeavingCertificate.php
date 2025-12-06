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
        $query=$this->db->query('select * from leaving_certificate');
	$result=$query->getresult();

    }
    
    public function addLcData($lc_data)
    {
        $builder=$this->db->table('leaving_certificate');
        $result=$builder->insert($lc_data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    
    //put your code here
}
