<?php

namespace App\Controllers;


class BonafideCertificate extends BaseController{
    public function index(){
     
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $mpdf->shrink_tables_to_fit = 0;
        $html = view('certificates/bonafide-certificate-print');
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
        $mpdf->Output('Bonafide-Certificate.pdf', 'I');
        exit; // VERY IMPORTANT
    }
}
