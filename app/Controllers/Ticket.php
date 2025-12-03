<?php

namespace App\Controllers;

use App\Models\ModelTicket;

class Ticket extends BaseController {

    public $ModelTicket;

    public function __construct() {
        $this->ModelTicket = new ModelTicket();
    }

    public function index() {
        $data = [];
        $data['ticket_data'] = $this->ModelTicket->getTicketData();

        render_page('ticket/ticket-index', $data);
    }

    public function create_ticket() {
        $page_session = \Config\Services::session();
        $validation = \Config\Services::validation();

        // Validation rules video no 28
        $rules = [
            'college_name' => 'required',
            'ticket_category' => 'required',
            'issue' => 'required|min_length[5]',
            'description' => 'required|min_length[10]',
            'priority' => 'required',
            'mobile' => 'required|numeric|exact_length[10]',
            'email' => 'required|valid_email',
        ];

        // Validate form
        if (!$this->validate($rules)) {

            // Return errors & old input
            $data['validation'] = $validation;
            return render_page('ticket/ticket-index', $data);
        }

        $data = [
            'college_name' => $this->request->getVar('college_name'),
            'category_id' => $this->request->getVar('ticket_category'),
            'issue_title' => $this->request->getVar('issue'),
            'description' => $this->request->getVar('description'),
            'priority' => $this->request->getVar('priority'),
            'email' => $this->request->getVar('email'),
            'mobile' => $this->request->getVar('mobile'),
        ];

        $status = $this->ModelTicket->create_ticket($data);

        if ($status) {

            $page_session->setTempdata('success', 'Ticket submitted successfully! We will get back soon.', 4);
//        return redirect()->to(current_url());
        } else {

            $page_session->setTempdata('error', 'Sorry! Something went wrong. Try again.', 4);
//        return redirect()->to(current_url());
        }

        return redirect()->to(current_url());
    }
}
