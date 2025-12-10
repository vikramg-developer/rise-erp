<?php

namespace App\Controllers;
use CodeIgniter\Controller;
/**
 * Description of Group
 *
 * @author Dell
 */
class Group extends BaseController{
    public function add_group(){
        render_page('group/add-group');
    }
    
    public function manage_group(){
        
    }
}
