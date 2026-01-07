<?php

namespace App\Controllers;

use App\Models\ModelBonafideCertificate;


class BonafideCertificateReport extends BaseController{
    protected $modelbonafidecertificate;
    protected $modelyearwisestudentdata;

    public function __construct() {
        $this->modelbonafidecertificate = model('ModelBonafideCertificate');
        $this->modelyearwisestudentdata = model('ModelYearwiseStudentData');
        $this->modeldepartment = model('ModelDepartment');
    }

    public function index() {
        $data['jspath'] = 'certificates/bonafide-certificate-report';
        $data['title'] = lang('App.rise') . "-" . lang('App.bonafide') . " " . lang('App.certificate') . " " . lang('App.report');
        $data['departments'] = $this->modeldepartment->get_departments();
        return render_page('certificates/bonafide-certificate-report-index', $data);
    }
    
    public function fetch_bonafide_report() {
        $rules = [
            'from_date' => 'required',
            'to_date' => 'required',
            'department_id' => 'required'
        ];
        $messages = [
            'from_date' => [
                'required' => 'Please select date.'
            ],
            'to_date' => [
                'required' => 'Please select date.',
            ],
            'department_id' => [
                'required' => 'Please select department.'
            ]
        ];

        if ($this->validate($rules, $messages)) {
            $draw = (int) $this->request->getVar('draw');
            $start = (int) $this->request->getVar('start');
            $length = (int) $this->request->getVar('length');
            $search = $this->request->getVar('search')['value'] ?? '';

            $filters = [
                'from_date' => $this->request->getVar('from_date') . ' 00:00:00',
                'to_date' => $this->request->getVar('to_date') . ' 23:59:59',
                'department_id' => $this->request->getVar('department_id')
            ];

            // Data rows (paginated + searched)
            $bonafide_report_data = $this->modelbonafidecertificate->get_bonafide_report($filters, $length, $start, $search);
            // Single count (search-aware)
            $count_filter = $this->modelbonafidecertificate->count_filter_results($filters, $search);
            $count_all = $this->modelbonafidecertificate->count_all_results($filters);

            $sr_no = 1;
            $data = [];

            foreach ($bonafide_report_data as $bonafide) {


                $badges = '';
                if ($bonafide['is_cancelled'] == 1) {
                    $badges = '<span class="badge bg-danger-transparent">Cancelled</span>';
                } 
                $buttons = '';
                // Print Button
//                if (hasPermission('printBonafideCertificate') || $bonafide['is_print'] == 0):
                if ($bonafide['is_print'] == 0):
                    $buttons .= actionButton('Print', ['bonafide-certificate-id' => $bonafide['bonafide_certificate_id']]);
                endif;
                $today = date('Y-m-d');
                $bonafide_date = date('Y-m-d', strtotime($bonafide['added_at']));
//                if (hasPermission('updateBonafideCertificate') && $bonafide['is_cancelled'] != 1 && $bonafide_date === $today):
                if ($bonafide['is_cancelled'] != 1 && $bonafide_date === $today):
                    $buttons .= actionButton('Cancel', ['bonafide-certificate-id' => $bonafide['bonafide_certificate_id']]);
                endif;

                $data[] = [
                    $buttons,
                    $sr_no++,
                    $bonafide['student_rise_no'],
                    $bonafide['student_first_name'] . ' ' . $bonafide['student_middle_name'] . ' ' . $bonafide['student_last_name'],
                    $bonafide['academic_year_name'],
                    $bonafide['department_name'],
                    $bonafide['year_name'],
                    $badges,
                    
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

    public function print_bonafide() {
        $bonafide_id = $this->request->getVar('bonafide_id');
        if ($bonafide_id) {
            $data['bonafide_data'] = $bonafide_data = $this->modelbonafidecertificate->find($bonafide_id);

            $data['yearwise_data'] = $this->modelyearwisestudentdata->get_student_data_for_bonafide($bonafide_data['yearwise_student_data_id']);

        }
       
        $this->modelbonafidecertificate->update($bonafide_id, ['is_print' => 1]);
        // Correct mPDF 8.2+ constructor
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $mpdf->shrink_tables_to_fit = 0;
        $html = view('certificates/bonafide-certificate-print', $data);
        $mpdf->simpleTables = false;
        $mpdf->WriteHTML($html);
        $mpdf->use_kwt = true;
        $mpdf->falseBoldWeight = 8;
        $mpdf->fonttrans['freeserif'] = 'freeserif2';
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->adjustFontDescLineheight = 100;
        // Output PDF
        $mpdf->Output('Bonafide-Certificate.pdf', 'I');
        exit;
    }

    public function cancel_bonafide() {

        $bonafide_id = $this->request->getVar('bonafide_id');

        if ($bonafide_id) {
            $this->modelbonafidecertificate->update($bonafide_id, [
                'is_cancelled' => 1,
                'updated_by' => session('rise_no'),
            ]);

            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Bonafide Certificate cancelled successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Invalid Bonafide ID',
                        'csrfHash' => csrf_hash()
            ]);
        }
    }
}
