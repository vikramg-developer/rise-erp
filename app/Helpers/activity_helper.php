<?php

function log_activity(array $data)
{
    $request = service('request');

    $logModel = model('ModelActivityLog');
    $logModel->insert([
        'added_by'        => current_user(),
        'action'         => $data['action'],
        'table_name'     => $data['table'],
        'record_id'      => $data['record_id'],
        'column_names'=> json_encode($data['columns'] ?? []),
        'old_values'     => json_encode($data['old'] ?? []),
        'new_values'     => json_encode($data['new'] ?? []),
        'ip_address'     => $request->getIPAddress(),
        'user_agent'     => $request->getUserAgent()->getAgentString(),
    ]);
}

