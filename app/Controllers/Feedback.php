<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelFeedback;
use App\Models\ModelAcademicYear;
use App\Models\ModelSemester;
use App\Models\ModelSemesterPart;
use App\Models\ModelSubjectType;

class Feedback extends BaseController {

    protected $modelfeedback;
    protected $modelacademicyear;
    protected $modelsemester;
    protected $modelsemesterpart;
    protected $modelsubjecttype;

    public function __construct() {
        $this->modelfeedback = model('ModelFeedback');
        $this->modelacademicyear = model('ModelAcademicYear');
        $this->modelsemester = model('ModelSemester');
        $this->modelsemesterpart = model('ModelSemesterPart');
        $this->modelsubjecttype = model('ModelSubjectType');
    }

    public function index() {
        $data['jspath'] = 'feedback/feedback-master';
        $data['academic_year'] = $this->modelacademicyear->get_active_academic_years();
        $data['semester'] = $this->modelsemester->get_active_semester();
        $data['semester_part'] = $this->modelsemesterpart->get_semester_part();
        $data['subject_type'] = $this->modelsubjecttype->get_subject_type();
        return render_page('feedback/feedback-master', $data);
    }

    public function fetch_feedback_master() {
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
//        $search = $this->request->getPost('search')['value'] ?? '';

        $model = $this->modelfeedback;

        // TOTAL RECORDS
        $recordsTotal = $model->where('is_deleted', 0)->countAllResults();

        // FILTERED RECORDS
        $recordsFiltered = $model->countAllResults(false);
//        $recordsFiltered = $model->countFiltered($search);
        //SEARCH FILTERgit
//        if ($search !== '') {
//            $model->like('feedback_name', $search);
//        }
        // PAGINATED DATA
//        $rows = $model->findAll($length, $start);
        $rows = $model->getFeedbackMasterList($length, $start);
//        print_r($rows);die();
//        $buttons = '';


        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            $manage_button = '<a href="' . base_url('feedback/manage-question') . '"  class="btn btn-sm btn-success btn-wave">
                       <i class="ri-upload-2-line align-middle me-2 d-inline-block"></i>' . lang('App.manage') . ' ' . lang('App.question') . '
                     </a>';

            $buttons .= '<a href="' . base_url() . 'feedback/manage-question/' . $row['feedback_master_id'] . '" 
                        class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill">
                        <i class="ri-pencil-fill"></i>
                     </a>';

            if ($row['is_deleted'] != 1):
                $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill delete" data-feedback_master_id="' . $row['feedback_master_id'] . '" data-feedback_name="' . $row['feedback_name'] . '"><i class="ri-delete-bin-fill"></i></button>';
            elseif ($row['is_deleted'] == 1):
                $buttons .= ' <button class="btn btn-icon btn-sm btn-warning btn-wave rounded-pill revert" data-feedback_master_id="' . $row['feedback_master_id'] . '" data-feedback_name="' . $row['feedback_name'] . '"><i class="ri-arrow-go-back-fill"></i></button>';
            endif;

            if ($row['is_deleted'] == 1):
                $remark = "Deleted By Admin";
            elseif ($row['is_deleted'] == 2):
                $remark = "Reverted By Admin";
            else:
                $remark = "";
            endif;

            $data[] = [
                $sr_no++,
                $row['feedback_name'],
                $row['subject_type_name'],
                $row['semester_name'],
                $row['semester_part_name'],
                $row['academic_year_name'],
                $buttons,
                $remark,
                $manage_button,
            ];
        }

        return $this->response->setJSON([
                    'draw' => $draw,
                    'recordsTotal' => $recordsTotal,
                    'recordsFiltered' => $recordsFiltered,
                    'data' => $data,
                    'csrfHash' => csrf_hash()
        ]);
    }

    public function save_feedback_master() {
        $insert_data = [
            'feedback_name' => clean_name($this->request->getVar('feedback_name')),
            'type_id' => ($this->request->getVar('type_id')),
            'semester_id' => ($this->request->getVar('semester_id')),
            'part_id' => ($this->request->getVar('part_id')),
            'academic_year_id' => ($this->request->getVar('academic_year_id')),
            'added_by' => session('rise_no'),
        ];

        if ($this->modelfeedback->insert($insert_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Feedback Master added successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelfeedback->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function delete_feedback_master() {
        if ($this->request->getMethod() == 'post') {
            $feedback_master_id = $this->request->getPost('feedback_master_id');

            if ($this->modelfeedback->update($feedback_master_id, ['is_deleted' => 1])) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }

    public function revert_feedback_master() {
        if ($this->request->getMethod() == 'post') {
            $feedback_master_id = $this->request->getPost('feedback_master_id');

            if ($this->modelfeedback->update($feedback_master_id, ['is_deleted' => 2])) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }

    public function sample_excel_file() {
//        $filePath = FCPATH . 'uploads\Sample_file.xlsx';      // example path
        $filePath = FCPATH . 'uploads/Sample_file.xlsx';      // example path

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        } else {
            return "File not found!";
        }
    }

    public function manage_question($id = null) {
        // $data['feedback'] = $this->modelFeedback->find($id);
        return render_page('feedback/manage-question'); // view path
    }
}
