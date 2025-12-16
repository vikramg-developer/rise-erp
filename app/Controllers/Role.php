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
        $data['jspath'] = 'roles/role';
        return render_page('role/index-role', $data);
    }

    public function fetch_role() {

        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

// TOTAL RECORDS
        $recordsTotal = $this->modelrole->countAll();

// SEARCH FILTER
        if ($search !== '') {
            $this->modelrole->like('role_name', $search);
        }

// FILTERED RECORDS
        $recordsFiltered = $this->modelrole->countAllResults(false);

// PAGINATED DATA
        $rows = $this->modelrole->findAllRecord($length, $start);

        $sr_no = 1;

        $data = [];
        foreach ($rows as $row) {
            $buttons = '';

            $buttons .= '<a href="roles/edit-role/' . $row['role_id'] . '" class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill edit"><i class="ri-pencil-fill"></i></a>';

            if ($row['is_deleted'] != 1):
                $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill delete" data-role_id="' . $row['role_id'] . '" data-role_name="' . $row['role_name'] . '"><i class="ri-delete-bin-fill"></i></button>';
            elseif ($row['is_deleted'] == 1):
                $buttons .= ' <button class="btn btn-icon btn-sm btn-warning btn-wave rounded-pill revert" data-role_id="' . $row['role_id'] . '" data-role_name="' . $row['role_name'] . '"><i class="ri-arrow-go-back-fill"></i></button>';
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
                $buttons,
                '',
                '',
                $remark
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
        $data['backUrl'] = previous_url() ?? base_url('roles');
        $data['role_data'] = $this->modelrole->find($role_id);

        return render_page('role/update-role', $data);
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
