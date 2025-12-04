<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

/**
 * Description of FeesManagement
 *
 * @author Shoeb
 */
class FeesManagement extends BaseController {

    //put your code here
    public function head_group() {
        render_page('fees_management/head_group');
    }
}
