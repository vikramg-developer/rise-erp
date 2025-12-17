<?php

function hasPermission(string $permission): bool {
    if (in_array(session('role_id'), array(1, 2)))
        return true;

    $permissions = session('permissions');
    return in_array($permission, $permissions);
}
