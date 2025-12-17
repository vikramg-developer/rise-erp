<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelFacultyRegistration;
use App\Models\ModelBranch;

class Faculty extends BaseController {

    public $facultyModel;
    public $branchModel;

    public function __construct() {
        $this->facultyModel = new ModelFacultyRegistration();
        $this->branchModel = new ModelBranch();
    }

    public function index() {
        $data['jspath'] = 'faculty/add-faculty';
        return render_page('faculty/faculty-index', $data);
    }

    public function demo() {
        echo "add faculty";
    }

    public function add_faculty() {
        $post = $this->request->getPost();

        // 1️⃣ INSERT WITH PLAIN PASSWORD (for validation)
        $insertData = [
            'role_id' => $this->request->getVar('faculty_role_id'),
            'faculty_first_name' => clean_name($this->request->getVar('faculty_first_name')),
            'faculty_middle_name' => clean_name($this->request->getVar('faculty_middle_name')),
            'faculty_last_name' => clean_name($this->request->getVar('faculty_last_name')),
            'faculty_mobile_number' => $this->request->getVar('faculty_mobile_number'),
            'faculty_email_id' => clean_name($this->request->getVar('faculty_email_id')),
            'faculty_aadhar_number' => $this->request->getVar('faculty_aadhar_number'),
            'faculty_pan_number' => clean_name($this->request->getVar('faculty_pan_number')),
            'faculty_password' => clean_name($this->request->getVar('faculty_password')),
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

        $riseNo = 'F' . date('Y') . $branchCode . str_pad($facultyId, 4, '0', STR_PAD_LEFT);

        $this->facultyModel->update($facultyId, [
            'faculty_rise_no' => $riseNo
        ]);

        return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Faculty added successfully. ID: ' . $riseNo,
                    'csrfHash' => csrf_hash(),
        ]);
    }
}
