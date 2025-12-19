<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddSemesterPart extends Seeder
{
     public function run()
    {
        $data = [
            [
                'semester_part_name'     => 'Pre',
            ],
            [
                'semester_part_name'         => 'Post',
            ],
        ];

        // Insert multiple rows
        $this->db->table('semester_part')->ignore()->insertBatch($data);
    }
}
