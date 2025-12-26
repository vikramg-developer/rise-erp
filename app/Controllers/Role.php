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
                $buttons .= '<a href="roles/edit-role/' . $row['role_id'] . '" class="btn btn-icon btn-sm btn-secondary btn-wave rounded-pill tooltips edit" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-secondary" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill"></i></a>';
            endif;
            
            // Delete Button
            if (hasPermission('deleteRole')):
                if ($row['is_deleted'] != 1):
                    $buttons .= ' <button class="btn btn-icon btn-sm btn-danger btn-wave rounded-pill delete" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-danger" data-bs-placement="top" title="Delete" data-role_id="' . $row['role_id'] . '" data-role_name="' . $row['role_name'] . '"><i class="ri-delete-bin-fill"></i></button>';
                elseif ($row['is_deleted'] == 1):
                    $buttons .= ' <button class="btn btn-icon btn-sm btn-warning btn-wave rounded-pill revert" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-warning" data-bs-placement="top" title="Revert" data-role_id="' . $row['role_id'] . '" data-role_name="' . $row['role_name'] . '"><i class="ri-arrow-go-back-fill"></i></button>';
                endif;
            endif;
            
            // Added By
            if (!empty($row['added_by']) && !empty($row['added_at'])):
                $addedBy =  '<div class="text-center">
                                    <span class="badge bg-success-transparent px-3 py-2 fw-semibold" style="font-size:0.8rem">
                                        <i class="ri-user-add-line me-1"></i>
                                        ' . ($facultyNameMap[$row['added_by']] ?? '') . '
                                    </span>
                                    <div class="small text-muted mt-1">
                                        <i class="ri-time-line me-1"></i>
                                        ' . date('d M Y, h:i:s A', strtotime($row['added_at'])) . '
                                    </div>
                                </div>';
            else:
                $addedBy = "";
            endif;
            
            // Updated By
            if (!empty($row['updated_by']) && !empty($row['updated_at'])):
                $updatedBy =    '<div class="text-center">
                                    <span class="badge bg-primary-transparent px-3 py-2 fw-semibold" style="font-size:0.8rem">
                                        <i class="ri-user-add-line me-1"></i>
                                        ' . ($facultyNameMap[$row['updated_by']] ?? '') . '
                                    </span>
                                    <div class="small text-muted mt-1">
                                        <i class="ri-time-line me-1"></i>
                                        ' . date('d M Y, h:i:s A', strtotime($row['updated_at'])) . '
                                    </div>
                                </div>';
            else:
                $updatedBy = "";
            endif;
            
            
            // Remark
            if ($row['is_deleted'] == 1 && !empty($row['updated_by'])):
                $remark =   '<div class="text-center">
                                <span class="badge bg-danger-transparent px-3 py-2 fw-semibold" style="font-size:0.8rem">
                                    <i class="ri-delete-bin-line me-1"></i>
                                    Deleted by ' . ($facultyNameMap[$row['deleted_by']] ?? '') . '
                                </span>
                                <div class="small text-muted mt-1">
                                    <i class="ri-time-line me-1"></i>
                                    ' . date('d M Y, h:i:s A', strtotime($row['deleted_at'])) . '
                                </div>
                            </div>';
            elseif ($row['is_deleted'] == 2 && !empty($row['updated_by'])):
                $remark =   '<div class="text-center">
                                <span class="badge bg-warning-transparent px-3 py-2 fw-semibold" style="font-size:0.8rem">
                                    <i class="ri-arrow-go-back-line me-1"></i>
                                    Reverted by ' . ($facultyNameMap[$row['deleted_by']] ?? '') . '
                                </span>
                                <div class="small text-muted mt-1">
                                    <i class="ri-time-line me-1"></i>
                                    ' . date('d M Y, h:i:s A', strtotime($row['deleted_at'])) . '
                                </div>
                            </div>';
            else:
                $remark = "";
            endif;

            $data[] = [
                (hasPermission('viewRole') || hasPermission('deleteRole')) ? $buttons : '',
                $sr_no++,
                $row['role_name'],
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
