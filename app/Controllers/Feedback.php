<?php
namespace App\Controllers;
use App\Models\ModelFeedback;

class Feedback extends BaseController {
    public $ModelFeedback;
    
    public function __construct()
    {
       $this->ModelFeedback = model('ModelFeedback');
    }
    
    public function index()
    {
        $data['jspath'] = 'feedback/feedback-master';
        render_page('feedback/feedback-master');
    }
    
    public function fetch_master_data() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        $model = $this->ModelFeedback;

        // TOTAL RECORDS
        $recordsTotal = $model->countAll();

        // SEARCH FILTERgit
        if ($search !== '') {
            $model->like('head_group_name', $search);
        }

        // FILTERED RECORDS
        $recordsFiltered = $model->countAllResults(false);

        // PAGINATED DATA
        $rows = $model->findAll($length, $start);
        
        $buttons = '';
        
        $buttons .= '<button class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill"><i class="ri-upload-2-line align-middle me-2 d-inline-block"></i></button>';
//        $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill"><i class="ri-delete-bin-fill"></i></button>';

        $sr_no = 1;
        
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                $sr_no++,
                $row['feedback_name'],
                $row['type_id'],
                $row['semester_id'],
                $row['part_id'],
                $row['academic_year_id'],
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
    public function save_feedback_master() 
     {
        if ($this->request->getMethod() == 'post') {

            $insert_data = [
                'feedback_name' => clean_name($this->request->getVar('feedback_name')),
                'type_id' => clean_name($this->request->getVar('type_id')),
                'semester_id'=> clean_name($this->request->getVar('semester_id')),
                'part_id' =>clean_name($this->request->getVar('part_id')),
                'academic_year_id' =>clean_name($this->request->getVar('academic_year_id')),
            ];

            if ($this->ModelFeedback->insert($insert_data)) {
                return $this->response->setJSON([
                            'status' => 'success',
                            'message' => 'feedback_name added successfully',
                            'csrfHash' => csrf_hash()
                ]);
            } else {
                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => $this->ModelFeedback->errors(),
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            render_page('error_page/error404');
        }
    }


    public function sample_excel_file()
    {
        $filePath = FCPATH . 'uploads\Sample_file.xlsx';      // example path

        if(file_exists($filePath))
        {
            return $this->response->download($filePath, null);
        } 
        else
        {
            return "File not found!";
        }
    }
    
    public function manage_question($id = null)
    {
    // $data['feedback'] = $this->modelFeedback->find($id);
        render_page('feedback/manage-question'); // view path
    }   

    
            
    
}
