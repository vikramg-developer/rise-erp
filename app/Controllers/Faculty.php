<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FacultyRegistrationModel;
use App\Models\ModelBranch;

class Faculty extends BaseController {

    public $facultyModel;
    public $branchModel;

    public function __construct() {
        $this->facultyModel = new FacultyRegistrationModel();
        $this->branchModel = new ModelBranch();
    }

    public function index() {
        $data['jspath'] = 'faculty/add-faculty';
        return render_page('faculty/index', $data);
    }

    public function add_faculty() {
        if ($this->request->getMethod() == 'post') {

            $postData = $this->request->getPost();

            if (!$this->facultyModel->validate($postData)) {
                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => $this->facultyModel->errors(),
                            'csrfHash' => csrf_hash()
                ]);
            }
           
            $insert_data = [
                'faculty_role_id' => $this->request->getVar('faculty_role_id'),
                'faculty_first_name' => clean_name($this->request->getVar('faculty_first_name')),
                'faculty_middle_name' => clean_name($this->request->getVar('faculty_middle_name')),
                'faculty_last_name' => clean_name($this->request->getVar('faculty_last_name')),
                'faculty_mobile_number' => $this->request->getVar('faculty_mobile_number'),
                'faculty_email_id' => clean_name($this->request->getVar('faculty_email_id')),
                'faculty_aadhar_number' => $this->request->getVar('faculty_aadhar_number'),
                'faculty_pan_number' => clean_name($this->request->getVar('faculty_pan_number')),
                'faculty_password' => password_hash($this->request->getVar('confirm_password'),PASSWORD_BCRYPT),               
                'added_by' => session()->get('user_id') ?? null
            ];

            $facultyId = $this->facultyModel->insert($insert_data);

            if (!$facultyId) {
                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => $this->facultyModel->errors(),
                            'csrfHash' => csrf_hash()
                ]);
            }

            $branch = $this->branchModel->getSingleBranch();

            $branchCode = $branch['branch_code'] ?? '000';

            $year = date('Y');
            $serial = str_pad($facultyId, 3, '0', STR_PAD_LEFT);

            $facultyRiseNo = 'F' . $year . $branchCode . $serial;

            $this->facultyModel->update($facultyId, [
                'faculty_rise_no' => $facultyRiseNo
            ]);
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Faculty added successfully. ID: ' . $facultyRiseNo,
                        'csrfHash' => csrf_hash()
            ]);
        }

        return render_page('error_page/error404');
    }
}
