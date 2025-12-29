<?php

namespace App\Controllers;

use App\Models\ModelLeavingCertificate;

class LeavingCertificateReport extends BaseController {

    protected $modelleavingcertificate;

    public function __construct() {
        $this->modelleavingcertificate = model('ModelLeavingCertificate');
        $this->modeldepartment = model('ModelDepartment');
    }

    public function index() {
        $data['jspath'] = 'certificates/leaving-certificate-report';
        $data['title'] = lang('App.rise') . "-" . lang('App.leaving') . " " . lang('App.certificate') . " " . lang('App.report');
        $data['departments'] = $this->modeldepartment->get_departments();
        return render_page('certificates/leaving-certificate-report', $data);
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
//            print_r($filters);die();
            // Data rows (paginated + searched)
            $lc_report_data = $this->modelleavingcertificate->get_lc_report($filters, $length, $start, $search);

            // Single count (search-aware)
            $count_filter = $this->modelleavingcertificate->count_filter_results($filters, $search);
            $count_all = $this->modelleavingcertificate->count_all_results($filters);

            $data = [];

            foreach ($lc_report_data as $lc) {


                $badges = '';
                if ($lc['is_duplicate'] == 1) {
                    $badges = '<span class="badge bg-danger-transparent">Duplicate</span>';
                } elseif ($lc['is_cancelled'] == 1) {
                    $badges = '<span class="badge bg-warning-transparent">Cancelled</span>';
                }

                $buttons = '';
                $buttons .= '<button class="btn btn-secondary lc_btn" data-yearwise_student_data_id="' . $lc['yearwise_student_data_id'] . '">' . lang('App.print') . '</button>';

                $data[] = [
                    $lc['yearwise_student_data_id'],
                    $lc['student_rise_no'],
                    $lc['student_first_name'] . ' ' . $lc['student_middle_name'] . ' ' . $lc['student_last_name'],
                    $lc['academic_year_name'],
                    $lc['department_name'],
                    $lc['year_name'],
                    $badges,
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
}
