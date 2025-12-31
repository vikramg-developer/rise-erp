<?php

namespace App\Controllers;

/**
 * Description of ApproveRegistration
 *
 * @author SDC01
 */
class ApproveRegistration extends BaseController {

    protected $modelstudentregistration;

    public function __construct() {
        $this->modelstudentregistration = model('ModelStudentRegistration');
    }

    public function index() {
                $data['jspath'] = 'registration/approve-registration';
        $data['title'] = lang('App.rise') . "-" . lang('App.approve') . " " . lang('App.registration');
                return render_page('registration/approve-registration',$data);

        
    }
      public function fetch_registrationstudent() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modelstudentregistration->countAllStudent();

        // FILTERED
        $recordsFiltered = $this->modelstudentregistration->countFilteredData($search);

        // DATA
        $rows = $this->modelstudentregistration->getFilteredData($length, $start, $search);

//        $facultyNameMap = $nameMap = $this->modelfacultyregistration->getRiseNoNameMap();

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            // Edit Button
            
   

            $data[] = [
                $sr_no++,
                $row['student_rise_no'],
                $row['student_last_name']." ".$row['student_first_name']." ".$row['student_middle_name'],
                'BA',
                'FirstYear',
                '2025-2026',
                '2025-2026',
                '2025-2026',
            ];
        }

        return $this->response->setJSON([
                    'draw' => $draw,
                    'recordsTotal' => $recordsTotal,
                    'recordsFiltered' => $recordsFiltered,
                    'data' => $data,
                    'csrfHash' => csrf_hash() // send fresh token back
        ]);
    }

    
}
