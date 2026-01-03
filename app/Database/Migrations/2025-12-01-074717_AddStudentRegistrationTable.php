<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class StudentRegistration extends Migration {

    public function up() {
        $fields = [
            'student_registration_id' => [
                'type' => 'int',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'student_first_name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'student_middle_name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'student_last_name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'student_aadhar_number' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false,
            ],
            'student_password' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false,
            ],
            'student_rise_no' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false,
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
        $this->forge->addPrimaryKey('student_registration_id');
        $this->forge->addUniqueKey('student_rise_no');
        $this->forge->createTable('student_registration');
    }

    public function down() {
//      $this->forge->dropTable('student_registration', true);
    }
}
