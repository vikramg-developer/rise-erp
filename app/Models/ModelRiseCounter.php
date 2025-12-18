<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRiseCounter extends Model
{
    protected $table = 'rise_number_counter';
    protected $primaryKey = 'rise_number_counter_id';

    protected $allowedFields = [
        'user_type_id',
        'academic_year_id',
        'rise_no'
    ];

    /**
     * Get next sequence number (NO JUMP, TRANSACTION SAFE)
     */
    public function getNextSequence(int $userTypeId, int $academicYearId): int
    {
        // 🔒 Lock row using CI4 inbuilt forUpdate()
        $row = $this->where([
                'user_type_id'      => $userTypeId,
                'academic_year_id'  => $academicYearId
            ])
            ->forUpdate()
            ->first();

        // First entry for this year + user type
        if (!$row) {
            $this->insert([
                'user_type_id'     => $userTypeId,
                'academic_year_id' => $academicYearId,
                'rise_no'          => 1
            ]);
            return 1;
        }

        // Increment safely
        $next = $row['rise_no'] + 1;

        $this->update(
            $row['rise_number_counter_id'],
            ['rise_no' => $next]
        );

        return $next;
    }

    /**
     * Preview next Rise No (NO LOCK, NO INCREMENT)
     */
    public function previewNext(int $userTypeId, int $academicYearId): int
    {
        $row = $this->select('rise_no')
            ->where([
                'user_type_id'     => $userTypeId,
                'academic_year_id' => $academicYearId
            ])
            ->first();

        return $row ? $row['rise_no'] + 1 : 1;
    }
}
    