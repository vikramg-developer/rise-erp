<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

/**
 * Description of LeavingCertificateReport
 *
 * @author Dell
 */
class LeavingCertificateReport extends BaseController{
    public function __construct() {
        
    }
    public function index()
    {
        return render_page('certificates/leaving-certificate-report');
    }
}
