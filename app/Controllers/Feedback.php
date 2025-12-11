<?php
namespace App\Controllers;
use App\Models\ModelFeedback;

class Feedback extends BaseController {
    public $ModelFeedback;
    
    public function __construct()
    {
       $this->ModelFeedback = model('ModelFeedback');
//       $this->ModelFeedback = new ModelFeedback();
    }
    
    public function index()
    {
         $data['mater_data'] = 'fees_management/head-group';
//          $data['feedbacks'] = $this->modelFeedback->findAll();
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

        // SEARCH FILTER
        if ($search !== '') {
            $model->like('head_group_name', $search);
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
                $row['head_group_name'],
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

       $data = [
            'feedback_name' => $this->request->getPost('feedback_name'),
            'type_id'  => $this->request->getPost('type_id'),
            'semester_id'       => $this->request->getPost('semester_id'),
            'part_id'           => $this->request->getPost('part_id'),
            'academic_year_id'     => $this->request->getPost('academic_year_id'),

        ];
        $feedback_master = $this->ModelFeedback->add_master_data($data);
//        var_dump($this->db->last_query());die();
        if ($feedback_master) {
            session()->setFlashdata('success', 'Added successfully!');

            return redirect()->to(base_url('feedback/index'));
        } else {
            session()->setFlashdata('error', 'Something went wrong. Please try again.');
        }
        
    }
    
    public function sample_excel_file()
    {
        // File path inside public folder or writable folder
        $filePath = FCPATH . 'uploads\Sample_file.xlsx'; // example path

//        var_dump($filePath);die();
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
    // $id will help you load questions related to that feedback_master
    // Example fetch if needed:
    // $data['feedback'] = $this->modelFeedback->find($id);

        render_page('feedback/manage-question'); // view path
    }   

    
            
    
}
