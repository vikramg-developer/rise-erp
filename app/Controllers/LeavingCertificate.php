<?php

namespace App\Controllers;

use App\Models\ModelLeavingCertificate;

class LeavingCertificate extends BaseController {

    protected $modelleavingcertificate;
    protected $modelyearwisestudentdata;
    protected $modelacademicyear;
    protected $modelyear;
    protected $modeldepartment;

    public function __construct() {
        $this->modelleavingcertificate = model('ModelLeavingCertificate');
        $this->modelyearwisestudentdata = model('ModelYearwiseStudentData');
        $this->modelacademicyear = model('ModelAcademicYear');
        $this->modelyear = model('ModelYear');
        $this->modeldepartment = model('ModelDepartment');
    }

    public function index() {
        $data['jspath'] = 'certificates/leaving-certificate';
        $data['title'] = lang('App.rise') . "-" . lang('App.leaving') . " " . lang('App.certifcate');
        $data['academic_year'] = $this->modelacademicyear->get_active_academic_years();
        $data['years'] = $this->modelyear->get_years();
        $data['departments'] = $this->modeldepartment->get_departments();
        return render_page('certificates/leaving-certificate-index', $data);
    }

    /* =============================DATATABLE AJAX================================== */

    public function fetch_lc_student_list() {
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
            $students = $this->modelyearwisestudentdata->get_lc_student_list($filters, $length, $start, $search);

            // Single count (search-aware)
            $count_filter = $this->modelyearwisestudentdata->count_filter_results($filters, $search);
            $count_all = $this->modelyearwisestudentdata->count_all_results($filters);

            $data = [];

            foreach ($students as $student) {

                //====To check Count of genrated LC for one student====
                $lc_data = $this->modelleavingcertificate->get_lc_data($student['yearwise_student_data_id']);
                $lc_count = is_array($lc_data) ? count($lc_data) : 0;
                $disabled = ($lc_count > 1) ? 'disabled' : '';
//                print_r(count($lc_data));die();
                $buttons = '';
                $buttons .= '<button class="btn btn-secondary lc_btn" ' . $disabled . ' data-yearwise_student_data_id="' . $student['yearwise_student_data_id'] . '">' . lang('App.leaving') . ' ' . lang('App.certificate') . '</button>';

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

    public function check_lc_exists() {
        $ysd_id = $this->request->getVar('yearwise_student_data_id');

        $lc_data = $this->modelleavingcertificate
                ->where('yearwise_student_data_id', $ysd_id)
                ->first();

        return $this->response->setJSON([
                    'exist_lc' => $lc_data ? true : false,
                    'lc_data' => $lc_data,
                    'csrfHash' => csrf_hash()
        ]);
    }

    public function add_leaving_certificate_data() {

        $data = [
            'yearwise_student_data_id' => $this->request->getVar('yearwise_student_data_id'),
            'examination' => $this->request->getVar('examination'),
            'exam_period' => $this->request->getVar('exam_period'),
            'date_of_leaving' => $this->request->getVar('date_of_leaving')
        ];
        $lc_id = $this->modelleavingcertificate->insert($data, true);
        if ($lc_id) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'lc_id' => $lc_id,
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelleavingcertificate->errors(),
                        'csrfHash' => csrf_hash(),
            ]);
        }
    }

    public function print_leaving_certificate() {
        $lc_id = $this->request->getVar('lc_id');
//        $ysd_id = $this->request->getGet('ysd_id');
        if ($lc_id) {
            $data['lc_data'] = $lc_data = $this->modelleavingcertificate->find($lc_id);

            $data['yearwise_data'] = $this->modelyearwisestudentdata->get_student_data_for_lc($lc_data['yearwise_student_data_id']);
            //====To check Count of genrated LC for one student====
            $data['lc_count'] = $this->modelleavingcertificate->get_lc_data($lc_data['yearwise_student_data_id']);
        } elseif ($this->request->getMethod() === 'post') {
            $ysd_id = $this->request->getVar('yearwise_student_data_id');
            $data['lc_data'] = [
                'examination' => $this->request->getVar('examination'),
                'exam_period' => $this->request->getVar('exam_period'),
                'date_of_leaving' => $this->request->getVar('date_of_leaving')
            ];             
            $data['lc_count'] = null;
            $data['yearwise_data'] = $this->modelyearwisestudentdata->get_student_data_for_lc($ysd_id);
        }

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
}
