<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

use App\Models\ModelFeesManagement;
use App\Models\ModelHeadGroup;
use App\Models\ModelHead;

/**
 * Description of FeesManagement
 *
 * @author Shoeb
 */
class FeesManagement extends BaseController {

    public $modelheadgroup;
    public $modelhead;

    public function __construct() {
        $this->modelheadgroup = model('ModelHeadGroup');
        $this->modelhead = model('ModelHead');
    }

//put your code here
    public function head_group() {
        $data['jspath'] = 'fees_management/head-group';
        render_page('fees_management/head-group', $data);
    }

    public function fetch_head_group() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        $model = $this->modelheadgroup;

        // TOTAL RECORDS
        $recordsTotal = $model->countAll();

        // SEARCH FILTER
        if ($search !== '') {
            $model->like('head_group_name', $search);
        }

        // FILTERED RECORDS
        $recordsFiltered = $model->countAllResults(false);

        // PAGINATED DATA
        $rows = $model->orderBy('head_group_id', 'DESC')->findAll($length, $start);

        $buttons = '';

        $buttons .= '<button class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill"><i class="ri-pencil-fill"></i></button>';
        $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill"><i class="ri-delete-bin-fill"></i></button>';

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                $sr_no++,
                $row['head_group_name'],
                $buttons,
                ''
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

    public function add_head_group() {
        if ($this->request->getMethod() == 'post') {
            $insert_data = [
                'head_group_name' => clean_name($this->request->getVar('head_group')),
            ];

            $insert = $this->modelheadgroup->insert($insert_data);

            if ($insert) {
                return $this->response->setJSON([
                            'status' => 'success',
                            'message' => 'Head group added successfully',
                            'csrfHash' => csrf_hash()
                ]);
            }
        }
    }

    public function delete_head_group() {
        $this->modelheadgroup->update(2, ['is_deleted' => 1]);

        echo $this->modelheadgroup->db->getLastQuery();
    }

    public function head() {
        $data['jspath'] = 'fees_management/head';
        render_page('fees_management/head', $data);
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
        $rows = $model->findAll($length, $start);

        $buttons = '';

        $buttons .= '<button class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill"><i class="ri-pencil-fill"></i></button>';
        $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill"><i class="ri-delete-bin-fill"></i></button>';

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                $sr_no++,
                $row['head_name'],
                $buttons,
                ''
            ];
        }

        return $this->response->setJSON([
                    'draw' => $draw,
                    'recordsTotal' => $recordsTotal,
                    'recordsFiltered' => $recordsFiltered,
                    'data' => $data
        ]);
    }

    public function head_fees() {
        $data['jspath'] = 'fees_management/head-fees';
        render_page('fees_management/head-fees', $data);
    }

    public function collect_fees() {
        $data['jspath'] = 'fees_management/collect-fees';
        render_page('fees_management/collect-fees', $data);
    }

    public function student_list() {
        render_page('fees_management/student-list');
    }
}
