<?php

namespace App\Controllers;

use App\Models\ModelFeesManagement;

/**
 * Description of FeesManagement
 *
 * @author Shoeb
 */
class HeadGroup extends BaseController {

    protected $modelheadgroup;
    protected $modelfacultyregistration;
    protected $modelrole;

    public function __construct() {
        $this->modelheadgroup = model('ModelHeadGroup');
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
        $this->modelrole = model('ModelRole');
    }

//put your code here
    public function index() {
        $data['jspath'] = 'head-group/index-head-group';
        $data['title'] = lang('App.rise') . " - " . lang('App.manage') . " " . lang('App.head') . " " . lang('App.group');
        return render_page('head-group/index-head-group', $data);
    }

    public function fetch_head_group() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modelheadgroup->countAllHeadGroup();

        // FILTERED
        $recordsFiltered = $this->modelheadgroup->countFilteredHeadGroup($search);

        // DATA
        $rows = $this->modelheadgroup->getFilteredHeadGroup($length, $start, $search);

        $facultyNameMap = $nameMap = $this->modelfacultyregistration->getRiseNoNameMap();

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            // Edit Button
            if (hasPermission('updateRole')):
                $buttons .= '<button class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill edit" data-head_group_id="' . $row['head_group_id'] . '" data-head_group_name="' . $row['head_group_name'] . '"><i class="ri-pencil-fill"></i></button>';
            endif;

            // Delete Button
            if (hasPermission('deleteRole')):
                if ($row['is_deleted'] != 1):
                    $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill delete" data-head_group_id="' . $row['head_group_id'] . '" data-head_group_name="' . $row['head_group_name'] . '"><i class="ri-delete-bin-fill"></i></button>';
                elseif ($row['is_deleted'] == 1):
                    $buttons .= ' <button class="btn btn-icon btn-sm btn-warning btn-wave rounded-pill revert" data-head_group_id="' . $row['head_group_id'] . '" data-head_group_name="' . $row['head_group_name'] . '"><i class="ri-arrow-go-back-fill"></i></button>';
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
                $remark = activityBadge('danger', $facultyNameMap[$row['deleted_by']], $row['deleted_at'],"Deleted By");

            elseif ($row['is_deleted'] == 2 && !empty($row['deleted_by']) && !empty($row['deleted_at'])):
                $remark = activityBadge('warning', $facultyNameMap[$row['deleted_by']], $row['deleted_at'],"Reverted By");
            else:
                $remark = "";
            endif;

            $data[] = [
                $buttons,
                $sr_no++,
                $row['head_group_name'],
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

    public function save_head_group() {
        $insert_data = [
            'head_group_name' => clean_name($this->request->getVar('head_group_name')),
            'added_by' => current_user(),
        ];

        if ($this->modelheadgroup->insert($insert_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Head Group added successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelheadgroup->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function update_head_group() {
        $id = $this->request->getPost('head_group_id');

        $update_data = [
            'head_group_name' => clean_name($this->request->getVar('head_group_name')),
            'updated_by' => current_user(),
        ];

        if ($this->modelheadgroup->update($id, $update_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Head Group updated successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelheadgroup->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function delete_head_group() {
        if ($this->request->getMethod() == 'post') {
            $head_group_id = $this->request->getPost('head_group_id');

            $delete_data = [
                'is_deleted' => 1,
                'deleted_by' => current_user(),
            ];

            if ($this->modelheadgroup->update($head_group_id, $delete_data)) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }

    public function revert_head_group() {
        if ($this->request->getMethod() == 'post') {
            $head_group_id = $this->request->getPost('head_group_id');

            $revert_data = [
                'is_deleted' => 2,
                'deleted_by' => current_user(),
            ];

            if ($this->modelheadgroup->update($head_group_id, $revert_data)) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }
}
