<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;
use App\Models\ModelFeesManagement;
/**
 * Description of FeesManagement
 *
 * @author Shoeb
 */
class FeesManagement extends BaseController {
    
    public $modelfeesmanagement;
    public function __construct() {
        $this->modelfeesmanagement = new ModelFeesManagement;
    }
    //put your code here
    public function head_group() {
//        echo "Head Group";
        
        if($this->request->getMethod() == 'post')
        {
            $insert_data = [
                'head_group_name' => $this->request->getVar('head-group', FILTER_SANITIZE_STRING),
            ];
            
            $insert = $this->modelfeesmanagement->add_head_group($insert_data);

        }
        
        $data['head_group_datas'] = $this->modelfeesmanagement->get_head_group_data();
        render_page('fees_management/head_group',$data);
    }
    
    public function head() {
//        echo "Head Group";
        
        if($this->request->getMethod() == 'post')
        {
            $insert_data = [
                'head_name' => $this->request->getVar('head', FILTER_SANITIZE_STRING),
            ];
            
            $insert = $this->modelfeesmanagement->add_head($insert_data);

        }
        
        $data['head_datas'] = $this->modelfeesmanagement->get_head_data();
        render_page('fees_management/head',$data);
    }
}
