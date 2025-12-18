<?php

namespace App\Database\Seeds;


use CodeIgniter\Database\Seeder;

class AddAbbreviationData extends Seeder
{
     public function run()
    {
        $data = [
            [
                'abbreviation_name'         => 'Dr.',
                'is_active'     => 1,
                'is_deleted' => 0
            ],
            [
                'abbreviation_name'         => 'Mr.',
                'is_active'     => 1,
                'is_deleted' => 0
            ],
            [
                'abbreviation_name'         => 'Mrs.',
                'is_active'     => 1,
                'is_deleted' => 0
            ],
            [
                'abbreviation_name'         => 'Prof.',
                'is_active'     => 1,
                'is_deleted' => 0
            ],
            
            
        ];

        // Insert multiple rows
        $this->db->table('abbreviation')->ignore()->insertBatch($data);
    }
}
