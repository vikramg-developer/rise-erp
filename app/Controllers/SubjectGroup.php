<?php


namespace App\Controllers;

/**
 * Description of SubjectGroup
 *
 * @author VG
 */
class SubjectGroup extends BaseController{
    protected $modelsubjectgroup;
    protected $modelfacultyregistration;

    public function __construct() {
        $this->modelsubjectgroup = model('ModelSubjectGroup');
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
    }

    public function search_subject_group() {
        $term = $this->request->getGet('q');

        return $this->response->setJSON($this->modelsubjectgroup->search_subject_group($term));
    }

    public function index() {
        $data['jspath'] = 'subject-group/subject-group-index';
        $data['title'] = lang('App.rise') . " - " . lang('App.manage') . " " . lang('App.subject') . " " . lang('App.group');
        return render_page('subject_group/subject-group-index', $data);
    }
    
    public function fetch_subject_group() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modelsubjectgroup->countAllSubjectGroup();

        // FILTERED
        $recordsFiltered = $this->modelsubjectgroup->countFilteredSubjectGroup($search);

        // DATA
        $rows = $this->modelsubjectgroup->getFilteredSubjectGroup($length, $start, $search);

        $facultyNameMap = $nameMap = $this->modelfacultyregistration->getFacultyRiseNumberNameMap();

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            // Edit Button
            if (hasPermission('updateSubjectGroup')):
                $buttons .= actionButton('Edit', ['subject_group_id' => $row['subject_group_id'], 'subject_group_name' => $row['subject_group_name']]);
            endif;

            // Delete Button
            if (hasPermission('deleteSubjectGroup')):
                if ($row['is_deleted'] != 1):
                    $buttons .= actionButton('Delete', ['subject_group_id' => $row['subject_group_id'], 'subject_group_name' => $row['subject_group_name']]);
                elseif ($row['is_deleted'] == 1):
                    $buttons .= actionButton('Revert', ['subject_group_id' => $row['subject_group_id'], 'subject_group_name' => $row['subject_group_name']]);
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
                esc($row['subject_group_name']),
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

    public function save_subject_group() {
        $insert_data = [
            'subject_group_name' => clean_name($this->request->getVar('subject_group_name')),
            'added_by' => current_user(),
        ];

        if ($this->modelsubjectgroup->insert($insert_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Subject Group added successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelsubjectgroup->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function update_subject_group() {
        $id = $this->request->getPost('subject_group_id');

        $update_data = [
            'subject_group_name' => clean_name($this->request->getVar('subject_group_name')),
            'updated_by' => current_user(),
        ];

        $this->modelsubjectgroup->setValidationRules(
                $this->modelsubjectgroup->rulesForUpdate($id)
        );

        if ($this->modelsubjectgroup->update($id, $update_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Subject Group updated successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelsubjectgroup->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function delete_subject_group() {
        if ($this->request->getMethod() == 'post') {
            $subject_group_id = $this->request->getPost('subject_group_id');

            $delete_data = [
                'is_deleted' => 1,
                'deleted_by' => current_user(),
            ];

            if ($this->modelsubjectgroup->update($subject_group_id, $delete_data)) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }

    public function revert_subject_group() {
        if ($this->request->getMethod() == 'post') {
            $subject_group_id = $this->request->getPost('subject_group_id');

            $revert_data = [
                'is_deleted' => 2,
                'deleted_by' => current_user(),
            ];

            if ($this->modelsubjectgroup->update($subject_group_id, $revert_data)) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }
}
