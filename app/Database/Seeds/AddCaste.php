<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddCaste extends Seeder
{
    public function run()
    {
        $data=[
            ['caste_name'=>'OPEN'],
            ['caste_name'=>'OBC'],
            ['caste_name'=>'VJ-A'],
        ];
        $this->db->table('Caste')->ignore()->insertBatch($data);
    }
}
