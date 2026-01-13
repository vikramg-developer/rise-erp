<?php

namespace App\Controllers;

/**
 * Description of FeesManagement
 *
 * @author Shoeb
 */
class ActivityLog extends BaseController {

    protected $modelactivitylog;
    protected $modelfacultyregistration;

    public function __construct() {
        $this->modelactivitylog = model('ModelActivityLog');
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
    }

    public function search_activity_log() {
        $term = $this->request->getGet('q');

        return $this->response->setJSON($this->modelactivitylog->search_activity_log($term));
    }

//put your code here
    public function index() {
        $data['jspath'] = 'activity-log/index-activity-log';
        $data['title'] = lang('App.rise') . " - " . lang('App.manage') . " " . lang('App.activity') . " " . lang('App.log');
        return render_page('activity-log/index-activity-log', $data);
    }

    public function fetch_activity_log() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modelactivitylog->countAllActivityLog();

        // FILTERED
        $recordsFiltered = $this->modelactivitylog->countFilteredActivityLog($search);

        // DATA
        $rows = $this->modelactivitylog->getFilteredActivityLog($length, $start, $search);

        $facultyNameMap = $nameMap = $this->modelfacultyregistration->getFacultyRiseNumberNameMap();

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {


            // Added By
            if (!empty($row['added_by']) && !empty($row['added_at'])):
                $addedBy = activityBadge('success', $facultyNameMap[$row['added_by']], $row['added_at']);
            else:
                $addedBy = "";
            endif;

            // Action
            if ($row['action'] === 'insert'):
                $action = labelBadge('success', $row['action']);
            elseif ($row['action'] === 'update') :
                $action = labelBadge('warning', $row['action']);
            endif;

            $data[] = [
                $sr_no++,
                esc($row['table_name']),
                formatReadableJsonGeneric($row['column_names']),
                esc($row['record_id']),
                formatReadableJsonGeneric($row['old_values']),
                formatReadableJsonGeneric($row['new_values']),
                $action,
                esc($row['ip_address']),
                '<span class="text-wrap badge bg-info-transparent px-3 py-2 fw-semibold" style="font-size:0.7rem">' . esc($row['user_agent']) . '</span>',
                $addedBy,
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
}
