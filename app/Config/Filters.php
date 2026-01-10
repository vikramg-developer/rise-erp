<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\PermissionFilter;
use App\Filters\AuthFilter;
use App\Filters\SessionLogoutFilter;

class Filters extends BaseConfig {

    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public array $aliases = [
        'csrf' => CSRF::class,
        'toolbar' => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'invalidchars' => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'auth' => AuthFilter::class,
        'permission' => PermissionFilter::class,
        'sessionlogout' => SessionLogoutFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            'csrf',
            'auth' => [
                'before' => [
                    '*', //apply to all filters
                ],
                'except' => [
                   
                    'login', //skip login page
                    'check-user', //skip login page
                    'student-registration', //skip student registration page
                    'save-registration', //skip student registration save page
                ]
            ],
//            'permission' => [
//                'before' => [
//                    '*', //apply to all filters
//                ],
//                'except' => [
//                   
//                    'login', //skip login page
//                    'check-user', //skip login page
//                    'logout', //skip logout
//                    'dashboard', //skip dashboard page
//                    'student-registration', //skip student registration page
//                    'save-registration', //skip student registration save page
//                    'change-password-first-login',//skip change password page
//                    'check-old-password',//skip for old password check first time login
//                ]
//            ],
            'sessionlogout' => [
                'before' => [
                    '*',
                ],
                'except' => [
                    'login',
                    'check-user',
                    'logout',
                    'student-registration',
                    'save-registration',
                ],
            ],
        // 'invalidchars',
        ],
        'after' => [
            'toolbar',
        // 'honeypot',
        // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [
    ];
}
