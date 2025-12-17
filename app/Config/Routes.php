<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(true);
$routes->set404Override(function () {
    return view('error-page/error404');
});
$routes->setAutoRoute(false);

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::login');
$routes->get('login', 'Login::login');
$routes->post('/add-group', 'Group::add-group');

$routes->post('/collect-fees', 'FeesManagement::collect_fees');
$routes->post('/create_ticket', 'Ticket::create_ticket');
$routes->post('/faculty-profile', 'FacultyProfile::index');
$routes->post('/faculty-personal-info', 'FacultyProfile::update_personal_info');
$routes->post('/feedback', 'Feedback::index');
$routes->post('/save-feedback-master', 'Feedback::save_feedback_master');
$routes->post('/fetch-head', 'FeesManagement::fetch-head');
$routes->post('/head', 'FeesManagement::head');
$routes->post('/head-fees', 'FeesManagement::head_fees');

$routes->post('/home', 'Home::index');

$routes->post('/check-user', 'Login::check_user');
$routes->get('logout', 'Login::logout');
$routes->get('student-registration', 'StudentRegistration::index');
$routes->post('save-registration', 'StudentRegistration::add_registration');
//$routes->post('/studentProfile', 'Registration::studentProfile');

$routes->post('/manage-question', 'Feedback::manage_question');
$routes->post('/student-profile', 'Registration::studentProfile');
$routes->post('/savesignup', 'Registration::saveSignup');
$routes->get('/student-dashboard', 'Login::studentDashboard');
$routes->get('/studentDashboard', 'Login::studentDashboard');
$routes->post('/studentProfile', 'Registration::studentProfile');
$routes->post('/student-list', 'FeesManagement::student_list');
$routes->post('/sample-excel-file', 'Feedback::sample_excel_file');
$routes->post('/ticket', 'Ticket::index');
$routes->group('leavingcertificate', function ($routes) {
    $routes->get('/', 'LeavingCertificate::index', ['filter' => 'permauth:createFeesManagement']);
    $routes->post('add-lc-info', 'LeavingCertificate::add_lc_info', ['filter' => 'permauth:createFeesManagement']);
    $routes->get('/leaving-certificate-report', 'LeavingCertificateReport::index', ['filter' => 'permauth:createFeesManagement']);
});
$routes->group('bonafidecertificate', function ($routes) {
    $routes->get('/', 'BonafideCertificate::index', ['filter' => 'permauth:createFeesManagement']);
    $routes->get('bonafide-print', 'BonafideCertificate::bonafide_print', ['filter' => 'permauth:createFeesManagement']);
});
$routes->group('icard', function ($routes) {
    $routes->get('/', 'ICard::index', ['filter' => 'permauth:createFeesManagement']);
    $routes->get('i-card-print', 'ICard::i_card_print', ['filter' => 'permauth:createFeesManagement']);
});
$routes->group('faculty', function ($routes) {
    $routes->get('/', 'Faculty::index', ['filter' => 'permission:createFeesManagement']);
    $routes->post('demo', 'Faculty::demo', ['filter' => 'permission:createFeesManagement']);
    $routes->post('add-faculty', 'Faculty::add_faculty', ['filter' => 'permission:createFeesManagement']);
    $routes->post('manage-faculty', 'Faculty::update-faculty', ['filter' => 'permission:createFeesManagement']);
});

$routes->group('headgroup', function ($routes) {
    $routes->get('/', 'FeesManagement::head_group', ['filter' => 'permission:createFeesManagement']);
    $routes->post('fetch-head-group', 'FeesManagement::fetch_head_group', ['filter' => 'permission:createFeesManagement']);
    $routes->post('add-head-group', 'FeesManagement::add_head_group', ['filter' => 'permission:createFeesManagement']);
    $routes->post('update-head-group', 'FeesManagement::update-head-group', ['filter' => 'permission:createFeesManagement']);
    $routes->post('delete-head-group', 'FeesManagement::delete_head_group', ['filter' => 'permission:createFeesManagement']);
    $routes->post('revert-head-group', 'FeesManagement::revert_head_group', ['filter' => 'permission:createFeesManagement']);
});

$routes->get('forbidden', 'Error::forbidden');
$routes->group('roles', function ($routes) {
    $routes->get('/', 'Role::index', ['filter' => 'permission:createFeesManagement']);
    $routes->post('fetch-role', 'Role::fetch_role', ['filter' => 'permission:createFeesManagement']);
    $routes->get('add-role', 'Role::add_role', ['filter' => 'permission:createFeesManagement']);
    $routes->post('save-role', 'Role::save_role');
    $routes->get('edit-role/(:num)', 'Role::edit_role/$1', ['filter' => 'permission:createFeesManagement']);
    $routes->post('update-role/(:num)', 'Role::update_role/$1');
    $routes->post('delete-role', 'Role::delete_role');
    $routes->post('revert-role', 'Role::revert_role');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

