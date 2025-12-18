<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model {

    protected $validationRules = [
        'login_username' => 'required|exact_length[12]',
        'login_password' => 'required',
    ];
    protected $validationMessages = [
        'login_username' => [
            'required' => 'Rise No is Invalid.',
            'exact_length' => 'Rise No must be exact 12 characters.',
        ],
        'login_password' => [
            'required' => 'Password is Invalid.',
        ],
    ];
}
