<?php

namespace App\Controllers;
use App\Models\ModelLeavingCertificate;


class LeavingCertificate extends BaseController {
    public $ModelLeavingCertificate;
    public function __construct(){
       $this->ModelLeavingCertificate = new ModelLeavingCertificate();
    }
    
    public function index()
    {
        $data['lc_data']=$this->ModelLeavingCertificate->getLcData();
        
        render_page('certificate/leaving-certificate-index',$data);
    }
}
