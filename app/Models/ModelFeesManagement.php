<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;
use CodeIgniter\Model;
/**
 * Description of ModelFeesManagement
 *
 * @author Shoeb
 */
class ModelFeesManagement extends Model{
    
    public function get_head_group_data(){
        $query = $this->db->query('SELECT * FROM head_group');
        $result = $query->getResult();
        
        if(count($result) > 0)
        {
            return $result;
        }
        
        else{
            return false;
        }
    }
    
    public function add_head_group($data){
        $builder = $this->db->table('head_group');
        $res = $builder->insert($data);
        
        if($this->db->affectedRows() == 1)
        {
            return true;
        }
        
        else
        {
            return false;
        }
    }
    
    public function get_head_data(){
        $query = $this->db->query('SELECT * FROM head');
        $result = $query->getResult();
        
        if(count($result) > 0)
        {
            return $result;
        }
        
        else{
            return false;
        }
    }
    
    public function add_head($data){
        $builder = $this->db->table('head');
        $res = $builder->insert($data);
        
        if($this->db->affectedRows() == 1)
        {
            return true;
        }
        
        else
        {
            return false;
        }
    }
}
