<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Description of Permissions
 *
 * @author Shoeb
 */
class Permissions extends BaseConfig{
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
    
   


    
    /** Master permissions (auto-merged) */
        public array $master;
        public array $dashboard;
    
    public array $master_category;

    public function __construct()
    {
        $this->master = array_merge(
            $this->headGroup,
            $this->head,
            $this->department,
                
        );
          $this->dashboard = array_merge(
            $this->adminDashboard,
            $this->facultyDashboard,
            $this->librarianDashboard,
            $this->accountantDashboard,
            $this->iqacDashboard,
            $this->studentDashboard
        );

        
        $this->master_category = array_merge(
               $this->master 
        );
    }
    
}
