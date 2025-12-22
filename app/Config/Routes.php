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
$routes->setDefaultController('Dahboard');
$routes->setDefaultMethod('index');
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
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('admin-dashboard', 'Dashboard::admin_dashboard',['filter' => 'permission:viewAdminDashboard']);
$routes->get('faculty-dashboard', 'Dashboard::faculty_dashboard',['filter' => 'permission:viewFacultyDashboard']);
$routes->get('librarian-dashboard', 'Dashboard::librarian_dashboard',['filter' => 'permission:viewLibrarianDashboard']);
$routes->get('accountant-dashboard', 'Dashboard::accountant_dashboard',['filter' => 'permission:viewAccountantDashboard']);
$routes->get('iqac-dashboard', 'Dashboard::iqac_dashboard',['filter' => 'permission:viewIqacDashboard']);
$routes->get('student-dashboard', 'Dashboard::student_dashboard',['filter' => 'permission:viewStudentDashboard']);

$routes->get('login', 'Login::login');
$routes->get('forbidden', 'Error::forbidden');
$routes->get('logout', 'Login::logout');
$routes->post('/add-group', 'Group::add-group');

$routes->post('/bonafide-certificate', 'BonafideCertificate::index');
$routes->post('/bonafide-print', 'BonafideCertificate::bonafide_print');
$routes->post('/collect-fees', 'FeesManagement::collect_fees');
$routes->post('/create_ticket', 'Ticket::create_ticket');
$routes->post('/faculty-profile', 'FacultyProfile::index');
$routes->post('/faculty-personal-info', 'FacultyProfile::update_personal_info');

$routes->post('/fetch-head', 'FeesManagement::fetch-head');
$routes->post('/head', 'FeesManagement::head');
$routes->post('/head-fees', 'FeesManagement::head_fees');

$routes->post('/home', 'Home::index');
$routes->post('/i-card', 'ICard::index');
$routes->post('/i-card-print', 'ICard::i_card_print');

$routes->post('/check-user', 'Login::check_user');

$routes->get('student-registration', 'StudentRegistration::index');
$routes->post('save-registration', 'StudentRegistration::add_registration');
//$routes->post('/studentProfile', 'Registration::studentProfile');
$routes->get('/student-profile', 'StudentRegistration::student_profile',['filter' => 'permission:viewStudentProfile']);
$routes->post('/savesignup', 'Registration::saveSignup');
$routes->get('/student-dashboard', 'Login::studentDashboard');
$routes->get('/studentDashboard', 'Login::studentDashboard');
$routes->post('/studentProfile', 'Registration::studentProfile');
$routes->post('/student-list', 'FeesManagement::student_list');
$routes->post('/ticket', 'Ticket::index');

$routes->group('leavingcertificate', function ($routes) {    
    $routes->get('/', 'LeavingCertificate::index', ['filter' => 'permission:createFeesManagement']);
    $routes->post('fetch-lc-student-list', 'LeavingCertificate::fetch_lc_student_list', ['filter' => 'permission:createFeesManagement']);
    $routes->post('check-lc-exists', 'LeavingCertificate::check_lc_exists', ['filter' => 'permission:createFeesManagement']);
    $routes->post('add-leaving-certificate-data', 'LeavingCertificate::add_leaving_certificate_data', ['filter' => 'permission:createFeesManagement']);   
//    $routes->get('print-leaving-certificate/(:num)', 'LeavingCertificate::print_leaving_certificate/$1', ['filter' => 'permission:createFeesManagement']);   
    $routes->get('print-leaving-certificate', 'LeavingCertificate::print_leaving_certificate', ['filter' => 'permission:createFeesManagement']);   
    $routes->post('print-leaving-certificate', 'LeavingCertificate::print_leaving_certificate', ['filter' => 'permission:createFeesManagement']);   
    $routes->get('leaving-certificate-report', 'LeavingCertificateReport::index', ['filter' => 'permission:createFeesManagement']);    
});

//---------- feedback ----------//
$routes->group('feedback', function ($routes) {
    $routes->get('/', 'Feedback::index',['filter' => 'permission:createFeedback']);
    $routes->post('save-feedback-master', 'Feedback::save_feedback_master',['filter' => 'permission:createFeedback']);
     $routes->post('delete-feedback-master', 'Feedback::delete_feedback_master', ['filter' => 'permission:deleteFeedback']);
    $routes->post('revert-feedback-master', 'Feedback::revert_feedback_master', ['filter' => 'permission:updateFeedback']);
    
    
    $routes->post('fetch-feedback-master', 'Feedback::fetch_feedback_master',['filter' => 'permission:createFeedback']);
    
    
    $routes->get('manage-question', 'Feedback::manage_question' , ['filter' => 'permission:createFeedback']);
    $routes->get('sample-excel-file', 'Feedback::sample_excel_file' , ['filter' => 'permission:createFeedback']);
});
//---------- faculty ----------//
$routes->group('faculty', function ($routes) {

    $routes->get('/', 'Faculty::index', ['filter' => 'permission:createfaculty']);
    $routes->get('fetch-faculty', 'Faculty::faculty_data', ['filter' => 'permission:createfaculty']);
    $routes->get('edit-faculty/(:num)', 'Faculty::edit_faculty/$1', ['filter' => 'permission:updatefaculty']);
    
    $routes->post('add-faculty', 'Faculty::add_faculty', ['filter' => 'permission:createfaculty']);
    $routes->post('fetch-faculty-data', 'Faculty::fetch_faculty', ['filter' => 'permission:createfaculty']);
    
    $routes->post('update-faculty', 'Faculty::update_faculty', ['filter' => 'permission:updatefaculty']);
    $routes->post('delete-faculty', 'Faculty::delete_faculty', ['filter' => 'permission:deletefaculty']);
    $routes->post('revert-faculty', 'Faculty::revert_faculty', ['filter' => 'permission:deletefaculty']);

});

$routes->group('headgroup', function ($routes) {
    $routes->get('/', 'HeadGroup::index', ['filter' => 'permission:createHeadGroup']);
    $routes->post('fetch-head-group', 'HeadGroup::fetch_head_group', ['filter' => 'permission:createHeadGroup']);
    $routes->post('save-head-group', 'HeadGroup::save_head_group', ['filter' => 'permission:createHeadGroup']);
    $routes->post('update-head-group', 'HeadGroup::update_head_group', ['filter' => 'permission:createHeadGroup']);
    $routes->post('delete-head-group', 'HeadGroup::delete_head_group', ['filter' => 'permission:createHeadGroup']);
    $routes->post('revert-head-group', 'HeadGroup::revert_head_group', ['filter' => 'permission:createHeadGroup']);
});

$routes->group('head', function ($routes) {
    $routes->get('/', 'Head::index', ['filter' => 'permission:createHead']);
    $routes->post('fetch-head', 'Head::fetch_head', ['filter' => 'permission:createHead']);
    $routes->post('save-head', 'Head::save_head', ['filter' => 'permission:createHead']);
    $routes->post('update-head', 'Head::update_head', ['filter' => 'permission:createHead']);
    $routes->post('delete-head', 'Head::delete_head', ['filter' => 'permission:createHead']);
    $routes->post('revert-head', 'Head::revert_head', ['filter' => 'permission:createHead']);
});

$routes->group('department', function ($routes) {
    $routes->get('/', 'Department::index', ['filter' => 'permission:createDepartment']);
    $routes->post('fetch-department', 'Department::fetch_department', ['filter' => 'permission:createDepartment']);
    $routes->post('save-department', 'Department::save_department', ['filter' => 'permission:createDepartment']);
    $routes->post('update-department', 'Department::update_department', ['filter' => 'permission:createDepartment']);
    $routes->post('delete-department', 'Department::delete_department', ['filter' => 'permission:createDepartment']);
    $routes->post('revert-department', 'Department::revert_department', ['filter' => 'permission:createDepartment']);
});


$routes->group('roles', function ($routes) {
    $routes->get('/', 'Role::index', ['filter' => 'permission:viewRole']);
    $routes->post('fetch-role', 'Role::fetch_role', ['filter' => 'permission:viewRole']);
    $routes->get('add-role', 'Role::add_role', ['filter' => 'permission:createRole']);
    $routes->post('save-role', 'Role::save_role', ['filter' => 'permission:createRole']);
    $routes->get('edit-role/(:num)', 'Role::edit_role/$1', ['filter' => 'permission:updateRole']);
    $routes->post('update-role/(:num)', 'Role::update_role/$1', ['filter' => 'permission:updateRole']);
    $routes->post('delete-role', 'Role::delete_role', ['filter' => 'permission:deleteRole']);
    $routes->post('revert-role', 'Role::revert_role', ['filter' => 'permission:deletteRole']);
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

