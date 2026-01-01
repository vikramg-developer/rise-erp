<?php

namespace App\Controllers;

/**
 * Description of ApproveRegistration
 *
 * @author Sonal
 */
class ApproveRegistration extends BaseController {

    protected $modelstudentregistration;

    public function __construct() {
        $this->modelstudentregistration = model('ModelStudentRegistration');
    }

    public function index() {
        $data['jspath'] = 'registration/approve-registration';
        $data['title'] = lang('App.rise') . "-" . lang('App.approve') . " " . lang('App.registration');
        return render_page('registration/approve-registration', $data);
    }

    public function fetch_registrationstudent() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modelstudentregistration->countAllStudent();

        // FILTERED
        $recordsFiltered = $this->modelstudentregistration->countFilteredData($search);

        // DATA
        $rows = $this->modelstudentregistration->getFilteredData($length, $start, $search);

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';
//$approval_status = '<span class="badge bg-outline-danger">' . $row['approval_status'] . '</span>';
            if ($row['approval_status'] == 'approved' && !empty($row['approval_status']) && !empty($row['approved_status_dt'])):
                $remark = activityBadge('success', $row['approval_status'], $row['approved_status_dt']);

            elseif ($row['approval_status'] == 'rejected' && !empty($row['approval_status']) && !empty($row['approved_status_dt'])):
                $remark = activityBadge('danger', $row['approval_status'], $row['approved_status_dt']);
            else:
                $remark = activityBadge('warning', $row['approval_status'], $row['approved_status_dt']);
            endif;
            $student_name = $row['student_first_name'] . " " . $row['student_middle_name'] . " " . $row['student_last_name'];
            // Approve Button
            $buttons .= actionButton('Approve', ['student_rise_no' => $row['student_rise_no'], 'student_name' => $student_name]);
            // Reject Button
            $buttons .= actionButton('Reject', ['student_rise_no' => $row['student_rise_no'], 'student_name' => $student_name]);
            $student_name_link = '<a data-bs-toggle="offcanvas"href="#offcanvasExample"data-student-rise="' . $row['student_rise_no'] . '""data-student-name="' . $student_name . '"class="text-primary fw-semibold studentDetails"role="button">' . $student_name . '</a>';
            $data[] = [
                $buttons,
                $remark,
                $sr_no++,
                $row['student_rise_no'],
                $student_name_link,
                'BA',
                'FirstYear',
                '2025-2026',
                '',
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

    // Approve Student
    public function approve_student() {
        $student_rise_no = $this->request->getPost('student_rise_no');

        if ($this->modelstudentregistration->where('student_rise_no', $student_rise_no)->set('approval_status', "approved",'approved_status_dt', date('Y-m-d H:i:s') )->update()) {
            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    // Reject Student
    public function reject_student() {
        $student_rise_no = $this->request->getPost('student_rise_no');

        if ($this->modelstudentregistration->where('student_rise_no', $student_rise_no)->set('approval_status', "rejected",'approved_status_dt', date('Y-m-d H:i:s'))->update()) {
            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }
}
