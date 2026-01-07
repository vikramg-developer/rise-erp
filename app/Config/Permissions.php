<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Description of Permissions
 *
 * @author Shoeb
 */
class Permissions extends BaseConfig {
    //put your code here

    /* ===============================
     * Sub-groups
     * =============================== */

    /** Head Group permissions */
    public array $headGroup = [
        'createHeadGroup',
        'viewHeadGroup',
        'updateHeadGroup',
        'deleteHeadGroup',
    ];

    /** Head permissions */
    public array $head = [
        'createHead',
        'viewHead',
        'updateHead',
        'deleteHead',
    ];

    /** Department permissions */
    public array $department = [
        'createDepartment',
        'viewDepartment',
        'updateDepartment',
        'deleteDepartment',
    ];

    /** Admin Dashboard permissions */
    public array $adminDashboard = [
        'createAdminDashboard',
        'viewAdminDashboard',
        'updateAdminDashboard',
        'deleteAdminDashboard',
    ];

    /** Faculty Dashboard permissions */
    public array $facultyDashboard = [
        'createFacultyDashboard',
        'viewFacultyDashboard',
        'updateFacultyDashboard',
        'deleteFacultyDashboard',
    ];

    /** Librarian Dashboard permissions */
    public array $librarianDashboard = [
        'createLibrarianDashboard',
        'viewLibrarianDashboard',
        'updateLibrarianDashboard',
        'deleteLibrarianDashboard',
    ];

    /** Accountant Dashboard permissions */
    public array $accountantDashboard = [
        'createAccountantDashboard',
        'viewAccountantDashboard',
        'updateAccountantDashboard',
        'deleteAccountantDashboard',
    ];

    /** IQAC Dashboard permissions */
    public array $iqacDashboard = [
        'createIqacDashboard',
        'viewIqacDashboard',
        'updateIqacDashboard',
        'deleteIqacDashboard',
    ];

    /** Student Dashboard permissions */
    public array $studentDashboard = [
        'createStudentDashboard',
        'viewStudentDashboard',
        'updateStudentDashboard',
        'deleteStudentDashboard',
    ];

    /** Student Profile permissions */
    public array $studentProfile = [
        'createStudentProfile',
        'viewStudentProfile',
        'updateStudentProfile',
        'deleteStudentProfile',
    ];

    /** feedback permissions */
    public array $feedback = [
        'createFeedback',
        'viewFeedback',
        'updateFeedback',
        'deleteFeedback',
    ];

    /** Faculty permissions */
    public array $faculty_registration = [
        'createFaculty',
        'viewFaculty',
        'updateFaculty',
        'deleteFaculty',
    ];

    /** Faculty Profile */
    public array $faculty_profile = [
        'createFacultyProfile',
        'viewFacultyProfile',
        'updateFacultyProfile',
        'deleteFacultyProfile',
    ];

    /** Student Approve permissions */
    public array $approveRegistration = [
        'createApproveRegistration',
        'viewApproveRegistration',
        'updateApproveRegistration',
        'deleteApproveRegistration',
    ];

    /** ticket permissions */
    public array $Ticket = [
        'createTicket',
        'updateTicket',
        'viewTicket',
        'deleteTicket'
    ];

    /** leaving certificate permissions */
    public array $leaving_certificate = [
        'createLeavingCertificate',
        'updateLeavingCertificate',
        'viewLeavingCertificate',
        'deleteLeavingCertificate'
    ];

    /** bonafide certificate permissions */
    public array $bonafide_certificate = [
        'createBonafideCertificate',
        'updateBonafideCertificate',
        'viewBonafideCertificate',
        'deleteBonafideCertificate'
    ];
    
    /** Activity Log permissions */
    public array $activity_log = [
        'createActivityLog',
        'updateActivityLog',
        'viewActivityLog',
        'deleteActivityLog'
    ];
    
    /** Subject Group permissions */
    public array $subjectGroup = [
        'createSubjectGroup',
        'viewSubjectGroup',
        'updateSubjectGroup',
        'deleteSubjectGroup',
    ];

    /** Subject permissions */
    public array $subject = [
        'createSubject',
        'viewSubject',
        'updateSubject',
        'deleteSubject',
    ];

    /** Master permissions (auto-merged) */
    public array $master;
    public array $master_dashboard;
    public array $master_category;
    public array $feedback_module;
    public array $feedback_module_category;
    public array $faculty_module;
    public array $faculty_module_category;
    public array $faculty_profile_module;
//    public array $faculty_profile_module_category;
    public array $ticket_module;
    public array $ticket_module_category;
    public array $certificates;
    public array $certificates_category;

    public function __construct() {
        //-----------for submenu -------------------//
        $this->master = array_merge(
                $this->headGroup,
                $this->head,
                $this->department,
                $this->activity_log,
                $this->subjectGroup,
                $this->subject,
        );
        $this->dashboard = array_merge(
                $this->adminDashboard,
                $this->facultyDashboard,
                $this->librarianDashboard,
                $this->accountantDashboard,
                $this->iqacDashboard,
                $this->studentDashboard
        );

        $this->feedback_module = array_merge(
                $this->feedback
        );

        //Faculty Registation (user)
        $this->faculty_module = array_merge(
                $this->faculty_registration
        );
        
        //faculty profile(API)
        $this->faculty_profile_module = array_merge(
                $this->faculty_profile
        );

        $this->ticket_module = array_merge(
                $this->Ticket
        );
        $this->certificates = array_merge(
                $this->leaving_certificate,
                $this->bonafide_certificate,
        );

        //---------------------------Main Menu Label---------------------------//
        $this->master_category = array_merge(
                $this->master
        );

        $this->feedback_module_category = array_merge(
                $this->feedback_module
        );
        $this->master_dashboard = array_merge(
                $this->dashboard
        );
        //Faculty Regiatration
        $this->faculty_module_category = array_merge(
                $this->faculty_module
        );

//        //Faculty Profile
//        $this->faculty_profile_module_category = array_merge(
//                $this->faculty_profile_module
//        );
//        
        //Ticket
        $this->ticket_module_category = array_merge(
                $this->ticket_module
        );

        $this->certificates_category = array_merge(
                $this->certificates
        );
    }
}
