<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddFacultyRegistrationMaster extends Seeder {

    public function run() {
        $data = [
            'faculty_rise_no' => 'F20250010001',
            'faculty_role_id' => '1',
            'faculty_password' => password_hash('Superadmin@123', PASSWORD_DEFAULT),
            'faculty_first_name' => 'Super',
            'faculty_last_name' => 'Admin',
            'faculty_contact_number' => '9638521047',
            'faculty_email_id' => 'Superadmin@gmail.com',
            'faculty_aadhar_number' => '421805051180',
            'is_first_login' => '1',
        ];
        $this->db->table('faculty_registration')->ignore()->insertBatch($data);
    }
}
