<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

use App\Models\ModelFeesManagement;
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
        $this->modelhead = model('ModelHead');
    }


    public function head() {
        $data['jspath'] = 'fees_management/head';
        return render_page('fees_management/head', $data);
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
        return render_page('fees_management/head-fees', $data);
    }

    public function collect_fees() {
        $data['jspath'] = 'fees_management/collect-fees';
        return render_page('fees_management/collect-fees', $data);
    }

    public function student_list() {
        return render_page('fees_management/student-list');
    }
}
