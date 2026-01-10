<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddFacultyType extends Seeder {

    public function run() {
        $data = [
            [
                'faculty_type_id' => 1,
                'faculty_type_name' => 'Teaching',
            ],
            [
                'faculty_type_id' => 2,
                'faculty_type_name' => 'Non-Teaching',
            ],
        ];
        // Insert multiple rows
        $this->db->table('faculty_type')->ignore()->insertBatch($data);
    }
}
