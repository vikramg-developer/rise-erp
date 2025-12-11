<?php

namespace App\Controllers;


class BonafideCertificate extends BaseController{
    public function index(){
     
        render_page('certificates/bonafide-certificate-index');
    }
    
    public function bonafide_print(){
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $mpdf->shrink_tables_to_fit = 0;
        $mpdf->simpleTables = false;
        $mpdf->use_kwt = true;
        $mpdf->falseBoldWeight = 8;
        $mpdf->fonttrans['freeserif'] = 'freeserif2';
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->adjustFontDescLineheight = 100;
        $html = view('certificates/bonafide-certificate-print');
        $mpdf->WriteHTML($html);
   
        // Output PDF
        $mpdf->Output('Bonafide-Certificate.pdf', 'I');
        exit; // VERY IMPORTANT
    }
}
