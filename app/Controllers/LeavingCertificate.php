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
        $data['academic_year'] = $this->modelacademicyear->get_active_academic_years();
        $data['years'] = $this->modelyear->get_years();
        $data['departments'] = $this->modeldepartment->get_departments();
        return render_page('certificates/leaving-certificate-index', $data);
    }

    public function fetch_lc_student_list() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';
        
        $fields = [
            'department_id' => $this->request->getVar('department_id'),
            'year_id' => $this->request->getVar('year_id'),
            'academic_year_id' => $this->request->getVar('academic_year_id'),
        ];
        // PAGINATED DATA
        $student_list = $this->modelyearwisestudentdata->fetch_ysd_student_for_lc($fields, $length, $start);
        print_r($student_list); die();
        $recordsTotal = count($student_list);
        $recordsFiltered = $recordsTotal;
        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            $buttons .= '<button class="btn btn-icon btn-sm btn-secondary" data-yearwise_student_data_id="' . $row['yearwise_student_data_id'] . '" data-student_rise_no="' . $row['student_rise_no'] . '">Add LC Info</button>';
            $data[] = [
                $sr_no++,
                $row['head_group_name'],
                $buttons,
            ];
        }
    }

    public function add_lc_info() {

        $data = [];
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
////             $data['lc_data'] = $this->modelleavingcertificate->getLcData();
//            if($this->validate($rules))
//            {
//                $lc_data=
//                [
//                    'examination'=>$this->request->getVar('examination', FILTER_SANITIZE_STRING),
//                    'exam_held_in'=>$this->request->getVar('exam-held-in', FILTER_SANITIZE_STRING),
//                    'date_of_leaving'=>$this->request->getVar('date-of-leaving', FILTER_SANITIZE_NUMBER_INT)
//                ];
//                $add_lc_data=$this->modelleavingcertificate->addLcData($lc_data);
//                if($add_lc_data)
//                {                
        // Correct mPDF 8.2+ constructor
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
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
//                return render_page('certificate/leaving-certificate-index');
//                
//            }
////            
//            
//        }
        return render_page('certificate/leaving-certificate-index');
    }
}
