<?php

namespace App\Controllers;

use TCPDF;
use Mpdf\Mpdf;
use Mpdf\Barcode\BarcodeGeneratorPNG;

class ICard extends BaseController {

    protected $modelyearwisestudentdata;
    protected $modelacademicyear;
    protected $modelyear;
    protected $modeldepartment;

    public function __construct() {

        $this->modelyearwisestudentdata = model('ModelYearwiseStudentData');
        $this->modelacademicyear = model('ModelAcademicYear');
        $this->modelyear = model('ModelYear');
        $this->modeldepartment = model('ModelDepartment');
    }

    public function index() {
        $data['jspath'] = 'i_card/i-card-index';
        $data['title'] = lang('App.rise') . "-" . lang('App.icard');
        $data['academic_year'] = $this->modelacademicyear->get_active_academic_years();
        $data['years'] = $this->modelyear->get_years();
        $data['departments'] = $this->modeldepartment->get_departments();
        return render_page('i_card/i-card-index', $data);
    }

    public function fetch_icard_student_list() {
        $rules = [
            'department_id' => 'required',
            'year_id' => 'required',
            'academic_year_id' => 'required'
        ];
        $messages = [
            'department_id' => [
                'required' => 'Please select department.'
            ],
            'year_id' => [
                'required' => 'Please select year.',
            ],
            'academic_year_id' => [
                'required' => 'Please select academic year.'
            ]
        ];
        if ($this->validate($rules, $messages)) {
            $draw = (int) $this->request->getVar('draw');
            $start = (int) $this->request->getVar('start');
            $length = (int) $this->request->getVar('length');
            $search = $this->request->getVar('search')['value'] ?? '';

            $filters = [
                'department_id' => $this->request->getVar('department_id'),
                'year_id' => $this->request->getVar('year_id'),
                'academic_year_id' => $this->request->getVar('academic_year_id'),
            ];

            // Data rows (paginated + searched)
            $students = $this->modelyearwisestudentdata->get_yearwise_student_list($filters, $length, $start, $search);

            // Single count (search-aware)
            $count_filter = $this->modelyearwisestudentdata->count_filter_results($filters, $search);
            $count_all = $this->modelyearwisestudentdata->count_all_results($filters);

            $data = [];

            foreach ($students as $student) {

                $buttons = '';
                $buttons .= '<button class="btn btn-secondary icard_btn" data-yearwise-student-data-id="' . $student['yearwise_student_data_id'] . '">' . lang('App.icard') . '</button>';

                $data[] = [
                    $student['yearwise_student_data_id'],
                    $student['student_rise_no'],
                    $student['student_first_name'] . ' ' . $student['student_middle_name'] . ' ' . $student['student_last_name'],
                    $student['academic_year_name'],
                    $student['department_name'],
                    $student['year_name'],
                    $buttons,
                ];
            }

            return $this->response->setJSON([
                        'draw' => $draw,
                        'recordsTotal' => $count_all,
                        'recordsFiltered' => $count_filter,
                        'data' => $data,
                        'csrfHash' => csrf_hash(),
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->validator->getErrors(),
                        'draw' => (int) $this->request->getPost('draw'),
                        'recordsTotal' => 0,
                        'recordsFiltered' => 0,
                        'data' => [],
                        'csrfHash' => csrf_hash(),
            ]);
        }
    }

    private function generateBarcodePNG($code) {
        // TCPDF barcode class is already available
        $barcode = new \TCPDFBarcode($code, 'C128');

        // ✅ THIS RETURNS RAW PNG BINARY
        return $barcode->getBarcodePNGData(2, 40);
    }

    public function print_i_card() {
        $ysd_id = $this->request->getVar('ysd_id');
        $yearwise_data=$this->modelyearwisestudentdata->get_student_data_for_icard($ysd_id);
        $data = [
            'yearwise_data' => $yearwise_data,
            'sanstha_name' => 'Rayat Shikashan Sanstha',
            'college_name' => 'Karmaveer Bhaurao Patil College of Engineering, Satara',
            'college_address' => 'Ajinkya Colony,Sadar Bazar, Satara, 411001',           
            'class' => 'T.Y. Civil Engineering',          
            'mobile' => '9402728656',            
            'address' => 'At post Nele, Tal. Satara, Dist. Satara - 415015',
        ];

        // ✅ BARCODE VIA TCPDF
        $barcodePdf = $this->generateBarcodePNG($yearwise_data['student_rise_no']);
        $data['barcode_base64'] = base64_encode($barcodePdf);

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'default_font' => 'dejavusans',
            'format' => [56, 80], // ID card size (mm)
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 1,
            'margin_bottom' => 1,
        ]);
        // 🔴 THIS IS THE KEY LINE (WITHOUT THIS BARCODE NEVER SHOWS)
        $mpdf->useSubstitutions = true;

        // Optional but safe
        $mpdf->simpleTables = true;

        $html = view('i_card/i-card-print', $data);
        $mpdf->WriteHTML($html);

        $mpdf->Output('ICard.pdf', 'I');
        exit;
    }

//    public function i_card_print() {
//        // ---------- HARD CODED DATA SAMPLE ----------
//        ob_start();
//
//        $data = [
//            "full_name" => "SHINDE NAGESH TUKARAM",
//            "class" => "T.Y. Civil Engineering",
//            "dob" => "15-10-2002",
//            "mobile" => "9402728656",
//            "rise_no" => "202610100001",
//            "address" => "At post Nele, Tal. Satara, Dist. Satara,415015.",
//            "photo" => "assets/images/profile.jpg"
//        ];
//
//        $pdf = new TCPDF("P", "mm", array(54, 86), true, "UTF-8", false);
//        $pdf->SetMargins(0, 0, 0);
//        $pdf->SetAutoPageBreak(false);
//        $pdf->setPrintHeader(false);
//        $pdf->setPrintFooter(false);
//
//        // ---------------- FRONT PAGE ---------------- //
//        $pdf->AddPage();
//        $pdf->Image('assets/images/icard_front_side1.jpg', 0, 0, 54, 86);
//
//        // Student Photo  (Slightly smaller and upper)
//        $pdf->Image($data['photo'], 20, 21, 15, 15);
//
//        // Name
//        $pdf->SetFont('helvetica', 'B', 8);
//        $pdf->SetXY(0, 38);
//        $pdf->Cell(54, 4, $data['full_name'], 0, 1, 'C');
//
//        // Class
//        $pdf->SetFont('helvetica', '', 7);
//        $pdf->SetXY(4, 46);
//        $pdf->Cell(48, 4, "Class :  " . $data['class'], 0, 1);
//
//        // DOB
//        $pdf->SetXY(4, 50);
//        $pdf->Cell(48, 4, "DOB :   " . $data['dob'], 0, 1);
//
//        // Mobile
//        $pdf->SetXY(4, 54);
//        $pdf->Cell(48, 4, "Mob.No.:  " . $data['mobile'], 0, 1);
//
//        // UID
//        $pdf->SetXY(4, 58);
//        $pdf->Cell(48, 4, "Rise No.: " . $data['rise_no'], 0, 1);
//
//        // Address
//        $pdf->SetXY(4, 62);
//        $pdf->SetFont('helvetica', '', 7);
//        $pdf->MultiCell(48, 4, "Add.: " . $data['address'], 0, 'L');
//
//        // Barcode - Smaller + Down
//        $style = ['border' => 0, 'padding' => 0, 'fgcolor' => [0, 0, 0], 'bgcolor' => false];
//        $pdf->write1DBarcode($data['rise_no'], 'C128', 5, 72, 44, 5, 0.3, $style, 'N');
//
//        // Principal Signature Placement
//        $pdf->SetFont('helvetica', '', 6);
//        $pdf->SetXY(33, 50);
////        $pdf->Cell(16, 5, "Principal's Signature", 0, 1, 'C');
//        // ---------------- BACK PAGE ---------------- //
//        $pdf->AddPage();
//        $pdf->Image('assets/images/icard_back_image1.jpg', 0, 0, 54, 86);
//
//        ob_end_clean();
//        $pdf->Output('ICard.pdf', 'I');
//        exit;
//    }
}
