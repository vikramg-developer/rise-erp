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
    
    /** Master permissions (auto-merged) */
    public array $master;
    
    public array $master_category;

    public function __construct()
    {
        $this->master = array_merge(
            $this->headGroup,
            $this->head,
            $this->department,
        );
        
        $this->master_category = array_merge(
               $this->master 
        );
    }
}
