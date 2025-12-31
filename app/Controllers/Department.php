<?php

namespace App\Controllers;

/**
 * Description of FeesManagement
 *
 * @author Shoeb
 */
class Department extends BaseController {

    protected $modeldepartment;
    protected $modelfacultyregistration;

    public function __construct() {
        $this->modeldepartment = model('modeldepartment');
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
    }

    public function search_department() {
        $term = $this->request->getGet('q');

        return $this->response->setJSON($this->modeldepartment->search_department($term));
    }

//put your code here
    public function index() {
        $data['jspath'] = 'department/index-department';
        $data['title'] = lang('App.rise') . " - " . lang('App.manage') . " " . lang('App.department');
        return render_page('department/index-department', $data);
    }

    public function fetch_department() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modeldepartment->countAllDepartment();

        // FILTERED
        $recordsFiltered = $this->modeldepartment->countFilteredDepartment($search);

        // DATA
        $rows = $this->modeldepartment->getFilteredDepartment($length, $start, $search);

        $facultyNameMap = $nameMap = $this->modelfacultyregistration->getRiseNoNameMap();

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            // Edit Button
            if (hasPermission('updateDepartment')):
                $buttons .= actionButton('Edit', ['department_id' => $row['department_id'], 'department_name' => $row['department_name']]);
            endif;

            // Delete Button
            if (hasPermission('deleteDepartment')):
                if ($row['is_deleted'] != 1):
                    $buttons .= actionButton('Delete', ['department_id' => $row['department_id'], 'department_name' => $row['department_name']]);
                elseif ($row['is_deleted'] == 1):
                    $buttons .= actionButton('Revert', ['department_id' => $row['department_id'], 'department_name' => $row['department_name']]);
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
                esc($row['department_name']),
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

    public function save_department() {
        $insert_data = [
            'department_name' => clean_special_name($this->request->getVar('department_name')),
            'added_by' => current_user(),
        ];

        if ($this->modeldepartment->insert($insert_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Department added successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modeldepartment->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function update_department() {
        $id = $this->request->getPost('department_id');

        $update_data = [
            'department_name' => clean_special_name($this->request->getVar('department_name')),
            'updated_by' => current_user(),
        ];

        $this->modeldepartment->setValidationRules(
                $this->modeldepartment->rulesForUpdate($id)
        );

        if ($this->modeldepartment->update($id, $update_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Department updated successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modeldepartment->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function delete_department() {
        $department_id = $this->request->getPost('department_id');

        $delete_data = [
            'is_deleted' => 1,
            'deleted_by' => current_user(),
        ];

        if ($this->modeldepartment->update($department_id, $delete_data)) {

            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function revert_department() {
        $department_id = $this->request->getPost('department_id');

        $revert_data = [
            'is_deleted' => 2,
            'deleted_by' => current_user(),
        ];

        if ($this->modeldepartment->update($department_id, $revert_data)) {

            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }
}
