<?php

namespace App\Controllers;

use App\Models\ModelLeavingCertificate;

class LeavingCertificate extends BaseController
{
    public $ModelLeavingCertificate;

    public function __construct() {

        $this->ModelLeavingCertificate = new ModelLeavingCertificate();
    }

    public function index() {
        $data['lc_data'] = $this->ModelLeavingCertificate->getLcData();

        render_page('certificate/leaving-certificate-index', $data);
    }

    public function addLeavingCertificateRemark() {
                echo site_url('lc-remark');
        exit;
        //        echo "<pre>";
            print_r($_SERVER['REQUEST_URI']);
            exit;
        if ($this->request->getMethod() == 'post') {

            $data['fname'] = $fname = $this->request->getVar('f-name');
            $data['fname'] = $lname = $this->request->getVar('l-name');
//
            $data['lc_data'] = $this->ModelLeavingCertificate->getLcData();   
        }
        render_page('certificate/leaving-certificate-remark',);
    }
}