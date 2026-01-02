<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelActivityLog extends Model {

    protected $table = 'activity_log';
    protected $allowedFields = [
        'action',
        'table_name',
        'record_id',
        'column_names',
        'old_values',
        'new_values',
        'ip_address',
        'user_agent',
        'added_by'
    ];
    public $timestamps = false;
    protected $allowCallbacks = false;
    
    public function countAllActivityLog() {
        return $this->builder()
                        ->countAllResults();
    }

    public function countFilteredActivityLog($search) {
        $builder = $this->builder();

        if (!empty($search)) {
            $builder->like('table_name', $search);
        }

        return $builder->countAllResults();
    }

    public function getFilteredActivityLog($length, $start, $search) {
        $builder = $this->builder()
                ->orderBy('activity_log_id', 'DESC');

        if (!empty($search)) {
            $builder->like('table_name', $search);
        }

        return $builder->get($length, $start)->getResultArray();
    }
}
