<?php

namespace App\Controllers;

use App\Models\ModelFacultyProfile;

class FacultyProfile extends BaseController
{
    public $ModelFacultyProfile;

    public function __construct()
    {
        $this->ModelFacultyProfile = new ModelFacultyProfile();
    }

    public function index()
    {
        return render_page('faculty-profile/index', []);
    }

    

    public function update_personal_info()
    {
        $validation = \Config\Services::validation();

        // SERVER-SIDE VALIDATION
        $rules = [
            'title' => 'required',
            'first_name' => 'required|alpha_space',
            'middle_name' => 'required|alpha_space',
            'last_name' => 'required|alpha_space',

            'dob' => 'required|valid_date',
            'joining' => 'required|valid_date',

            'mobile' => 'required|numeric|exact_length[10]',
            'email' => 'required|valid_email',

            'aadhar' => 'required|numeric|exact_length[12]',

            'specialization' => 'required',
            'membership' => 'permit_empty',

            'btech_guided' => 'required|integer|greater_than_equal_to[0]',
            'btech_awarded' => 'required|integer|greater_than_equal_to[0]',
            'btech_thesis' => 'required|integer|greater_than_equal_to[0]',

            'mtech_guided' => 'required|integer|greater_than_equal_to[0]',
            'mtech_awarded' => 'required|integer|greater_than_equal_to[0]',
            'mtech_thesis' => 'required|integer|greater_than_equal_to[0]',

            'phd_guided' => 'required|integer|greater_than_equal_to[0]',
            'phd_awarded' => 'required|integer|greater_than_equal_to[0]',
            'phd_thesis' => 'required|integer|greater_than_equal_to[0]',

            'google_scholar' => 'required|valid_url',
            'personal_site' => 'required|valid_url',

            'photo' => 'permit_empty|max_size[photo,300]|is_image[photo]',
        ];

        // IF VALIDATION FAILS → SHOW TOP ERROR BOX
        if (!$this->validate($rules)) {
            return render_page('faculty-profile/index', [
                'validation' => $this->validator
            ]);
        }

        // COLLECT FORM DATA
        $data = [
            'title' => $this->request->getVar('title'),
            'first_name' => $this->request->getVar('first_name'),
            'middle_name' => $this->request->getVar('middle_name'),
            'last_name' => $this->request->getVar('last_name'),

            'dob' => $this->request->getVar('dob'),
            'joining' => $this->request->getVar('joining'),

            'mobile' => $this->request->getVar('mobile'),
            'email' => $this->request->getVar('email'),
            'aadhar' => $this->request->getVar('aadhar'),

            'specialization' => $this->request->getVar('specialization'),
            'membership' => $this->request->getVar('membership'),

            'btech_guided' => $this->request->getVar('btech_guided'),
            'btech_awarded' => $this->request->getVar('btech_awarded'),
            'btech_thesis' => $this->request->getVar('btech_thesis'),

            'mtech_guided' => $this->request->getVar('mtech_guided'),
            'mtech_awarded' => $this->request->getVar('mtech_awarded'),
            'mtech_thesis' => $this->request->getVar('mtech_thesis'),

            'phd_guided' => $this->request->getVar('phd_guided'),
            'phd_awarded' => $this->request->getVar('phd_awarded'),
            'phd_thesis' => $this->request->getVar('phd_thesis'),

            'google_scholar' => $this->request->getVar('google_scholar'),
            'personal_site' => $this->request->getVar('personal_site'),
        ];

  
        // SAVE TO DATABASE
        $saved = $this->ModelFacultyProfile->save($data);

        $session = session();

        if ($saved) {
            $session->setTempdata('success', 'Profile updated successfully!', 4);
        } else {
            $session->setTempdata('error', 'Something went wrong. Please try again.', 4);
        }

        return redirect()->to(current_url());
    }
}
