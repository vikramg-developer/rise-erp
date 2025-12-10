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
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true);

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
$routes->add('/', 'Home::index');
$routes->add('/add-group', 'Group::add-group');
$routes->add('/add-lc-info', 'LeavingCertificate::add_lc_info');
$routes->add('/bonafide-certificate', 'BonafideCertificate::index');
$routes->add('/bonafide-print', 'BonafideCertificate::bonafide_print');
$routes->add('/collect-fees', 'FeesManagement::collect-fees');
$routes->add('/create_ticket', 'Ticket::create_ticket');
$routes->add('/delete-head-group', 'FeesManagement::delete-head-group');
$routes->add('/faculty-profile', 'FacultyProfile::index');
$routes->add('/faculty-personal-info', 'FacultyProfile::update_personal_info');
$routes->add('/feedback', 'Feedback::index');
$routes->add('/feedback', 'Feedback::index');
$routes->add('/fetch-head', 'FeesManagement::fetch-head');
$routes->add('/fetch-head-group', 'FeesManagement::fetch-head-group');
$routes->add('/head', 'FeesManagement::head');
$routes->add('/head-fees', 'FeesManagement::head-fees');
$routes->add('/head-group', 'FeesManagement::head-group');
$routes->add('/home', 'Home::index');
$routes->add('/i-card', 'ICard::index');
$routes->add('/i-card-print', 'ICard::i_card_print');
$routes->add('/leaving-certificate', 'LeavingCertificate::index');
$routes->add('/login', 'Login::login');
$routes->add('/leaving-certificate-report', 'LeavingCertificateReport::index');
$routes->add('/manage-question', 'Feedback::manage_question');
$routes->add('/registration', 'Registration::index');
$routes->add('/student-profile', 'Registration::studentProfile');
$routes->add('/authenticate', 'Registration::authenticate');
$routes->add('/savesignup', 'Registration::saveSignup');
$routes->add('/studentDashboard', 'Login::studentDashboard');
$routes->add('/studentProfile', 'Registration::studentProfile');
$routes->add('/student-list', 'FeesManagement::student-list');
$routes->add('/save-feedback-master', 'Feedback::save_feedback_master');
$routes->add('/sample-excel-file', 'Feedback::sample_excel_file');
$routes->add('/ticket', 'Ticket::index');

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
