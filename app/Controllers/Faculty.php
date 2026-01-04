<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Faculty extends BaseController {

    protected $modelfaculty;
    protected $modelbranch;
    protected $modelrole;
    protected $modelrisecounter;
    protected $db;

    public function __construct() {
        $this->modelfaculty = model('ModelFacultyRegistration');
        $this->modelbranch = model('ModelBranch');
        $this->modelrole = model('ModelRole');
        $this->modelacademicYear = model('ModelAcademicYear');
        $this->modelrisecounter = model('ModelRiseCounter');
        $this->db = \Config\Database::connect();
    }

    public function index() {
        $data['jspath'] = 'faculty/add-faculty';
        $data['roles'] = $this->modelrole->getRoles();
        return render_page('faculty/faculty-index', $data);
    }

    public function add_faculty() {
        $post = $this->request->getPost();
        $academic_year_data = $this->modelacademicYear->getCurrentAcademicYear();
        $academic_year_id = $academic_year_data['academic_year_id'];
        $rise_counter_data = $this->modelrisecounter->where(['user_type_id' => 1])->first();

        if ($rise_counter_data == null) {
            $data = ['user_type_id' => 1,
                'academic_year_id' => $academic_year_id,
                'rise_no' => 2
            ];
            $this->modelrisecounter->insert($data);
        }
        $this->db->transBegin();

        try {
            $rise_no_counter = $this->modelrisecounter->get_Faculty_Counter_For_Update();

            $branch = $this->modelbranch->getSingleBranch();
            $branchCode = $branch['branch_code'] ?? '000';
            $yearPrefix = substr($academic_year_data['academic_year_name'], 0, 4);
            $faculty_rise_no = 'F' . $yearPrefix . $branchCode . str_pad($rise_no_counter['rise_no'], 4, '0', STR_PAD_LEFT);

            $insertData = [
                'faculty_role_id' => clean_number($this->request->getVar('faculty_role_id')),
                'faculty_gender' => clean_name($this->request->getVar('faculty_gender')),
                'faculty_first_name' => clean_name($this->request->getVar('faculty_first_name')),
                'faculty_middle_name' => clean_name($this->request->getVar('faculty_middle_name')),
                'faculty_last_name' => clean_name($this->request->getVar('faculty_last_name')),
                'faculty_contact_number' => clean_number($this->request->getVar('faculty_contact_number')),
                'faculty_email_id' => clean_email($this->request->getVar('faculty_email_id')),
                'faculty_aadhar_number' => clean_number($this->request->getVar('faculty_aadhar_number')),
                'faculty_pan_number' => clean_name($this->request->getVar('faculty_pan_number')),
                'faculty_password' => clean_name($this->request->getVar('faculty_password')),
                'faculty_rise_no' => $faculty_rise_no,
                'added_by' => session('rise_no'),
            ];

            if (!$this->modelfaculty->insert($insertData)) {
                return $this->response->setJSON([
                            'status' => 'error',
                            'errors' => $this->modelfaculty->errors(),
                            'csrfHash' => csrf_hash(),
                ]);
            }

            $facultyId = $this->modelfaculty->getInsertID();
            if ($facultyId) {
                $update_data = ['rise_no' => ($rise_no_counter['rise_no'] + 1)];
                $this->modelrisecounter->update($rise_no_counter['rise_number_counter_id'], $update_data);
            }
            if ($this->db->transStatus() === false) {
                throw new\Exception('Registration Failed.');
            }
            $this->db->transCommit();
            return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Faculty added successfully. ID: ' . $faculty_rise_no,
                        'csrfHash' => csrf_hash(),
            ]);
        } catch (Exception $ex) {
            $this->db->transRollback();

            return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Registration failed: ',
                        'csrfHash' => csrf_hash(),
            ]);
        }
    }

    public function faculty_data() {

        $data['jspath'] = 'faculty/add-faculty';
        $data['roles'] = $this->modelrole->getRoles();
        return render_page('faculty/manage-faculty', $data);
    }

    public function fetch_faculty() {
        $draw = $this->request->getPost('draw');
        $start = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'] ?? '';

        // TOTAL RECORDS (without search)
        $recordsTotal = $this->modelfaculty->countAll();

        // FILTERED RECORDS (with search)
        $recordsFiltered = $this->modelfaculty->countFiltered($search);

        // MAIN DATA
        $rows = $this->modelfaculty->findAllRecord($length, $start, $search);

        // MAP: rise_no => full name
        $nameMap = $this->modelfaculty->getRiseNoNameMap();

        $sr_no = $start + 1;
        $data = [];

        $nameMap = $this->modelfaculty->getRiseNoNameMap();
        $roleMap = $this->modelrole->getRoleIdNameMap();

        foreach ($rows as $row) {

            /* =====================
             * ACTION BUTTONS (USING HELPER)
             * ===================== */
            $buttons = '';

            // EDIT
            if (hasPermission('updateFaculty')) {

                if ($row['is_deleted'] == 1) {

                    // Disabled Edit button
                    $buttons .= '<button class="btn btn-icon btn-sm btn-secondary rounded-pill disabled"
                            data-bs-toggle="tooltip"
                            data-bs-custom-class="tooltip-secondary"
                            title="Faculty is deleted">
                            <i class="ri-pencil-fill"></i>
                         </button> ';
                } else {

                    $buttons .= actionHrefButton('Edit', base_url('faculty/edit-faculty/' . $row['faculty_registration_id']));
                }
            }

            // DELETE / REVERT
            if (hasPermission('deleteFaculty')) {

                // DELETE
                if ($row['is_deleted'] == 0 || $row['is_deleted'] == 2) {
                    $buttons .= actionButton('Delete', ['id' => $row['faculty_registration_id'], 'name' => $nameMap[$row['faculty_rise_no']] ?? '']);
                }

                // REVERT
                if ($row['is_deleted'] == 1) {
                    $buttons .= actionButton('Revert', ['id' => $row['faculty_registration_id'], 'name' => $nameMap[$row['faculty_rise_no']] ?? '']);
                }
            }

            /* =====================
             * FACULTY NAME + ROLE
             * ===================== */
            $facultyName = esc($nameMap[$row['faculty_rise_no']] ?? '');
            $facultyRole = esc($roleMap[$row['faculty_role_id']] ?? '');

            $nameWithRole = '<div class="text-center">' . $facultyName .
                    '<div class="small text-muted mt-1">
                        <span class="badge bg-info-transparent px-3 py-2 fw-semibold" style="font-size:0.8rem">
                            ' . $facultyRole . '
                    </div>
                </div>';

            /* =====================
             * ADDED BY
             * ===================== */
            $addedBy = '';
            if (!empty($row['added_by']) && !empty($row['added_at'])) {
                $addedBy = activityBadge(
                        'success',
                        $nameMap[$row['added_by']] ?? '',
                        $row['added_at']
                );
            }

            /* =====================
             * UPDATED BY
             * ===================== */
            $updatedBy = '';
            if (!empty($row['updated_by']) && !empty($row['updated_at'])) {
                $updatedBy = activityBadge(
                        'primary',
                        $nameMap[$row['updated_by']] ?? '',
                        $row['updated_at']
                );
            }

            /* =====================
             * GENDER ICON
             * ===================== */
            $genderIcon = '';

            if (!empty($row['faculty_gender'])) {

                $gender = strtolower($row['faculty_gender']);

                if ($gender === 'male') {
                    $genderIcon = '<img src="https://img.icons8.com/color/52/user-male-circle--v1.png" title="Male">';
                
                } elseif ($gender === 'female') {
                    $genderIcon = '<img src="https://img.icons8.com/color/52/user-female-circle--v1.png" title="Female">';
                    
                } elseif ($gender === 'transgender') {

                    $genderIcon = '<img src="https://img.icons8.com/color/52/gender-neutral-user.png" title="Transgender">';
                }
            }


            /* =====================
             * DELETE / REVERT REMARK
             * ===================== */
            $remark = '';
            if ($row['is_deleted'] == 1 && !empty($row['deleted_by']) && !empty($row['deleted_at'])) {

                $remark = activityBadge(
                        'danger',
                        $nameMap[$row['deleted_by']] ?? '',
                        $row['deleted_at']
                );
            } elseif ($row['is_deleted'] == 2 && !empty($row['deleted_by']) && !empty($row['deleted_at'])) {

                $remark = activityBadge(
                        'warning',
                        $nameMap[$row['deleted_by']] ?? '',
                        $row['deleted_at']
                );
            }

            /* =====================
             * FINAL ROW
             * ===================== */
            $data[] = [
                $sr_no++,
                $buttons,
                $row['faculty_rise_no'],
//              esc($nameMap[$row['faculty_rise_no']] ?? ''),
                $nameWithRole,
                '<div class="text-center">' . $genderIcon . '</div>',
                esc($row['faculty_contact_number']),
                $addedBy,
                $updatedBy,
                $remark
            ];
        }

        return $this->response->setJSON([
                    'draw' => intval($draw),
                    'recordsTotal' => $recordsTotal,
                    'recordsFiltered' => $recordsFiltered,
                    'data' => $data,
                    'csrfHash' => csrf_hash()
        ]);
    }

    //form view(table)  open  
    public function edit_faculty($faculty_id) {
        if ($faculty_id == 1) {
            return redirect()->to('faculty/fetch-faculty');
        }

        $faculty = $this->modelfaculty->getFacultyById($faculty_id);

        if (!$faculty) {
            return redirect()->to('faculty/fetch-faculty');
        }
        $data['roles'] = $this->modelrole->getRoles();
        $data['faculty'] = $faculty;
        $data['jspath'] = 'faculty/edit-faculty';
        return render_page('faculty/edit-faculty', $data);
    }

    //when save button click on edit faculty
    public function update_faculty() {
        if ($this->request->getMethod() !== 'post') {
            return;
        }

        $facultyId = $this->request->getPost('faculty_id');

        if (!$facultyId) {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => ['general' => 'Invalid Faculty ID'],
                        'csrfHash' => csrf_hash()
            ]);
        }

        // Block super admin
        if ($facultyId == 1) {
            return $this->response->setJSON([
                        'status' => 'invalid',
                        'errors' => ['general' => 'Invalid Faculty ID'],
                        'csrfHash' => csrf_hash()
            ]);
        }
        //Existence check
        $faculty = $this->modelfaculty->getFacultyById($facultyId);
        if (!$faculty) {
            return $this->response->setJSON([
                        'status' => 'invalid',
                        'csrfHash' => csrf_hash()
            ]);
        }

        $updateData = [
            'faculty_role_id' => clean_number($this->request->getPost('edit_faculty_role_id')),
            'faculty_gender' => clean_name($this->request->getPost('edit_faculty_gender')),
            'faculty_first_name' => clean_name($this->request->getPost('edit_faculty_first_name')),
            'faculty_middle_name' => clean_name($this->request->getPost('edit_faculty_middle_name')),
            'faculty_last_name' => clean_name($this->request->getPost('edit_faculty_last_name')),
            'faculty_contact_number' => clean_number($this->request->getPost('edit_faculty_contact_number')),
            'faculty_email_id' => clean_email($this->request->getPost('edit_faculty_email_id')),
            'faculty_aadhar_number' => clean_number($this->request->getPost('edit_faculty_aadhar_number')),
            'faculty_pan_number' => clean_name($this->request->getPost('edit_faculty_pan_number')),
            'faculty_status' => clean_number($this->request->getPost('edit_faculty_status_id')),
            'updated_by' => session('rise_no'),
        ];

        $this->modelfaculty->setValidationRules(
                $this->modelfaculty->rulesForUpdate($facultyId)
        );

        if (!$this->modelfaculty->update($facultyId, $updateData)) {
            return $this->response->setJSON([
                        'status' => 'error',
                        'errors' => $this->modelfaculty->errors(),
                        'csrfHash' => csrf_hash()
            ]);
        }

        $fullName = $updateData['faculty_first_name'] . ' ' .
                $updateData['faculty_last_name'];

        return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Faculty ' . $fullName . ' updated successfully',
                    'csrfHash' => csrf_hash()
        ]);
    }

    public function delete_faculty() {
        $faculty_id = $this->request->getPost('faculty_registration_id');

        $delete_data = [
            'is_deleted' => 1,
            'deleted_by' => current_user()
        ];

        if ($this->modelfaculty->update($faculty_id, $delete_data)) {
            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function revert_faculty() {
        $faculty_id = $this->request->getPost('faculty_registration_id');

        $revert_data = [
            'is_deleted' => 2,
            'deleted_by' => current_user()
        ];

        if ($this->modelfaculty->update($faculty_id, $revert_data)) {
            return $this->response->setJSON([
                        'csrfHash' => csrf_hash()
            ]);
        }
    }
    
    public function updatePassword()
{
    // must be logged in
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }

    // only for first login
    if (session()->get('is_first_login') != 1) {
        return redirect()->to('/dashboard');
    }

    $newPassword     = $this->request->getPost('new_password');
    $confirmPassword = $this->request->getPost('confirm_password');

    if ($newPassword !== $confirmPassword) {
        return redirect()->back()->with('error', 'Passwords do not match!');
    }

    $facultyId = session()->get('registration_id');

    $this->modelfacultyregistration->update($facultyId, [
        'faculty_password' => password_hash($newPassword, PASSWORD_DEFAULT),
        'is_first_login'   => 0
    ]);

    // unlock dashboard
    session()->set('is_first_login', 0);

    return redirect()->to('/dashboard')->with('success', 'Password updated successfully');
}

}
