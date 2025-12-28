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
}
