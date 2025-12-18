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

    public function __construct() {
        $this->modelrole = model('ModelRole');
    }

    public function index() {
        session()->set('back_url', current_url());
        $data['jspath'] = 'roles/index-role';
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

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';
            if (hasPermission('updateRole')):
                $buttons .= '<a href="roles/edit-role/' . $row['role_id'] . '" class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill tooltips edit" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill"></i></a>';
            endif;

            if (hasPermission('deleteRole')):
                if ($row['is_deleted'] != 1):
                    $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill delete" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-danger" data-bs-placement="top" title="Delete" data-role_id="' . $row['role_id'] . '" data-role_name="' . $row['role_name'] . '"><i class="ri-delete-bin-fill"></i></button>';
                elseif ($row['is_deleted'] == 1):
                    $buttons .= ' <button class="btn btn-icon btn-sm btn-warning btn-wave rounded-pill revert" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-warning" data-bs-placement="top" title="Revert" data-role_id="' . $row['role_id'] . '" data-role_name="' . $row['role_name'] . '"><i class="ri-arrow-go-back-fill"></i></button>';
                endif;
            endif;

            if ($row['is_deleted'] == 1):
                $remark = "Deleted By Admin";
            elseif ($row['is_deleted'] == 2):
                $remark = "Reverted By Admin";
            else:
                $remark = "";
            endif;

            $data[] = [
                $sr_no++,
                $row['role_name'],
                '',
                '',
                $remark,
                (hasPermission('viewRole') || hasPermission('deleteRole')) ? $buttons : '',
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

        $data['backUrl'] = previous_url() ?? base_url('roles');
        return render_page('role/add-role', $data);
    }

    public function save_role() {

        $permissions = $this->request->getVar('permission') ?? [];
        $permission = json_encode($permissions);

        $insert_data = [
            'role_name' => clean_name($this->request->getVar('role_name')),
            'permissions' => $permission
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

        return render_page('role/edit-role', $data);
    }

    public function update_role($role_id) {
        $update_data = [];

        $permissions = $this->request->getVar('permission') ?? [];
        $permission = json_encode($permissions);

        $update_data = [
            'role_name' => clean_name($this->request->getVar('role_name')),
            'permissions' => $permission
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

        if ($this->modelrole->update($role_id, ['is_deleted' => 1])) {

            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function revert_role() {

        $role_id = $this->request->getPost('role_id');

        if ($this->modelrole->update($role_id, ['is_deleted' => 2])) {

            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }
}
