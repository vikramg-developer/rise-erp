<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddReligion extends Seeder
{
    public function run()
    {
        $data = [
            [
                'religion_id'   => 1,
                'religion_name'      => 'Hindu',
            ],
            [
                'religion_id'   => 2,
                'religion_name'      => 'Muslim',
            ],
            [
                'religion_id'   => 3,
                'religion_name'      => 'Christian',
            ],
            [
                'religion_id'   => 4,
                'religion_name'      => 'Sikh',
            ],
            [
                'religion_id'   => 5,
                'religion_name'      => 'Jain',
            ],
            [
                'religion_id'   => 6,
                'religion_name'      => 'Parsi',
            ],
            [
                'religion_id'   => 7,
                'religion_name'      => 'Buddhist',
            ],
            
        ];

        // Insert multiple rows
        $this->db->table('religion')->ignore()->insertBatch($data);
    }
}
