<?php
namespace App\Controllers;
//use App\Models\ModelFeedback;


class Feedback extends BaseController {
//    public $ModelFeedback;
    public function __construct(){
//       $this->ModelFeedback = new ModelFeedback();
    }
    
    public function index()
    {
        
//        $data['master_data']=$this->ModelFeedback->getData();
        render_page('feedback/feedback-master');
    }
}
