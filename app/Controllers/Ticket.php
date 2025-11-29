<?php

namespace App\Controllers;
use App\Models\ModelLeavingCertificate;

class Ticket extends BaseController {
public $ModelTicket;
    public function __construct(){
       $this->ModelTicket = new ModelLeavingCertificate();
}

public function index()
    {
        $data['ticket_data']=$this->ModelTicket->getLcData();
        
        render_page('ticket/ticket-index',$data);
    }
}