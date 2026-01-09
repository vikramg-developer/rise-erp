<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

use App\Models\ModelFeesManagement;
use App\Models\ModelHead;
//use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Description of FeesManagement
 *
 * @author Shoeb
 */
class FeesManagement extends BaseController {

    public $modelfees;

    public function __construct() {
        $this->modelfees = model('ModelFees');
    }

    public function index() {
        $data['jspath'] = 'fees-management/index-fees-management';
        return render_page('fees-management/index-fees-management', $data);
    }
    
    public function import()
    {
        $file = $this->request->getFile('excel_file');

        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'Invalid file');
        }

        $spreadsheet = IOFactory::load($file->getTempName());
        $sheetData   = $spreadsheet->getActiveSheet()->toArray();

//        $model = new UserModel();

        // Skip header row
        foreach ($sheetData as $key => $row) {
            if ($key === 0) continue;

            $data = [
                'fees_id'  => trim($row[0]),
                'fees_name' => trim($row[1]),
            ];

            // Avoid empty rows
//            if (!empty($data['email'])) {
                $this->modelfees->insert($data);
//            }
        }

        return redirect()->back()->with('success', 'Excel data imported successfully');
    }

//    public function head_fees() {
//        $data['jspath'] = 'fees_management/head-fees';
//        return render_page('fees_management/head-fees', $data);
//    }
//
//    public function collect_fees() {
//        $data['jspath'] = 'fees_management/collect-fees';
//        return render_page('fees_management/collect-fees', $data);
//    }
//
//    public function student_list() {
//        return render_page('fees_management/student-list');
//    }
}
