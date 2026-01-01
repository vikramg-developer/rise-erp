<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Feedback extends BaseController {

    protected $modelfeedback;
    protected $modelacademicyear;
    protected $modelsemester;
    protected $modelsemesterpart;
    protected $modelsubjecttype;
    protected $modelfacultyregistration;

    public function __construct() {
        $db = \Config\Database::connect();
        $this->modelfeedback = model('ModelFeedback');
        $this->modelacademicyear = model('ModelAcademicYear');
        $this->modelsemester = model('ModelSemester');
        $this->modelsemesterpart = model('ModelSemesterPart');
        $this->modelsubjecttype = model('ModelSubjectType');
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
    }

    public function index() {
        $data['jspath'] = 'feedback/feedback-master';
        $data['title'] = lang('App.rise') . " - " . lang('App.feedback') . " " . lang('App.master');
        $data['academic_year'] = $this->modelacademicyear->get_active_academic_years();
        $data['semester'] = $this->modelsemester->get_active_semester();
        $data['semester_part'] = $this->modelsemesterpart->get_semester_part();
        $data['subject_type'] = $this->modelsubjecttype->get_subject_type();
        return render_page('feedback/feedback-master', $data);
    }

    public function save_feedback_master() {
        $id = $this->request->getPost('feedback_master_id');

        $data = [
            'feedback_name' => clean_name($this->request->getVar('feedback_name')),
            'type_id' => ($this->request->getVar('type_id')),
            'semester_id' => ($this->request->getVar('semester_id')),
            'part_id' => ($this->request->getVar('part_id')),
            'academic_year_id' => ($this->request->getVar('academic_year_id')),
        ];

        if (!empty($id)) {
            $data['updated_by'] = current_user();

            if (!$this->modelfeedback->update($id, $data)) {
                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => $this->modelfeedback->errors(),
                            'csrfHash' => csrf_hash()
                ]);
            }

            $action = 'UPDATE';
        } else {
            $data['added_by'] = current_user();

            if (!$this->modelfeedback->insert($data)) {
                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => $this->modelfeedback->errors(),
                            'csrfHash' => csrf_hash()
                ]);
            }

            $action = 'INSERT';
        }

//        $lastQuery = (string) $this->modelfeedback->db->getLastQuery();

        return $this->response->setJSON([
                    'status' => 'success',
                    'action' => $action,
//                    'query' => $lastQuery,
                    'csrfHash' => csrf_hash()
        ]);
    }

    public function get_feedback_master() {
        $id = $this->request->getPost('feedback_master_id');

        $data = $this->modelfeedback
                ->where('feedback_master_id', $id)
                ->first();

        return $this->response->setJSON([
                    'status' => 'success',
                    'data' => $data,
                    'csrfHash' => csrf_hash()
        ]);
    }

    public function fetch_feedback_master() {
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');

        $model = $this->modelfeedback;

        // TOTAL RECORDS
        $recordsTotal = $model->where('is_deleted', 0)->countAllResults();

        // FILTERED RECORDS
        $recordsFiltered = $model->countAllResults(false);

        // Main Table DATA
        $rows = $model->getFeedbackMasterList($length, $start);

        // MAP: rise_no => full name
        $facultyNameMap = $this->modelfacultyregistration->getRiseNoNameMap();

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';
            /* ===================== Edit Button===================== */
            if (hasPermission('updateFeedback')):
                $buttons .= actionButton('Edit', ['id' => $row['feedback_master_id']]);
            endif;
            /* ===================== Delete Button ===================== */
            if (hasPermission('deleteFeedback')):
                if ($row['is_deleted'] != 1):
                    $buttons .= actionButton('Delete', ['id' => $row['feedback_master_id'], 'feedback_master_name' => $row['feedback_name']]);
                elseif ($row['is_deleted'] == 1):
                    $buttons .= actionButton('Revert', ['id' => $row['feedback_master_id'], 'feedback_master_name' => $row['feedback_name']]);
                endif;
            endif;
            /* ===================== manage-question ===================== */
            $manage_button = '';
            $manage_button = '<a href="' . base_url('feedback/manage-question') . '"  class="btn btn-sm btn-success btn-wave">
                       <i class="ri-upload-2-line align-middle me-2 d-inline-block"></i>' . lang('App.manage') . ' ' . lang('App.question') . '
                     </a>';
            /* ===================== Added By ===================== */
            if (!empty($row['added_by']) && !empty($row['added_at'])):
                $addedBy = activityBadge('success', $facultyNameMap[$row['added_by']], $row['added_at']);
            else:
                $addedBy = "";
            endif;
            /* ===================== Updated By ===================== */
            if (!empty($row['updated_by']) && !empty($row['updated_at'])):
                $updatedBy = activityBadge('primary', $facultyNameMap[$row['updated_by']], $row['updated_at']);
            else:
                $updatedBy = "";
            endif;

            /* ===================== Deleted By ===================== */
            if ($row['is_deleted'] == 1 && !empty($row['deleted_by']) && !empty($row['deleted_at'])):
                $remark = activityBadge('danger', $facultyNameMap[$row['deleted_by']], $row['deleted_at'], "Deleted By");

            elseif ($row['is_deleted'] == 2 && !empty($row['deleted_by']) && !empty($row['deleted_at'])):
                $remark = activityBadge('warning', $facultyNameMap[$row['deleted_by']], $row['deleted_at'], "Reverted By");
            else:
                $remark = "";
            endif;

            /* ============================================================ */
            $data[] = [
                $buttons,
                $sr_no++,
                $row['feedback_name'],
                $row['subject_type_name'],
                $row['semester_name'],
                $row['semester_part_name'],
                $row['academic_year_name'],
                $addedBy,
                $updatedBy,
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

    public function delete_feedback_master() {

        $feedback_master_id = $this->request->getPost('feedback_master_id');

        if ($this->modelfeedback->update($feedback_master_id, [
                    'is_deleted' => 1,
                    'deleted_by' => current_user()
                ])) {

            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function revert_feedback_master() {
        
        $feedback_master_id = $this->request->getPost('feedback_master_id');

        if ($this->modelfeedback->update($feedback_master_id, ['is_deleted' => 2])) {

            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function sample_excel_file() {

        $filePath = FCPATH . 'uploads/Sample_file.xlsx';      // example path

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        } else {
            return "File not found!";
        }
    }

    public function manage_question($id = null) {
        // $data['feedback'] = $this->modelFeedback->find($id);
        $data['title'] = lang('App.rise') . " - " . lang('App.manage') . " " . lang('App.question');
        return render_page('feedback/manage-question'); // view path
    }
}
