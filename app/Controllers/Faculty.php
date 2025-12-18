<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelFacultyRegistration;
use App\Models\ModelBranch;
use App\Models\ModelRole;
use App\Models\ModelAcademicYear;

class Faculty extends BaseController {

    public $facultyModel;
    public $branchModel;
    public $modelrole;

    public function __construct() {
        $this->facultyModel = new ModelFacultyRegistration();
        $this->branchModel = new ModelBranch();
        $this->modelrole = new ModelRole();
        $this->modelacademicYear = new ModelAcademicYear();
    }

    public function index() {
        $data['jspath'] = 'faculty/add-faculty';
        $data['roles'] = $this->modelrole->getRoles();
        return render_page('faculty/faculty-index', $data);
    }

    public function add_faculty() {
        $post = $this->request->getPost();

        $insertData = [
            'faculty_role_id' => clean_number($this->request->getVar('faculty_role_id')),
            'faculty_first_name' => clean_name($this->request->getVar('faculty_first_name')),
            'faculty_middle_name' => clean_name($this->request->getVar('faculty_middle_name')),
            'faculty_last_name' => clean_name($this->request->getVar('faculty_last_name')),
            'faculty_mobile_number' => $this->request->getVar('faculty_mobile_number'),
            'faculty_email_id' => clean_email($this->request->getVar('faculty_email_id')),
            'faculty_aadhar_number' => $this->request->getVar('faculty_aadhar_number'),
            'faculty_pan_number' => clean_name($this->request->getVar('faculty_pan_number')),
            'faculty_password' => clean_name($this->request->getVar('faculty_password')),
            'added_by'      => session('rise_no'),
        ];

        // 2️⃣ MODEL VALIDATION RUNS HERE
        if (!$this->facultyModel->insert($insertData)) {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->facultyModel->errors(),
                        'csrfHash' => csrf_hash(),
            ]);
        }
        $facultyId = $this->facultyModel->getInsertID();

        // 4️⃣ Generate Rise No
        $branch = $this->branchModel->getSingleBranch();
        $branchCode = $branch['branch_code'] ?? '000';
        $academicYear = $this->modelacademicYear->getCurrentAcademicYear();

        $year = !empty($academicYear['academic_year_name']) ? explode('-', $academicYear['academic_year_name'])[0] : date('Y');

//        $year = explode('-', $this->modelacademicYear->getCurrentYear()['academic_year_name'])[0];

        $riseNo = 'F' . $year . $branchCode . str_pad($facultyId, 4, '0', STR_PAD_LEFT);

        $this->facultyModel->update($facultyId, [
            'faculty_rise_no' => $riseNo
        ]);

        return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Faculty added successfully. ID: ' . $riseNo,
                    'csrfHash' => csrf_hash(),
        ]);
    }
    
    
    public function faculty_data(){
        
         $data['jspath'] = 'faculty/add-faculty';
        $data['roles'] = $this->modelrole->getRoles();
        return render_page('faculty/manage-faculty',$data);
        
    }


    public function fetch_faculty()
{
    $draw   = $this->request->getPost('draw');
    $start  = $this->request->getPost('start');
    $length = $this->request->getPost('length');
    $search = $this->request->getPost('search')['value'] ?? '';

    // TOTAL RECORDS
    $recordsTotal = $this->facultyModel->countAll();

    // FILTERED RECORDS
    $recordsFiltered = $this->facultyModel->countAllResults(false);

    // PAGINATED DATA
    $rows = $this->facultyModel
        ->orderBy('faculty_registration_id', 'DESC')
        ->findAllRecord($length, $start);

    $sr_no = $start + 1;
    $data  = [];

    foreach ($rows as $row) {

//        $buttons = '';

//        $buttons .= '<a href="faculty/edit-faculty/' . $row['faculty_registration_id'] . '" 
//                        class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill">
//                        <i class="ri-pencil-fill"></i>
//                     </a>';
//
//        $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill delete"
//                        data-id="' . $row['faculty_registration_id'] . '"
//                        data-name="' . $row['faculty_first_name'] . '">
//                        <i class="ri-delete-bin-fill"></i>
//                      </button>';

        $fullName =
    $row['faculty_first_name'] . ' ' .
    $row['faculty_middle_name'] . ' ' .
    $row['faculty_last_name'];


        $data[] = [
            $sr_no++,
            $row['faculty_rise_no'],
            $fullName,
            $row['faculty_mobile_number'],
            $row['faculty_email_id'],
//            $buttons
        ];
    }

    return $this->response->setJSON([
        'draw'            => intval($draw),
        'recordsTotal'    => $recordsTotal,
        'recordsFiltered' => $recordsFiltered,
        'data'            => $data,
        'csrfHash'        => csrf_hash()
    ]);
}

}
