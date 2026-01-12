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
    
     /** Settings permissions */
    public array $settings = [
        'createSettings',
        'viewSettings',
        'updateSettings',
        'deleteSettings',
    ];
    
    /** ICard permissions */
    public array $iCard = [
        'createICard',
        'viewICard',
        'updateICard',
        'deleteICard',
    ];




//    public function __construct() {
        //-----------for submenu -------------------//
    public function master():array{
        return array_merge(
                $this->headGroup,
                $this->head,
                $this->department,
                $this->activity_log,
                $this->subjectGroup,
                $this->subject,
        );
    }
    
    public function dashboard():array{
        return array_merge(
                $this->adminDashboard,
                $this->facultyDashboard,
                $this->librarianDashboard,
                $this->accountantDashboard,
                $this->iqacDashboard,
                $this->studentDashboard
        );
    }
    
    public function feedback_module():array{
        return array_merge(
                $this->feedback
        );
    }

    public function faculty_module():array{
        return array_merge(
                $this->faculty_registration
        );
    }

    public function faculty_profile_module():array{
        return array_merge(
                $this->faculty_profile
        );
    }
    
    public function ticket_module():array{
        return array_merge(
                $this->Ticket
        );
    }
    public function certificates():array{
        return array_merge(
                $this->leaving_certificate,
                $this->bonafide_certificate,
        );
    }
    public function master_category():array{
        return array_merge(
                 $this->master()
        );
    }
    public function feedback_module_category():array{
        return array_merge(
                $this->feedback_module()
        );
    }
    public function master_dashboard():array{
        return array_merge(
                $this->dashboard()
        );
    }
    
    public function faculty_module_category():array{
        return array_merge(
               $this->faculty_module()
        );
    }
    
    public function ticket_module_category():array{
        return array_merge(
                $this->ticket_module()
        );
    }
    
    public function certificates_category():array{
        return array_merge(
                $this->certificates()
        );
    }
    
    public function faculty_registration():array{
        return array_merge(
                $this->faculty_registration()
        );      
        
    }
    
    public function settings_category():array{
        return array_merge(
//                $this->settings_module()
        );
        
        
        
        
    }



//    }
}
