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
$routes->get('admin-dashboard', 'Dashboard::admin_dashboard', ['filter' => 'permission:viewAdminDashboard']);
$routes->get('faculty-dashboard', 'Dashboard::faculty_dashboard', ['filter' => 'permission:viewFacultyDashboard']);
$routes->get('librarian-dashboard', 'Dashboard::librarian_dashboard', ['filter' => 'permission:viewLibrarianDashboard']);
$routes->get('accountant-dashboard', 'Dashboard::accountant_dashboard', ['filter' => 'permission:viewAccountantDashboard']);
$routes->get('iqac-dashboard', 'Dashboard::iqac_dashboard', ['filter' => 'permission:viewIqacDashboard']);
$routes->get('student-dashboard', 'Dashboard::student_dashboard', ['filter' => 'permission:viewStudentDashboard']);

$routes->get('login', 'Login::login');
$routes->get('forbidden', 'Error::forbidden');
$routes->get('logout', 'Login::logout');
$routes->post('/add-group', 'Group::add-group');

$routes->get('/collect-fees', 'FeesManagement::collect_fees');

$routes->post('/fetch-head', 'FeesManagement::fetch-head');
$routes->post('/head', 'FeesManagement::head');
$routes->post('/head-fees', 'FeesManagement::head_fees');

$routes->post('/home', 'Home::index');

$routes->post('/check-user', 'Login::check_user');

$routes->get('student-registration', 'StudentRegistration::index');
$routes->post('save-registration', 'StudentRegistration::add_registration');
$routes->get('/student-profile', 'StudentProfile::index', ['filter' => 'permission:viewStudentProfile']);
$routes->post('add-personal-details', 'StudentProfile::add_personal_information', ['filter' => 'permission:viewStudentProfile']);
$routes->post('add-address-details', 'StudentProfile::add_address_details', ['filter' => 'permission:viewStudentProfile']);
$routes->get('get-pincode/(:num)', 'PincodeData::getPincode/$1', ['filter' => 'permission:viewStudentProfile']);

$routes->post('/savesignup', 'Registration::saveSignup');
$routes->get('/student-dashboard', 'Login::studentDashboard');
$routes->get('/studentDashboard', 'Login::studentDashboard');
$routes->post('/studentProfile', 'Registration::studentProfile');
$routes->get('/student-list', 'FeesManagement::student_list');
$routes->get('approve-registration', 'ApproveRegistration::index', ['filter' => 'permission:viewApproveRegistration']);
$routes->post('fetch-registrationstudent', 'ApproveRegistration::fetch_registrationstudent', ['filter' => 'permission:createApproveRegistration']);
$routes->post('approve-student', 'ApproveRegistration::approve_student', ['filter' => 'permission:updateApproveRegistration']);
$routes->post('reject-student', 'ApproveRegistration::reject_student', ['filter' => 'permission:updateApproveRegistration']);

$routes->group('leavingcertificate', function ($routes) {
    $routes->get('/', 'LeavingCertificate::index', ['filter' => 'permission:createLeavingCertificate']);
    $routes->post('fetch-lc-student-list', 'LeavingCertificate::fetch_lc_student_list', ['filter' => 'permission:createLeavingCertificate']);
    $routes->post('check-lc-exists', 'LeavingCertificate::check_lc_exists', ['filter' => 'permission:createLeavingCertificate']);
    $routes->post('add-leaving-certificate-data', 'LeavingCertificate::add_leaving_certificate_data', ['filter' => 'permission:createLeavingCertificate']);
    $routes->get('print-leaving-certificate', 'LeavingCertificate::print_leaving_certificate', ['filter' => 'permission:createLeavingCertificate']);
    $routes->post('print-leaving-certificate', 'LeavingCertificate::print_leaving_certificate', ['filter' => 'permission:createLeavingCertificate']);
    $routes->get('leaving-certificate-report', 'LeavingCertificateReport::index', ['filter' => 'permission:createLeavingCertificate']);
    $routes->post('fetch-lc-report', 'LeavingCertificateReport::fetch_lc_report', ['filter' => 'permission:createLeavingCertificate']);
    $routes->get('print-lc', 'LeavingCertificateReport::print_lc', ['filter' => 'permission:createLeavingCertificate']);
    $routes->post('cancel-lc', 'LeavingCertificateReport::cancel_lc', ['filter' => 'permission:createLeavingCertificate']);
});

$routes->group('bonafidecertificate', function ($routes) {
    $routes->get('/', 'BonafideCertificate::index', ['filter' => 'permission:createBonafideCertificate']);
    $routes->post('fetch-bonafide-student-list', 'BonafideCertificate::fetch_bonafide_student_list', ['filter' => 'permission:createBonafideCertificate']);
    $routes->post('add-bonafide-certificate-data', 'BonafideCertificate::add_bonafide_certificate_data', ['filter' => 'permission:createBonafideCertificate']);
    $routes->get('print-bonafide-certificate', 'BonafideCertificate::print_bonafide_certificate', ['filter' => 'permission:createBonafideCertificate']);
    $routes->post('print-bonafide-certificate', 'BonafideCertificate::print_bonafide_certificate', ['filter' => 'permission:createBonafideCertificate']);
    $routes->get('bonafide-certificate-report', 'BonafideCertificateReport::index', ['filter' => 'permission:createBonafideCertificate']);
    $routes->post('fetch-bonafide-report', 'BonafideCertificateReport::fetch_bonafide_report', ['filter' => 'permission:createBonafideCertificate']);
    $routes->get('print-bonafide', 'BonafideCertificateReport::print_bonafide', ['filter' => 'permission:createBonafideCertificate']);
    $routes->post('cancel-bonafide', 'BonafideCertificateReport::cancel_bonafide', ['filter' => 'permission:createBonafideCertificate']);
});

$routes->group('icard', function ($routes) {
    $routes->get('/', 'ICard::index', ['filter' => 'permission:createFeesManagement']);
    $routes->get('i-card-print', 'ICard::i_card_print', ['filter' => 'permission:createFeesManagement']);
    $routes->get('i-card-print1', 'ICard::i_card_print1', ['filter' => 'permission:createFeesManagement']);
});

//---------- feedback ----------//
$routes->group('feedback', function ($routes) {
    $routes->get('/', 'Feedback::index', ['filter' => 'permission:createFeedback']);
    $routes->post('save-feedback-master', 'Feedback::save_feedback_master', ['filter' => 'permission:createFeedback']);
    $routes->post('delete-feedback-master', 'Feedback::delete_feedback_master', ['filter' => 'permission:deleteFeedback']);
    $routes->post('revert-feedback-master', 'Feedback::revert_feedback_master', ['filter' => 'permission:updateFeedback']);
    $routes->post('fetch-feedback-master', 'Feedback::fetch_feedback_master', ['filter' => 'permission:createFeedback']);
    $routes->post('get-feedback-master', 'Feedback::get_feedback_master', ['filter' => 'permission:createFeedback']);
    $routes->get('manage-question', 'Feedback::manage_question', ['filter' => 'permission:createFeedback']);
    $routes->get('sample-excel-file', 'Feedback::sample_excel_file', ['filter' => 'permission:createFeedback']);
});

//---------- faculty ----------//
$routes->group('faculty', function ($routes) {
    $routes->get('/', 'Faculty::index', ['filter' => 'permission:createFaculty']);
    $routes->get('fetch-faculty', 'Faculty::faculty_data', ['filter' => 'permission:viewFaculty']);
    $routes->get('edit-faculty/(:num)', 'Faculty::edit_faculty/$1', ['filter' => 'permission:updateFaculty']);
    $routes->post('add-faculty', 'Faculty::add_faculty', ['filter' => 'permission:createFaculty']);
    $routes->post('fetch-faculty-data', 'Faculty::fetch_faculty', ['filter' => 'permission:viewFaculty']);
    $routes->post('update-faculty', 'Faculty::update_faculty', ['filter' => 'permission:updateFaculty']);
    $routes->post('delete-faculty', 'Faculty::delete_faculty', ['filter' => 'permission:deleteFaculty']);
    $routes->post('revert-faculty', 'Faculty::revert_faculty', ['filter' => 'permission:deleteFaculty']);
    $routes->post('getFacultyDetails','Faculty::getFacultyDetails',['filter' => 'permission:viewFaculty']);

//    $routes->post('change-password-first-login','Faculty::change_password_first_login');
});
// ✅ FIRST LOGIN PASSWORD CHANGE (NO PERMISSION FILTER)
$routes->post('check-old-password', 'Faculty::check_old_password');
$routes->get('change-password-first-login', 'Faculty::firstLoginChangePassword');
$routes->post('change-password-first-login', 'Faculty::updateFirstLoginPassword');

$routes->group('headgroup', function ($routes) {
    $routes->get('/', 'HeadGroup::index', ['filter' => 'permission:viewHeadGroup']);
    $routes->post('fetch-head-group', 'HeadGroup::fetch_head_group', ['filter' => 'permission:viewHeadGroup']);
    $routes->post('save-head-group', 'HeadGroup::save_head_group', ['filter' => 'permission:createHeadGroup']);
    $routes->post('update-head-group', 'HeadGroup::update_head_group', ['filter' => 'permission:updateHeadGroup']);
    $routes->post('delete-head-group', 'HeadGroup::delete_head_group', ['filter' => 'permission:deleteHeadGroup']);
    $routes->post('revert-head-group', 'HeadGroup::revert_head_group', ['filter' => 'permission:deleteHeadGroup']);
    $routes->get('search-head-group', 'HeadGroup::search_head_group', ['filter' => 'permission:createHeadGroup']);
});

$routes->group('head', function ($routes) {
    $routes->get('/', 'Head::index', ['filter' => 'permission:viewHead']);
    $routes->post('fetch-head', 'Head::fetch_head', ['filter' => 'permission:viewHead']);
    $routes->post('save-head', 'Head::save_head', ['filter' => 'permission:createHead']);
    $routes->post('update-head', 'Head::update_head', ['filter' => 'permission:updateHead']);
    $routes->post('delete-head', 'Head::delete_head', ['filter' => 'permission:deleteHead']);
    $routes->post('revert-head', 'Head::revert_head', ['filter' => 'permission:deleteHead']);
    $routes->get('search-head', 'Head::search_head', ['filter' => 'permission:createHead']);
});

$routes->group('department', function ($routes) {
    $routes->get('/', 'Department::index', ['filter' => 'permission:viewDepartment']);
    $routes->post('fetch-department', 'Department::fetch_department', ['filter' => 'permission:viewDepartment']);
    $routes->post('save-department', 'Department::save_department', ['filter' => 'permission:createDepartment']);
    $routes->post('update-department', 'Department::update_department', ['filter' => 'permission:updateDepartment']);
    $routes->post('delete-department', 'Department::delete_department', ['filter' => 'permission:deleteDepartment']);
    $routes->post('revert-department', 'Department::revert_department', ['filter' => 'permission:deleteDepartment']);
    $routes->get('search-department', 'Department::search_department', ['filter' => 'permission:createDepartment']);
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

$routes->group('ticket', function ($routes) {
    $routes->get('/', 'ticket::index', ['filter' => 'permission:viewTicket']);
    $routes->post('create_ticket', 'Ticket::create_ticket', ['filter' => 'permission:updateTicket']);
});

$routes->group('faculty-profile', function ($routes) {
    $routes->get('/', 'FacultyProfile::index', ['filter' => 'permission:viewFacultyProfile']);
    $routes->post('/faculty-personal-info', 'FacultyProfile::update_personal_info', ['filter' => 'permission:updateFacultyProfile']);
});

$routes->group('activity-log', function ($routes) {
    $routes->get('/', 'ActivityLog::index', ['filter' => 'permission:viewActivityLog']);
    $routes->post('fetch-activity-log', 'ActivityLog::fetch_activity_log', ['filter' => 'permission:viewActivityLog']);
//    $routes->post('save-department', 'Department::save_department', ['filter' => 'permission:createDepartment']);
//    $routes->post('update-department', 'Department::update_department', ['filter' => 'permission:updateDepartment']);
//    $routes->post('delete-department', 'Department::delete_department', ['filter' => 'permission:deleteDepartment']);
//    $routes->post('revert-department', 'Department::revert_department', ['filter' => 'permission:deleteDepartment']);
//    $routes->get('search-department', 'Department::search_department', ['filter' => 'permission:createDepartment']);
});

$routes->group('subjectgroup', function ($routes) {
    $routes->get('/', 'SubjectGroup::index', ['filter' => 'permission:viewSubjectGroup']);
    $routes->post('fetch-subject-group', 'SubjectGroup::fetch_subject_group', ['filter' => 'permission:viewSubjectGroup']);
    $routes->post('save-subject-group', 'SubjectGroup::save_subject_group', ['filter' => 'permission:createSubjectGroup']);
    $routes->post('update-subject-group', 'SubjectGroup::update_subject_group', ['filter' => 'permission:updateSubjectGroup']);
    $routes->post('delete-subject-group', 'SubjectGroup::delete_subject_group', ['filter' => 'permission:deleteSubjectGroup']);
    $routes->post('revert-subject-group', 'SubjectGroup::revert_subject_group', ['filter' => 'permission:deleteSubjectGroup']);
    $routes->get('search-subject-group', 'SubjectGroup::search_subject_group', ['filter' => 'permission:createSubjectGroup']);
});

$routes->group('subject', function ($routes) {
    $routes->get('/', 'Subject::index', ['filter' => 'permission:viewSubject']);
    $routes->post('fetch-subject', 'Subject::fetch_subject', ['filter' => 'permission:viewSubject']);
    $routes->post('save-subject', 'Subject::save_subject', ['filter' => 'permission:createSubject']);
    $routes->post('update-subject', 'Subject::update_subject', ['filter' => 'permission:updateSubject']);
    $routes->post('delete-subject', 'Subject::delete_subject', ['filter' => 'permission:deleteSubject']);
    $routes->post('revert-subject', 'Subject::revert_subject', ['filter' => 'permission:deleteSubject']);
    $routes->get('search-subject', 'Subject::search_subject', ['filter' => 'permission:createSubject']);
});

$routes->get('change-password', 'ChangePassword::index', ['filter' => 'permission:viewSetings']);
$routes->post('change-password/update', 'ChangePassword::update', ['filter' => 'permission:viewSetings']);
$routes->post('change-password/check-old', 'ChangePassword::checkOldPassword', ['filter' => 'permission:viewSetings']);






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

