<?php

namespace App\Database\Seeds;


use CodeIgniter\Database\Seeder;

class AddAbbrivationData extends Seeder
{
     public function run()
    {
        $data = [
            [
                'title'         => 'Dr.',
                'is_active'     => 1,
                'is_deleted' => 0
            ],
            [
                'title'         => 'Mr.',
                'is_active'     => 1,
                'is_deleted' => 0
            ],
            [
                'title'         => 'Mrs.',
                'is_active'     => 1,
                'is_deleted' => 0
            ],
            [
                'title'         => 'Prof.',
                'is_active'     => 1,
                'is_deleted' => 0
            ],
            
            
        ];

        // Insert multiple rows
        $this->db->table('abbrivation')->insertBatch($data);
    }
}
