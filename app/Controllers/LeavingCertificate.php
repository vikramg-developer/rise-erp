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

        render_page('certificates/leaving-certificate-index');
    }

    public function add_lc_info() 
    {   
        
        $data=[];
//        $data['validation'] = \Config\Services::validation();
//        $rules=[
//            'full-name'=>'required',
//            'mother-name'=>'required',
//            'course-id'=>'required',
//            'examination'=>'required',
//            'exam-held-in'=>'required',
//            'date-of-admission'=>'required',
//            'date-of-leaving'=>'required|valid_date[Y-m-d]',
//            'general-register-no'=>'required',
//        ];
////        
//       
//        if ($this->request->getMethod() == 'post') 
//        {
////             $data['lc_data'] = $this->ModelLeavingCertificate->getLcData();
//            if($this->validate($rules))
//            {
//                $lc_data=
//                [
//                    'examination'=>$this->request->getVar('examination', FILTER_SANITIZE_STRING),
//                    'exam_held_in'=>$this->request->getVar('exam-held-in', FILTER_SANITIZE_STRING),
//                    'date_of_leaving'=>$this->request->getVar('date-of-leaving', FILTER_SANITIZE_NUMBER_INT)
//                ];
//                $add_lc_data=$this->ModelLeavingCertificate->addLcData($lc_data);
//                if($add_lc_data)
//                {                
                    // Correct mPDF 8.2+ constructor
                    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8','format' => 'A4-P']);
                    $mpdf->shrink_tables_to_fit = 0;
                    $html = view('certificates/leaving-certificate-print');
                    $mpdf->simpleTables = false;
                    $mpdf->WriteHTML($html);
                    $mpdf->use_kwt = true;
                    $mpdf->falseBoldWeight = 8;
                    $mpdf->fonttrans['freeserif'] = 'freeserif2';
                    $mpdf->useFixedNormalLineHeight = true;
                    $mpdf->useFixedTextBaseline = true;
                    $mpdf->adjustFontDescLineheight = 100;
                    // header('Content-Type: application/pdf');
                    // header('Content-Disposition: inline; filename="Leaving-Certificate.pdf"');
                    // Output PDF
                    $mpdf->Output('Leaving-Certificate.pdf', 'I');
                    exit; // VERY IMPORTANT
//                }
//                else
//                {
//                    $this->session->setTempdata('error','Sorry! Leaving certificate is not created, try again!');
//                }
//                
//            }
//            else
//            {
//                $data['validation']=$this->validator;
//                render_page('certificate/leaving-certificate-index');
//                
//            }
////            
//            
//        }
        render_page('certificate/leaving-certificate-index');
    }
}