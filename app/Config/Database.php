<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to
     * use if no other is specified.
     */
    public string $defaultGroup = 'default';
//    public string $defaultGroup = 'centralized';

    /**
     * The default database connection.
     */
    
    public array $default = [
        'DSN'      => '',

//        Local Database
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'rise',
     
//        Local Server Database
//        'hostname' => '192.168.1.247',
//        'username' => 'riseuser',
//        'password' => 'Rise@2025',
//        'database' => 'rise',
        
//        Cpanel Database
//        'hostname' => '103.133.214.177',
//        'username' => 'rayatedu_rise',
//        'password' => 'Rise@2025',
//        'database' => 'rayatedu_rise',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true,
        'charset'  => 'utf8mb4',
        'DBCollat' => 'utf8mb4_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
//        'DBEngine' => 'InnoDB',
    ];
    
    //----------centralized database in edu-cpanel------------//
     public array $centralized= [
//        Cpanel Database
        'hostname' => '103.133.214.177',
        'username' => 'rayatedu_rise',
        'password' => 'Rise@2025',
        'database' => 'rayatedu_rise_centralized',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => true,
        'charset'  => 'utf8mb4',
        'DBCollat' => 'utf8mb4_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 3306,
    ];
    //----------centralized database in erp-cpanel------------//
//     public array $rise_centralized= [
//        'hostname' => '103.133.214.196',
//        'username' => 'rayatedu_rise_centralized',
//        'password' => 'rise_centralized@2025',
//        'database' => 'rayaterp_rise_centralized',
//        'DBDriver' => 'MySQLi',
//        'DBPrefix' => '',
//        'pConnect' => false,
//        'DBDebug'  => true,
//        'charset'  => 'utf8mb4',
//        'DBCollat' => 'utf8mb4_general_ci',
//        'swapPre'  => '',
//        'encrypt'  => false,
//        'compress' => false,
//        'strictOn' => false,
//        'failover' => [],
//        'port'     => 3306,
//    ];


    /**
     * This database connection is used when
     * running PHPUnit database tests.
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => 'utf8_general_ci',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
        'DBEngine' => 'InnoDB',
    ];

    public function __construct()
    {
        parent::__construct();

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
