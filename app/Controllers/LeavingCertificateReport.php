<?php

namespace App\Controllers;

use App\Models\ModelLeavingCertificate;

class LeavingCertificateReport extends BaseController {

    protected $modelleavingcertificate;
    protected $modelyearwisestudentdata;

    public function __construct() {
        $this->modelleavingcertificate = model('ModelLeavingCertificate');
        $this->modelyearwisestudentdata = model('ModelYearwiseStudentData');
        $this->modeldepartment = model('ModelDepartment');
    }

    public function index() {
        $data['jspath'] = 'certificates/leaving-certificate-report';
        $data['title'] = lang('App.rise') . "-" . lang('App.leaving') . " " . lang('App.certificate') . " " . lang('App.report');
        $data['departments'] = $this->modeldepartment->get_departments();
        return render_page('certificates/leaving-certificate-report-index', $data);
    }

    public function fetch_lc_report() {
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
            $lc_report_data = $this->modelleavingcertificate->get_lc_report($filters, $length, $start, $search);
            // Single count (search-aware)
            $count_filter = $this->modelleavingcertificate->count_filter_results($filters, $search);
            $count_all = $this->modelleavingcertificate->count_all_results($filters);

            $sr_no = 1;
            $data = [];

            foreach ($lc_report_data as $lc) {

//
                $badges = '';
                if ($lc['is_cancelled'] == 1) {
                    $badges = '<span class="badge bg-danger-transparent">Cancelled</span>';
                } elseif ($lc['is_duplicate'] == 1) {
                    $badges = '<span class="badge bg-warning-transparent">Duplicate</span>';
                }
                $buttons = '';
                $attrs = [
                    'leaving-certificate-id' => $lc['leaving_certificate_id']
                ];

                // 🔒 disable ONLY when already printed AND no permission
//                if ($lc['is_print'] == 1 && !hasPermission('printLeavingCertificate')) {
                if ($lc['is_print'] == 1) {
                    $attrs['disabled'] = 'disabled';
                }
                $buttons .= actionButton('Print', $attrs);
                
                // cancel button                  
                $today = date('Y-m-d');
                $lc_date = date('Y-m-d', strtotime($lc['added_at']));
                if (hasPermission('updateLeavingCertificate') && $lc['is_cancelled'] != 1 && $lc_date === $today):
                    $buttons .= actionButton('Cancel', ['leaving-certificate-id' => $lc['leaving_certificate_id']]);
                endif;

                $data[] = [
                    $buttons,
                    $sr_no++,
                    $lc['student_rise_no'],
                    $lc['student_first_name'] . ' ' . $lc['student_middle_name'] . ' ' . $lc['student_last_name'],
                    $lc['academic_year_name'],
                    $lc['department_name'],
                    $lc['year_name'],
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

    public function print_lc() {
        $lc_id = $this->request->getVar('lc_id');
        if ($lc_id) {
            $data['lc_data'] = $lc_data = $this->modelleavingcertificate->find($lc_id);

            $data['yearwise_data'] = $this->modelyearwisestudentdata->get_student_data_for_lc($lc_data['yearwise_student_data_id']);
            //====To check Count of genrated LC for one student====
            $data['lc_count'] = $this->modelleavingcertificate->get_lc_data($lc_data['yearwise_student_data_id']);
        }
//        $this->modelleavingcertificate->update($lc_id, ['is_print' => 1]);
        // Correct mPDF 8.2+ constructor
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->shrink_tables_to_fit = 0;
        $html = view('certificates/leaving-certificate-print', $data);
        $mpdf->simpleTables = false;
        $mpdf->WriteHTML($html);
        $mpdf->use_kwt = true;
        $mpdf->falseBoldWeight = 8;
        $mpdf->fonttrans['freeserif'] = 'freeserif2';
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->adjustFontDescLineheight = 100;
        // Output PDF
        $mpdf->Output('Leaving-Certificate.pdf', 'I');
        exit;
    }

    public function mark_lc_printed() {
        $lc_id = $this->request->getVar('lc_id');

        if (!$lc_id) {
            return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Invalid LC ID',
                        'csrfHash' => csrf_hash()
            ]);
        }

        $this->modelleavingcertificate->update($lc_id, ['is_print' => 1]);

        return $this->response->setJSON([
                    'status' => 'success',
                    'csrfHash' => csrf_hash()
        ]);
    }

    public function cancel_lc() {

        $lc_id = $this->request->getVar('lc_id');

        if ($lc_id) {
            $this->modelleavingcertificate->update($lc_id, [
                'is_cancelled' => 1,
                'updated_by' => session('rise_no'),
            ]);

            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Leaving Certificate cancelled successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Invalid LC ID',
                        'csrfHash' => csrf_hash()
            ]);
        }
    }
}
