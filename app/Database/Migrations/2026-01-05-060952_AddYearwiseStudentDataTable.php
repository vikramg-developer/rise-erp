<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddYearwiseStudentDataTable extends Migration {

    public function up() {
        $fields = [
            'yearwise_student_data_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'student_rise_no' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => true
            ],
            'department_id' => [
                'type' => 'int',
                'null' => true,
            ],
            'year_id' => [
                'type' => 'int',
                'null' => true,
            ],
            'academic_year_id' => [
                'type' => 'int',
                'null' => true,
            ],
            'semester_id' => [
                'type' => 'int',
                'null' => true,
            ],
            'roll_nunber' => [
                'type' => 'int',
                'null' => false,
            ],
            'division_id' => [
                'type' => 'int',
                'null' => false,
            ],
            'batch_id' => [
                'type' => 'int',
                'null' => false,
            ],
            'admission_date' => [
                'type' => 'timestamp',
                'null' => true,
            ],
            'added_by' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'added_at' => [
                'type' => 'timestamp',
                'null' => false,
                'default' => new Rawsql('CURRENT_TIMESTAMP'),
            ],
            'updated_by' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
            'deleted_by' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
            'is_deleted' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ]
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('yearwise_student_data_id');
        $this->forge->createTable('yearwise_student_data');
    }

    public function down() {
        $this->forge->dropTable('yearwise_student_data');
    }
}
