<?php

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * Description of Group
 *
 * @author Dell
 */
class Role extends BaseController {

    protected $modelrole;
    protected $modelfacultyregistration;

    public function __construct() {
        $this->modelrole = model('ModelRole');
        $this->modelfacultyregistration = model('ModelFacultyRegistration');
    }

    public function index() {
        session()->set('back_url', current_url());
        $data['jspath'] = 'roles/index-role';
        $data['title'] = lang('App.rise') . " - " . lang('App.manage') . " " . lang('App.role');
        return render_page('role/index-role', $data);
    }

    public function fetch_role() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL (without search, but with base filters)
        $recordsTotal = $this->modelrole->countAllRoles();

        // FILTERED
        $recordsFiltered = $this->modelrole->countFilteredRoles($search);

        // DATA
        $rows = $this->modelrole->getFilteredRoles($length, $start, $search);

        $facultyNameMap = $this->modelfacultyregistration->getRiseNoNameMap();

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            // Edit Button
            if (hasPermission('updateRole')):
                $buttons .= actionHrefButton('Edit', 'roles/edit-role/' . $row['role_id']);
            endif;

            // Delete Button
            if (hasPermission('deleteRole')):
                if ($row['is_deleted'] != 1):
                    $buttons .= actionButton('Delete', ['role_id' => $row['role_id'], 'role_name' => $row['role_name']]);
                elseif ($row['is_deleted'] == 1):
                    $buttons .= actionButton('Revert', ['role_id' => $row['role_id'], 'role_name' => $row['role_name']]);
                endif;
            endif;

            // Added By
            if (!empty($row['added_by']) && !empty($row['added_at'])):
                $addedBy = activityBadge('success', $facultyNameMap[$row['added_by']], $row['added_at']);
            else:
                $addedBy = "";
            endif;

            // Updated By
            if (!empty($row['updated_by']) && !empty($row['updated_at'])):
                $updatedBy = activityBadge('primary', $facultyNameMap[$row['updated_by']], $row['updated_at']);
            else:
                $updatedBy = "";
            endif;

            // Remark
            if ($row['is_deleted'] == 1 && !empty($row['deleted_by']) && !empty($row['deleted_at'])):
                $remark = activityBadge('danger', $facultyNameMap[$row['deleted_by']], $row['deleted_at']);
            
            elseif ($row['is_deleted'] == 2 && !empty($row['deleted_by']) && !empty($row['deleted_at'])):
                $remark = activityBadge('warning', $facultyNameMap[$row['deleted_by']], $row['deleted_at']);
            else:
                $remark = "";
            endif;

            $data[] = [
                (hasPermission('viewRole') || hasPermission('deleteRole')) ? $buttons : '',
                $sr_no++,
                esc($row['role_name']),
                $addedBy,
                $updatedBy,
                $remark,
            ];
        }

        return $this->response->setJSON([
                    'draw' => $draw,
                    'recordsTotal' => $recordsTotal,
                    'recordsFiltered' => $recordsFiltered,
                    'data' => $data,
                    'csrfHash' => csrf_hash() // send fresh token back
        ]);
    }

    public function add_role() {
        $permissionsPath = APPPATH . 'Config/permissions.json';
        $data['permissions'] = json_decode(file_get_contents($permissionsPath), true);
        $data['title'] = lang('App.rise') . " - " . lang('App.add') . " " . lang('App.role');

        $data['backUrl'] = previous_url() ?? base_url('roles');
        return render_page('role/add-role', $data);
    }

    public function save_role() {

        $permissions = $this->request->getVar('permission') ?? [];
        $permission = json_encode($permissions);

        $insert_data = [
            'role_name' => clean_name($this->request->getVar('role_name')),
            'permissions' => $permission,
            'added_by' => current_user()
        ];

        if ($this->modelrole->insert($insert_data)) {

            return redirect()
                            ->to('roles')
                            ->with('toast', [
                                'status' => 'success',
                                'message' => 'Role added successfully'
            ]);
        }

        return redirect()->back()
                        ->withInput()
                        ->with('errors', $this->modelrole->errors());
    }

    public function edit_role($role_id) {
        $permissionsPath = APPPATH . 'Config/permissions.json';
        $data['permissions'] = json_decode(file_get_contents($permissionsPath), true);
        $data['backUrl'] = previous_url() ?? base_url('roles');
        $data['role_data'] = $this->modelrole->find($role_id);
        $data['jspath'] = 'roles/edit-role';
        $data['title'] = lang('App.rise') . " - " . lang('App.edit') . " " . lang('App.role');

        return render_page('role/edit-role', $data);
    }

    public function update_role($role_id) {
        $update_data = [];

        $permissions = $this->request->getVar('permission') ?? [];
        $permission = json_encode($permissions);

        $update_data = [
            'role_name' => clean_name($this->request->getVar('role_name')),
            'permissions' => $permission,
            'updated_by' => current_user()
        ];

        if ($this->modelrole->update($role_id, $update_data)) {

            return redirect()
                            ->to('roles')
                            ->with('toast', [
                                'status' => 'success',
                                'message' => 'Role updated successfully'
            ]);
        }

        return redirect()->back()
                        ->withInput()
                        ->with('errors', $this->modelrole->errors());
    }

    public function delete_role() {

        $role_id = $this->request->getPost('role_id');

        $delete_data = [
            'is_deleted' => 1,
            'deleted_by' => current_user()
        ];

        if ($this->modelrole->update($role_id, $delete_data)) {

            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function revert_role() {

        $role_id = $this->request->getPost('role_id');

        $revert_data = [
            'is_deleted' => 2,
            'deleted_by' => current_user()
        ];

        if ($this->modelrole->update($role_id, $revert_data)) {

            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }
}
