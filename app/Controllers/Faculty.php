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
                'faculty_first_name' => clean_name($this->request->getVar('faculty_first_name')),
                'faculty_middle_name' => clean_name($this->request->getVar('faculty_middle_name')),
                'faculty_last_name' => clean_name($this->request->getVar('faculty_last_name')),
                'faculty_mobile_number' => clean_number($this->request->getVar('faculty_mobile_number')),
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

        foreach ($rows as $row) {

            /* =====================
             * ADDED BY
             * ===================== */
            if (!empty($row['added_by']) && !empty($row['added_at'])) {
                $addedBy = '
            <div class="text-center">
                <span class="badge bg-success-transparent px-3 py-2 fw-semibold" style="font-size:0.75rem">
                    <i class="ri-user-add-line me-1"></i>
                    ' . ($nameMap[$row['added_by']] ?? '') . '
                </span>
                <div class="small text-muted mt-1">
                    <i class="ri-time-line me-1"></i>
                    ' . date('d M Y, h:i A', strtotime($row['added_at'])) . '
                </div>
            </div>';
            } else {
                $addedBy = '';
            }

            /* =====================
             * UPDATED BY
             * ===================== */
            if (!empty($row['updated_by']) && !empty($row['updated_at'])) {
                $updatedBy = '
            <div class="text-center">
                <span class="badge bg-primary-transparent px-3 py-2 fw-semibold" style="font-size:0.75rem">
                    <i class="ri-edit-2-line me-1"></i>
                    ' . ($nameMap[$row['updated_by']] ?? '') . '
                </span>
                <div class="small text-muted mt-1">
                    <i class="ri-time-line me-1"></i>
                    ' . date('d M Y, h:i A', strtotime($row['updated_at'])) . '
                </div>
            </div>';
            } else {
                $updatedBy = '';
            }

            /* =====================
             * DELETED / REVERTED
             * ===================== */
            if ($row['is_deleted'] == 1 && !empty($row['updated_by'])) {
                $remark = '
            <div class="text-center">
                <span class="badge bg-danger-transparent px-3 py-2 fw-semibold" style="font-size:0.75rem">
                    <i class="ri-delete-bin-6-line me-1"></i>
                    Deleted by ' . ($nameMap[$row['updated_by']] ?? '') . '
                </span>
                <div class="small text-muted mt-1">
                    <i class="ri-time-line me-1"></i>
                    ' . date('d M Y, h:i A', strtotime($row['updated_at'])) . '
                </div>
            </div>';
            } elseif ($row['is_deleted'] == 2 && !empty($row['updated_by'])) {
                $remark = '
            <div class="text-center">
                <span class="badge bg-warning-transparent px-3 py-2 fw-semibold" style="font-size:0.75rem">
                    <i class="ri-arrow-go-back-line me-1"></i>
                    Reverted by ' . ($nameMap[$row['updated_by']] ?? '') . '
                </span>
                <div class="small text-muted mt-1">
                    <i class="ri-time-line me-1"></i>
                    ' . date('d M Y, h:i A', strtotime($row['updated_at'])) . '
                </div>
            </div>';
            } else {
                $remark = '';
            }

            /* =====================
             * ACTION BUTTONS
             * ===================== */
            $buttons = '';

            // EDIT
            if (hasPermission('updateFaculty')) {
                if ($row['is_deleted'] == 1) {
                    $buttons .= '
                <a href="javascript:void(0)"
                   class="btn btn-icon btn-sm btn-secondary rounded-pill disabled"
                   data-bs-toggle="tooltip"
                   data-bs-custom-class="tooltip-secondary"
                   title="Faculty is deleted">
                    <i class="ri-pencil-fill"></i>
                </a>';
                } else {
                    $buttons .= '
                <a href="' . base_url('faculty/edit-faculty/' . $row['faculty_registration_id']) . '"
                   class="btn btn-icon btn-sm btn-secondary rounded-pill"
                   data-bs-toggle="tooltip"
                   data-bs-custom-class="tooltip-secondary"
                   title="Edit">
                    <i class="ri-pencil-fill"></i>
                </a>';
                }
            }

            // DELETE / REVERT
            if (hasPermission('deleteFaculty')) {

                if ($row['is_deleted'] == 0 || $row['is_deleted'] == 2) {
                    $buttons .= '
                <button class="btn btn-icon btn-sm btn-danger rounded-pill delete"
                        data-id="' . $row['faculty_registration_id'] . '"
                        data-name="' . ($nameMap[$row['faculty_rise_no']] ?? '') . '"
                        data-bs-toggle="tooltip"
                        data-bs-custom-class="tooltip-danger"
                        title="Delete">
                    <i class="ri-delete-bin-fill"></i>
                </button>';
                }

                if ($row['is_deleted'] == 1) {
                    $buttons .= '
                <button class="btn btn-icon btn-sm btn-warning rounded-pill revert"
                        data-id="' . $row['faculty_registration_id'] . '"
                        data-name="' . ($nameMap[$row['faculty_rise_no']] ?? '') . '"
                        data-bs-toggle="tooltip"
                        data-bs-custom-class="tooltip-warning"
                        title="Revert">
                    <i class="ri-arrow-go-back-fill"></i>
                </button>';
                }
            }

            /* =====================
             * FINAL ROW
             * ===================== */
            $data[] = [
                $sr_no++,
                $buttons,
                $row['faculty_rise_no'],
                $nameMap[$row['faculty_rise_no']] ?? '',
                $row['faculty_mobile_number'],
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
            'faculty_first_name' => clean_name($this->request->getPost('edit_faculty_first_name')),
            'faculty_middle_name' => clean_name($this->request->getPost('edit_faculty_middle_name')),
            'faculty_last_name' => clean_name($this->request->getPost('edit_faculty_last_name')),
            'faculty_mobile_number' => clean_number($this->request->getPost('edit_faculty_mobile_number')),
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
        if ($this->request->getMethod() == 'post') {

            $facultyId = $this->request->getPost('faculty_registration_id');

            if ($this->modelfaculty->update($facultyId, [
                        'is_deleted' => 1,
                        'updated_by' => session('rise_no')
                    ])) {
                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }

    public function revert_faculty() {
        if ($this->request->getMethod() == 'post') {
            $facultyId = $this->request->getPost('faculty_registration_id');

            if ($this->modelfaculty->update($facultyId, ['is_deleted' => 2])) {

                return $this->response->setJSON([
                            'csrfHash' => csrf_hash()
                ]);
            }
        } else {
            return render_page('error_page/error404');
        }
    }
}
