<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddFeedbackMaster extends Seeder
{
    public function run()
    {
        $data=
        [
            [
                'feedback_name'=>'Consolidated Feedback Analysis Theory',
                'type_id'=>'1',
                'semester_id'=>'1',
                'part_id'=>'1',
                'academic_year_id'=>'2',
                'is_deleted'=>1,
                'updated_by'=>'manasi',
            ],
            [
                'feedback_name'=>'Consolidated Feedback Analysis Practical',
                'type_id'=>'1',
                'semester_id'=>'1',
                'part_id'=>'1',
                'academic_year_id'=>'2',
                'is_deleted'=>1,
                'updated_by'=>'manasi',
            ],
            
            
        ];
        $this->db->table('feedback_master')->insertBatch($data);
    }
}
