<?php


namespace App\Controllers;
use TCPDF;

class ICard extends BaseController {
    
    public function index(){
        
        return render_page('i_card/i-card-index');
        
    }
    public function i_card_print(){
         // ---------- HARD CODED DATA SAMPLE ----------
         ob_start();

        $data = [
            "full_name" => "SHINDE NAGESH TUKARAM",
            "class" => "T.Y. Civil Engineering",
            "dob" => "15-10-2002",
            "mobile" => "9402728656",
            "rise_no" => "202610100001",
            "address" => "At post Nele, Tal. Satara, Dist. Satara,415015.",
            "photo" => "assets/images/profile.jpg"
        ];

        $pdf = new TCPDF("P", "mm", array(54, 86), true, "UTF-8", false);
        $pdf->SetMargins(0, 0, 0);
        $pdf->SetAutoPageBreak(false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // ---------------- FRONT PAGE ---------------- //
        $pdf->AddPage();
        $pdf->Image('assets/images/icard_front_side1.jpg', 0, 0, 54, 86);

        // Student Photo  (Slightly smaller and upper)
        $pdf->Image($data['photo'], 20, 21, 15, 15);

        // Name
        $pdf->SetFont('helvetica', 'B', 8);
        $pdf->SetXY(0, 38);
        $pdf->Cell(54, 4, $data['full_name'], 0, 1, 'C');

        // Class
        $pdf->SetFont('helvetica', '', 7);
        $pdf->SetXY(4, 46);
        $pdf->Cell(48, 4, "Class :  " . $data['class'], 0, 1);

        // DOB
        $pdf->SetXY(4, 50);
        $pdf->Cell(48, 4, "DOB :   " . $data['dob'], 0, 1);

        // Mobile
        $pdf->SetXY(4, 54);
        $pdf->Cell(48, 4, "Mob.No.:  " . $data['mobile'], 0, 1);

        // UID
        $pdf->SetXY(4, 58);
        $pdf->Cell(48, 4, "Rise No.: " . $data['rise_no'], 0, 1);

        // Address
        $pdf->SetXY(4, 62);
$pdf->SetFont('helvetica', '', 7);
$pdf->MultiCell(48, 4, "Add.: " . $data['address'], 0, 'L');

        // Barcode - Smaller + Down
        $style = ['border'=>0, 'padding'=>0, 'fgcolor'=>[0,0,0], 'bgcolor'=>false];
        $pdf->write1DBarcode($data['rise_no'], 'C128', 5, 72, 44, 5, 0.3, $style, 'N');

        // Principal Signature Placement
        $pdf->SetFont('helvetica', '', 6);
        $pdf->SetXY(33, 50);
//        $pdf->Cell(16, 5, "Principal's Signature", 0, 1, 'C');

        // ---------------- BACK PAGE ---------------- //
        $pdf->AddPage();
        $pdf->Image('assets/images/icard_back_image1.jpg', 0, 0, 54, 86);

        ob_end_clean();
        $pdf->Output('ICard.pdf', 'I');
        exit;
    }
}
