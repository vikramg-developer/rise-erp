<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

use App\Models\ModelFeesManagement;
use App\Models\ModelHeadGroup;

/**
 * Description of FeesManagement
 *
 * @author Shoeb
 */
class FeesManagement extends BaseController {

    public $modelfeesmanagement;

    public function __construct() {
        $this->modelfeesmanagement = model('ModelHeadGroup');
    }

//put your code here
    public function head_group() {
        $data['jspath'] = 'fees_management/head_group';
        render_page('fees_management/head_group', $data);
    }

    public function show_head_group() {
        
$request = service('request');

    $draw   = (int) $request->getPost('draw');
    $start  = (int) $request->getPost('start');
    $length = (int) $request->getPost('length');
    $search = $request->getPost('search')['value'] ?? '';

    $model = $this->modelfeesmanagement;

    // TOTAL RECORDS
    $recordsTotal = $model->countAll();

    // SEARCH FILTER
    if ($search !== '') {
        $model->like('head_group_name', $search);
    }

    // FILTERED RECORDS
    $recordsFiltered = $model->countAllResults(false);

    // PAGINATED DATA
    $rows = $model->findAll($length, $start);

    $data = [];
    foreach ($rows as $row) {
        $data[] = [
            $row['head_group_id'],
            $row['head_group_name'],
        ];
    }

    return $this->response->setJSON([
        'draw'            => $draw,
        'recordsTotal'    => $recordsTotal,
        'recordsFiltered' => $recordsFiltered,
        'data'            => $data
    ]);
    }

    public function add_head_group() {
        if ($this->request->getMethod() == 'post') {
            $insert_data = [
                'head_group_name' => $this->request->getVar('head-group', FILTER_SANITIZE_STRING),
            ];

            $insert = $this->modelfeesmanagement->add_head_group($insert_data);
        }
    }

    public function head() {
//        echo "Head Group";

        if ($this->request->getMethod() == 'post') {
            $insert_data = [
                'head_name' => $this->request->getVar('head', FILTER_SANITIZE_STRING),
            ];

            $insert = $this->modelfeesmanagement->add_head($insert_data);
        }

        $data['head_datas'] = $this->modelfeesmanagement->get_head_data();
        render_page('fees_management/head', $data);
    }
}
