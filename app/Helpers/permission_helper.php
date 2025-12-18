<?php

if (!function_exists('hasAnyPermission')) {

    function hasAnyPermission(array $permissions): bool {
        $userPermissions = session('permissions');

        if (in_array(session('role_id'), array(1))) {
            return true;
        }
        
        foreach ($permissions as $permission) {
            if (in_array($permission, $userPermissions, true)) {
                return true;
            }
        }

        return false;
    }

}

if (!function_exists('hasPermission')) {

    function hasPermission(string $permission): bool {
        $userPermissions = session('permissions') ?? [];

        // Admin bypass
        if (in_array(session('role_id'), array(1))) {
            return true;
        }

        return in_array($permission, $userPermissions, true);
    }

}

