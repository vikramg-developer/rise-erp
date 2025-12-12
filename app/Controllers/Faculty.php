<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FacultyRegistrationModel;

class Faculty extends BaseController
{
    public function index()
    {
        $data['jspath'] = 'faculty/add-faculty';
        return render_page('faculty/index', $data);
    }

    public function add_faculty()
    {
        $model = new FacultyRegistrationModel();

        $input = $this->request->getPost();

        // Step 1: Validate input (CI4 auto validation)
        if (!$model->validate($input)) {

            return redirect()
                ->to(current_url())
                ->withInput()
                ->with('errors', $model->errors());
        }

        // Step 2: Prepare data (without rise number)
        $data = [
            'faculty_first_name'      => $input['first_name'],
            'faculty_middle_name'     => $input['middle_name'],
            'faculty_last_name'       => $input['last_name'],
            'faculty_mobile_number'   => $input['mobile'],
            'faculty_email_id'        => $input['email'],
            'faculty_aadhar_number'   => $input['aadhar'],
            'faculty_pan_number'      => $input['pan'],
            'faculty_password'        => password_hash($input['password'], PASSWORD_BCRYPT),
            'added_by'                => session()->get('user_id') ?? 'SYSTEM',
            'updated_by'              => session()->get('user_id') ?? 'SYSTEM',
        ];

        // Step 3: Insert first → get auto-increment ID
        $id = $model->insert($data);

        if (!$id) {
            return redirect()
                ->to(current_url())
                ->withInput()
                ->with('errors', $model->errors());
        }

        // Step 4: Generate Rise No
        $$riseNo = 'F2026' . str_pad($id, 4, '0', STR_PAD_LEFT);


        // Step 5: Update Rise No
        $model->update($id, ['faculty_rise_no' => $riseNo]);

        // Step 6: Redirect with success
        return redirect() ->to(current_url())->with('success', "Faculty added successfully. Rise No: $riseNo");
    }
}
