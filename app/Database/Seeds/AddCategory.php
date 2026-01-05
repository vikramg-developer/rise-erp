<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddCategory extends Seeder
{
    public function run()
    {
       $data=[
           ['categoty_name'=>'Maratha'],
       ];
       $this->db->table('category')->ignore->insertBatch($data);
    }
}
