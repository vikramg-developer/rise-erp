<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddSemester extends Seeder
{
     public function run()
    {
        $data = [
            [
                'semester_name'     => 'Odd',
                'is_active'     => 1,
            ],
            [
                'semester_name'         => 'Even',
                'is_active'     => 1,
            ],
        ];

        // Insert multiple rows
        $this->db->table('semester')->ignore()->insertBatch($data);
    }
}
