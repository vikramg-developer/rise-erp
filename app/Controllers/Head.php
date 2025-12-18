<?php

namespace App\Controllers;

use App\Models\ModelFeesManagement;
/**
 * Description of FeesManagement
 *
 * @author Shoeb
 */
class Head extends BaseController {

    public $modelhead;

    public function __construct() {
        $this->modelhead = model('Modelhead');
    }

//put your code here
    public function index() {
        $data['jspath'] = 'head/index-head';
        return render_page('head/index-head', $data);
    }

    public function fetch_head() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        $model = $this->modelhead;

// TOTAL RECORDS
        $recordsTotal = $model->countAll();

// SEARCH FILTER
        if ($search !== '') {
            $model->like('head_name', $search);
        }

// FILTERED RECORDS
        $recordsFiltered = $model->countAllResults(false);

// PAGINATED DATA
        $rows = $model->orderBy('head_id', 'DESC')->findAll($length, $start);

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            $buttons .= '<button class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill edit" data-head_id="' . $row['head_id'] . '" data-head_name="' . $row['head_name'] . '"><i class="ri-pencil-fill"></i></button>';

            if ($row['is_deleted'] != 1):
                $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill delete" data-head_id="' . $row['head_id'] . '" data-head_name="' . $row['head_name'] . '"><i class="ri-delete-bin-fill"></i></button>';
            elseif ($row['is_deleted'] == 1):
                $buttons .= ' <button class="btn btn-icon btn-sm btn-warning btn-wave rounded-pill revert" data-head_id="' . $row['head_id'] . '" data-head_name="' . $row['head_name'] . '"><i class="ri-arrow-go-back-fill"></i></button>';
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
                $row['head_name'],
                $row['added_by'],
                $row['updated_by'],
                $remark,
                $buttons                
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
                'added_by' => session('rise_no'),
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
        if ($this->request->getMethod() == 'post') {
            $id = $this->request->getPost('head_id');

            $update_data = [
                'head_name' => clean_name($this->request->getVar('head_name')),
                'updated_by' => session('rise_no'),
            ];

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
        } else {
            return render_page('error_page/error404');
        }
    }

    public function delete_head() {
        if ($this->request->getMethod() == 'post') {
            $head_id = $this->request->getPost('head_id');

            if ($this->modelhead->update($head_id, ['is_deleted' => 1])) {

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

            if ($this->modelhead->update($head_id, ['is_deleted' => 2])) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }
}
