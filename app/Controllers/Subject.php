<?php

namespace App\Controllers;

/**
 * Description of Subject
 *
 * @author VG
 */
class Subject extends BaseController {

    protected $modelsubject;
    protected $modelfacultyregistration;

    public function __construct() {
        $this->modelsubject = model('ModelSubject');
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
    }

    public function search_subject() {
        $term = $this->request->getGet('q');

        return $this->response->setJSON($this->modelsubject->search_subject($term));
    }

    public function index() {
        $data['jspath'] = 'subject/subject-index';
        $data['title'] = lang('App.rise') . " - " . lang('App.manage') . " " . lang('App.subject');
        return render_page('subject/subject-index', $data);
    }
    
    public function fetch_subject() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modelsubject->countAllSubject();

        // FILTERED
        $recordsFiltered = $this->modelsubject->countFilteredSubject($search);

        // DATA
        $rows = $this->modelsubject->getFilteredSubject($length, $start, $search);

        $facultyNameMap = $nameMap = $this->modelfacultyregistration->getFacultyRiseNumberNameMap();

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            // Edit Button
            if (hasPermission('updateSubject')):
                $buttons .= actionButton('Edit', ['subject_id' => $row['subject_id'], 'subject_name' => $row['subject_name'], 'subject_code' => $row['subject_code']]);
            endif;

            // Delete Button
            if (hasPermission('deleteSubject')):
                if ($row['is_deleted'] != 1):
                    $buttons .= actionButton('Delete', ['subject_id' => $row['subject_id'], 'subject_name' => $row['subject_name'], 'subject_code' => $row['subject_code']]);
                elseif ($row['is_deleted'] == 1):
                    $buttons .= actionButton('Revert', ['subject_id' => $row['subject_id'], 'subject_name' => $row['subject_name'], 'subject_code' => $row['subject_code']]);
                endif;
            endif;

            // Added By
            if (!empty($row['added_by']) && !empty($row['added_at'])):
                $addedBy = activityBadge('success', $facultyNameMap[$row['added_by']], $row['added_at']);
            else:
                $addedBy = "";
            endif;

            // Updated By
            if (!empty($row['updated_by']) && !empty($row['updated_at'])):
                $updatedBy = activityBadge('primary', $facultyNameMap[$row['updated_by']], $row['updated_at']);
            else:
                $updatedBy = "";
            endif;

            // Remark
            if ($row['is_deleted'] == 1 && !empty($row['deleted_by']) && !empty($row['deleted_at'])):
                $remark = activityBadge('danger', $facultyNameMap[$row['deleted_by']], $row['deleted_at'], "Deleted By");

            elseif ($row['is_deleted'] == 2 && !empty($row['deleted_by']) && !empty($row['deleted_at'])):
                $remark = activityBadge('warning', $facultyNameMap[$row['deleted_by']], $row['deleted_at'], "Reverted By");
            else:
                $remark = "";
            endif;

            $data[] = [
                $buttons,
                $sr_no++,
                esc($row['subject_name']),
                esc($row['subject_code']),
                $addedBy,
                $updatedBy,
                $remark,
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

    public function save_subject() {
        $insert_data = [
            'subject_name' => clean_name($this->request->getVar('subject_name')),
            'subject_code' => clean_name($this->request->getVar('subject_code')),
            'added_by' => current_user(),
        ];

        if ($this->modelsubject->insert($insert_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Subject added successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelsubject->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function update_subject() {
        $id = $this->request->getPost('subject_id');

        $update_data = [
            'subject_name' => clean_name($this->request->getVar('subject_name')),
            'subject_code' => clean_name($this->request->getVar('subject_code')),
            'updated_by' => current_user(),
        ];

        $this->modelsubject->setValidationRules(
                $this->modelsubject->rulesForUpdate($id)
        );

        if ($this->modelsubject->update($id, $update_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Subject updated successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelsubject->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function delete_subject() {
        $subject_id = $this->request->getPost('subject_id');

        $delete_data = [
            'is_deleted' => 1,
            'deleted_by' => current_user(),
        ];

        if ($this->modelsubject->update($subject_id, $delete_data)) {

            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function revert_subject() {
        $subject_id = $this->request->getPost('subject_id');

        $revert_data = [
            'is_deleted' => 2,
            'deleted_by' => current_user(),
        ];

        if ($this->modelsubject->update($subject_id, $revert_data)) {

            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }
}
