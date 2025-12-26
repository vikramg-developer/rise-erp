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

    public function __construct() {
        $this->modelheadgroup = model('ModelHeadGroup');
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
    }

//put your code here
    public function index() {
        $data['jspath'] = 'head-group/index-head-group';
        $data['title'] = lang('App.rise') . " - " . lang('App.manage') . " " . lang('App.head');
        return render_page('head-group/index-head-group', $data);
    }

    public function fetch_head_group() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        $model = $this->modelheadgroup;

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modelrole->countAllRoles();

        // FILTERED
        $recordsFiltered = $this->modelrole->countFilteredRoles($search);

        // DATA
        $rows = $this->modelrole->getFilteredRoles($length, $start, $search);

        $facultyNameMap = $nameMap = $this->modelfacultyregistration->getRiseNoNameMap();

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            $buttons .= '<button class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill edit" data-head_group_id="' . $row['head_group_id'] . '" data-head_group_name="' . $row['head_group_name'] . '"><i class="ri-pencil-fill"></i></button>';

            if ($row['is_deleted'] != 1):
                $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill delete" data-head_group_id="' . $row['head_group_id'] . '" data-head_group_name="' . $row['head_group_name'] . '"><i class="ri-delete-bin-fill"></i></button>';
            elseif ($row['is_deleted'] == 1):
                $buttons .= ' <button class="btn btn-icon btn-sm btn-warning btn-wave rounded-pill revert" data-head_group_id="' . $row['head_group_id'] . '" data-head_group_name="' . $row['head_group_name'] . '"><i class="ri-arrow-go-back-fill"></i></button>';
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
                $row['head_group_name'],
                $buttons,
                $remark
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
        if ($this->request->getMethod() == 'post') {
            $id = $this->request->getPost('head_group_id');

            $update_data = [
                'head_group_name' => clean_name($this->request->getVar('head_group_name')),
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
        } else {
            return render_page('error_page/error404');
        }
    }

    public function delete_head_group() {
        if ($this->request->getMethod() == 'post') {
            $head_group_id = $this->request->getPost('head_group_id');

            if ($this->modelheadgroup->update($head_group_id, ['is_deleted' => 1])) {

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

            if ($this->modelheadgroup->update($head_group_id, ['is_deleted' => 2])) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }
}
