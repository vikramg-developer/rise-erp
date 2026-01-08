<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCascadeRelationTable extends Migration {

    protected $DBGroup = 'default';

    public function up() {

        // feedback_master → subject_type_id
        add_fk(
                $this->db,
                'feedback_master',
                'subject_type_id',
                'subject_type',
                'subject_type_id'
        );
        // feedback_master → semester_id
        add_fk(
                $this->db,
                'feedback_master',
                'semester_id',
                'semester',
                'semester_id'
        );
        // feedback_master → semester_part_id
        add_fk(
                $this->db,
                'feedback_master',
                'semester_part_id',
                'semester_part',
                'semester_part_id'
        );
        // feedback_master → academic_year
        add_fk(
                $this->db,
                'feedback_master',
                'academic_year_id',
                'academic_year',
                'academic_year_id'
        );
    }

    public function down() {
        drop_fk($this->db, 'feedback_master', 'subject_type_id');
        drop_fk($this->db, 'feedback_master', 'semester_id');
        drop_fk($this->db, 'feedback_master', 'semester_part_id');
        drop_fk($this->db, 'feedback_master', 'academic_year_id');
    }
}
