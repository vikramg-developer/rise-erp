<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddCasteCategory extends Seeder
{
    public function run()
    {
      $data = [
            ['caste_category_id' => 1,  'caste_category_name' => 'OPEN'],
            ['caste_category_id' => 2,  'caste_category_name' => 'OBC'],
            ['caste_category_id' => 3,  'caste_category_name' => 'VJ-A'],
            ['caste_category_id' => 4,  'caste_category_name' => 'NT(B)'],
            ['caste_category_id' => 5,  'caste_category_name' => 'NT(C)'],
            ['caste_category_id' => 6,  'caste_category_name' => 'NT(D)'],
            ['caste_category_id' => 7,  'caste_category_name' => 'SC'],
            ['caste_category_id' => 8,  'caste_category_name' => 'ST'],
            ['caste_category_id' => 9,  'caste_category_name' => 'SBC'],
            ['caste_category_id' => 10, 'caste_category_name' => 'EWS'],
            ['caste_category_id' => 11, 'caste_category_name' => 'SEBC'],
            
        ];

        // Insert multiple rows
        $this->db->table('caste_category')->ignore()->insertBatch($data);
    }
}
