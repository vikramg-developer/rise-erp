<?php

// Path to the front controller
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
chdir(__DIR__);

// Load paths config file
require FCPATH . '../app/Config/Paths.php';

// Create Paths instance (THIS WAS MISSING)
$paths = new Config\Paths();

// Load the framework bootstrap file
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'Boot.php';

// Define environment
define('ENVIRONMENT', getenv('CI_ENVIRONMENT') ?: 'production');

// Boot the application
exit(CodeIgniter\Boot::bootWeb($paths));
