<?php

namespace App\Controllers;

use App\Models\ModelFeesManagement;

/**
 * Description of FeesManagement
 *
 * @author Shoeb
 */
class Head extends BaseController {

    protected $modelhead;
    protected $modelfacultyregistration;
    protected $modelrole;

    public function __construct() {
        $this->modelhead = model('ModelHead');
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
        $this->modelrole = model('ModelRole');
    }

    public function searchHead() {
        $term = $this->request->getGet('q');
        $this->db = db_connect();
        $results = $this->db->table('head')
                ->select('head_id, head_name')
                ->like('head_name', $term)
                ->limit(10)
                ->get()
                ->getResultArray();

        return $this->response->setJSON($results);
    }

//put your code here
    public function index() {
        $data['jspath'] = 'head/index-head';
        $data['title'] = lang('App.rise') . " - " . lang('App.manage') . " " . lang('App.head');
        return render_page('head/index-head', $data);
    }

    public function fetch_head() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modelhead->countAllHead();

        // FILTERED
        $recordsFiltered = $this->modelhead->countFilteredHead($search);

        // DATA
        $rows = $this->modelhead->getFilteredHead($length, $start, $search);

        $facultyNameMap = $nameMap = $this->modelfacultyregistration->getRiseNoNameMap();

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            // Edit Button
            if (hasPermission('updateRole')):
                $buttons .= '<button class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill edit" data-head_id="' . $row['head_id'] . '" data-head_name="' . $row['head_name'] . '"><i class="ri-pencil-fill"></i></button>';
            endif;

            // Delete Button
            if (hasPermission('deleteRole')):
                if ($row['is_deleted'] != 1):
                    $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill delete" data-head_id="' . $row['head_id'] . '" data-head_name="' . $row['head_name'] . '"><i class="ri-delete-bin-fill"></i></button>';
                elseif ($row['is_deleted'] == 1):
                    $buttons .= ' <button class="btn btn-icon btn-sm btn-warning btn-wave rounded-pill revert" data-head_id="' . $row['head_id'] . '" data-head_name="' . $row['head_name'] . '"><i class="ri-arrow-go-back-fill"></i></button>';
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
                $row['head_name'],
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

    public function save_head() {
        $insert_data = [
            'head_name' => clean_name($this->request->getVar('head_name')),
            'added_by' => current_user(),
        ];

        if ($this->modelhead->insert($insert_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Head added successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelhead->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function update_head() {
        $id = $this->request->getPost('head_id');

        $update_data = [
            'head_name' => clean_name($this->request->getVar('head_name')),
            'updated_by' => current_user(),
        ];
        
        $this->modelhead->setValidationRules(
                $this->modelhead->rulesForUpdate($id)
        );

        if ($this->modelhead->update($id, $update_data)) {
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Head updated successfully',
                        'csrfHash' => csrf_hash()
            ]);
        } else {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelhead->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function delete_head() {
        if ($this->request->getMethod() == 'post') {
            $head_id = $this->request->getPost('head_id');

            $delete_data = [
                'is_deleted' => 1,
                'deleted_by' => current_user(),
            ];

            if ($this->modelhead->update($head_id, $delete_data)) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }

    public function revert_head() {
        if ($this->request->getMethod() == 'post') {
            $head_id = $this->request->getPost('head_id');

            $revert_data = [
                'is_deleted' => 2,
                'deleted_by' => current_user(),
            ];

            if ($this->modelhead->update($head_id, $revert_data)) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }
}
