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
$routes->set404Override();
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
$routes->match(['get','post'],'/', 'Login::login');
$routes->match(['get','post'],'/add-group', 'Group::add-group');
$routes->match(['get','post'],'/add-head-group', 'FeesManagement::add_head_group');
$routes->match(['get','post'],'/add-lc-info', 'LeavingCertificate::add_lc_info');
$routes->match(['get','post'],'/bonafide-certificate', 'BonafideCertificate::index');
$routes->match(['get','post'],'/bonafide-print', 'BonafideCertificate::bonafide_print');
$routes->match(['get','post'],'/collect-fees', 'FeesManagement::collect_fees');
$routes->match(['get','post'],'/create_ticket', 'Ticket::create_ticket');
$routes->match(['get','post'],'/faculty-profile', 'FacultyProfile::index');
$routes->match(['get','post'],'/faculty-personal-info', 'FacultyProfile::update_personal_info');
$routes->match(['get','post'],'/feedback', 'Feedback::index');
$routes->match(['get','post'],'/save-feedback-master', 'Feedback::save_feedback_master');
$routes->match(['get','post'],'/fetch-head', 'FeesManagement::fetch-head');
$routes->match(['get','post'],'/fetch-head-group', 'FeesManagement::fetch_head_group');
$routes->match(['get','post'],'/head', 'FeesManagement::head');
$routes->match(['get','post'],'/head-fees', 'FeesManagement::head_fees');
$routes->match(['get','post'],'/head-group', 'FeesManagement::head_group');
$routes->match(['get','post'],'/home', 'Home::index');
$routes->match(['get','post'],'/i-card', 'ICard::index');
$routes->match(['get','post'],'/i-card-print', 'ICard::i_card_print');
$routes->match(['get','post'],'/leaving-certificate', 'LeavingCertificate::index');
$routes->match(['get','post'],'/login', 'Login::login');
$routes->match(['get','post'],'/check-user', 'Login::check_user');
$routes->match(['get','post'],'/student-registration', 'StudentRegistration::index');
$routes->match(['get','post'],'/save-registration', 'StudentRegistration::add_registration');
$routes->match(['get','post'],'/studentDashboard', 'Login::studentDashboard');
//$routes->match(['get','post'],'/studentProfile', 'Registration::studentProfile');
$routes->match(['get','post'],'/leaving-certificate-report', 'LeavingCertificateReport::index');
$routes->match(['get','post'],'/manage-question', 'Feedback::manage_question');
$routes->match(['get','post'],'/registration', 'Registration::index');
$routes->match(['get','post'],'/student-profile', 'Registration::studentProfile');
$routes->match(['get','post'],'/check-user', 'login::check_user');
$routes->match(['get','post'],'/savesignup', 'Registration::saveSignup');
$routes->match(['get','post'],'/student-dashboard', 'Login::student_dashboard');
$routes->match(['get','post'],'/studentProfile', 'Registration::studentProfile');
$routes->match(['get','post'],'/student-list', 'FeesManagement::student_list');
$routes->match(['get','post'],'/sample-excel-file', 'Feedback::sample_excel_file');
$routes->match(['get','post'],'/ticket', 'Ticket::index');
$routes->match(['get','post'],'/faculty', 'Faculty::index');
$routes->match(['get','post'],'/add-faculty', 'Faculty::add_faculty');
$routes->match(['get','post'],'/manage-faculty', 'Faculty::update-faculty');
$routes->match(['get','post'],'/update-head-group', 'FeesManagement::update-head-group');
$routes->match(['get','post'],'/delete-head-group', 'FeesManagement::delete_head_group');
$routes->match(['get','post'],'/revert-head-group', 'FeesManagement::revert_head_group');

$routes->group('roles', function ($routes) {
    $routes->match(['get','post'],'/', 'Role::index');
    $routes->match(['get','post'],'fetch-role', 'Role::fetch_role');
    $routes->match(['get','post'],'add-role', 'Role::add_role');
    $routes->match(['get','post'],'save-role', 'Role::save_role');
    $routes->match(['get','post'],'update-role/(:num)', 'Role::update_role/$1');
    $routes->match(['get','post'],'delete-role', 'Role::delete_role');
    $routes->match(['get','post'],'revert-role', 'Role::revert_role');
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
