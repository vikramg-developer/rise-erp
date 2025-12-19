<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddSubjectType extends Seeder
{
    public function run()
    {
        $data=[
            [
               'subject_type_name'=>'Theory' ,
            ],
            [
               'subject_type_name'=>'Practical' ,
            ],
            [
               'subject_type_name'=>'Project' ,
            ],
            [
               'subject_type_name'=>'Seminar' ,
            ],
            [
               'subject_type_name'=>'Tutorial' ,
            ],  
            
        ];
        $this->db->table('subject_type')->ignore()->insertBatch($data);
    }
}
