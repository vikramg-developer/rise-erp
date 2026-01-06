<?php

namespace App\Controllers;

class BonafideCertificate extends BaseController {

    protected $modelbonafidecertificate;
    protected $modelyearwisestudentdata;
    protected $modelacademicyear;
    protected $modelyear;
    protected $modeldepartment;
    protected $modelbonafidecertificatecounter;

    public function __construct() {
        $this->modelbonafidecertificate = model('ModelBonafideCertificate');
        $this->modelyearwisestudentdata = model('ModelYearwiseStudentData');
        $this->modelacademicyear = model('ModelAcademicYear');
        $this->modelyear = model('ModelYear');
        $this->modeldepartment = model('ModelDepartment');
        $this->modelbonafidecertificatecounter = model('ModelBonafideCertificateCounter');
        $this->db = \Config\Database::connect();
    }

    public function index() {
        $data['jspath'] = 'certificates/bonafide-certificate';
        $data['title'] = lang('App.rise') . "-" . lang('App.bonafide') . " " . lang('App.certificate');
        $data['academic_year'] = $this->modelacademicyear->get_active_academic_years();
        $data['years'] = $this->modelyear->get_years();
        $data['departments'] = $this->modeldepartment->get_departments();
        return render_page('certificates/bonafide-certificate-index', $data);
    }

    public function fetch_bonafide_student_list() {
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
                $buttons .= '<button class="btn btn-secondary bonafide_btn" data-yearwise-student-data-id="' . $student['yearwise_student_data_id'] . '">' . lang('App.bonafide') . ' ' . lang('App.certificate') . '</button>';

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

    public function add_bonafide_certificate_data() {
        $bonafide_counter_data = $this->modelbonafidecertificatecounter->find(1);
        if ($bonafide_counter_data == null) {
            $data = ['bonafide_certificate_no' => 1];

            $this->modelbonafidecertificatecounter->insert($data);
        }

        $this->db->transBegin();
        try {

            // 🔒 1️⃣ LOCK LC COUNTER ROW
            $bonafide_no_counter = $this->modelbonafidecertificatecounter->get_bonafide_certificate_no();
            $ysd_id = $this->request->getVar('yearwise_student_data_id');
//            print_r($ysd_id);die();
            $bonafide_data = [
                'yearwise_student_data_id' => $ysd_id,
                'bonafide_certificate_no' => $bonafide_no_counter['bonafide_certificate_no'],
                'authorized_person' => $this->request->getVar('authorized_person'),
                'bonafide_valid_upto' => $this->request->getVar('bonafide_valid_upto'),
                'added_by' => session('rise_no'),
            ];
//            print_r($bonafide_data);die();
            $bonafide_id = $this->modelbonafidecertificate->insert($bonafide_data, true);

            if ($bonafide_id) {
                $update_data = ['bonafide_certificate_no' => ($bonafide_no_counter['bonafide_certificate_no'] + 1)];
                $this->modelbonafidecertificatecounter->update($bonafide_no_counter['bonafide_certificate_no_counter_id'], $update_data);

                // 5️⃣ Final transaction check
                if ($this->db->transStatus() === false) {
                    throw new \Exception('bonafide_id transaction failed');
                }
            } else {
                // =========Validation failed============

                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => $this->modelbonafidecertificate->errors(),
                            'csrfHash' => csrf_hash()
                ]);
            }
            // =========Commit=========
            $this->db->transCommit();

            return $this->response->setJSON([
                        'status' => 'success',
                        'bonafide_id' => $bonafide_id,
                        'csrfHash' => csrf_hash()
            ]);
        } catch (Exception $ex) {
            $this->db->transRollback();

            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => ['exception' => 'Something went wrong'],
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function print_bonafide_certificate() {
        $bonafide_id = $this->request->getVar('bonafide_id');
        if ($bonafide_id) {
            $data['bonafide_data'] = $bonafide_data = $this->modelbonafidecertificate->find($bonafide_id);

            $data['yearwise_data'] = $this->modelyearwisestudentdata->get_student_data_for_bonafide($bonafide_data['yearwise_student_data_id']);
        } elseif ($this->request->getMethod() === 'post') {
            $ysd_id = $this->request->getVar('yearwise_student_data_id');
//            print_r($ysd_id);die();
            $data['bonafide_data'] = [
                'authorized_person' => $this->request->getVar('authorized_person'),
                'bonafide_valid_upto' => $this->request->getVar('bonafide_valid_upto'),
            ];

            $data['yearwise_data'] = $this->modelyearwisestudentdata->get_student_data_for_bonafide($ysd_id);
        }
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $mpdf->shrink_tables_to_fit = 0;
        $mpdf->simpleTables = false;
        $mpdf->use_kwt = true;
        $mpdf->falseBoldWeight = 8;
        $mpdf->fonttrans['freeserif'] = 'freeserif2';
        $mpdf->useFixedNormalLineHeight = true;
        $mpdf->useFixedTextBaseline = true;
        $mpdf->adjustFontDescLineheight = 100;
        $html = view('certificates/bonafide-certificate-print', $data);
        $mpdf->WriteHTML($html);

        // Output PDF
        $mpdf->Output('Bonafide-Certificate.pdf', 'I');
        exit; // VERY IMPORTANT
    }
}
