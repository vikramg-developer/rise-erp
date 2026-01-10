<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddParentDetailsTable extends Migration {

    public function up() {
        $fields = [
            'student_parent_details_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'student_registration_id' => [
                'type' => 'int',
                'null' => true
            ],
            'student_mother_name' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => true
            ],
            'student_father_contact' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => true
            ],
            'student_mother_contact' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => true
            ],
            'student_father_occupation' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => true
            ],
            'student_mother_occupation' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => true
            ],
            'student_family_income' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => true
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
        $this->forge->addPrimaryKey('student_parent_details_id');
        $this->forge->createTable('student_parent_details');
    }

    public function down() {
        $this->forge->dropTable('student_parent_details');
    }
}
