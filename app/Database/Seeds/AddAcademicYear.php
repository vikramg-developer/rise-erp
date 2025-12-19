<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddAcademicYear extends Seeder
{
    public function run()
    {
        $data = [];

        // Insert years from 2025-2026 to 2030-2031
        for ($start = 1990; $start <= 2039; $start++) {
            $end = $start + 1;

            $data[] = [
                'academic_year_name' => "{$start}-{$end}",
                'is_active'     => 0,
                'added_by'      => 'admin',
                'added_at'      => date('Y-m-d H:i:s'),
                'is_deleted'    => 0,
            ];
        }

         $this->db->table('academic_year')->ignore()->insertBatch($data);
        
    }
}
