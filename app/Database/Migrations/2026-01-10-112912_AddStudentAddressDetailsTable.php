<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddStudentAddressDetailsTable extends Migration {

    public function up() {
        $fields = [
            'student_address_details_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'student_registration_id' => [
                'type' => 'int',
                'null' => true
            ],
            'student_permanent_address' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => true
            ],
            'student_permanent_pincode' => [
                'type' => 'int',
                'null' => true
            ],
            'student_permanent_locality_id' => [
                'type' => 'int',
                'null' => true
            ],
            'student_correspondence_address' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => true
            ],
            'student_correspondence_pincode' => [
                'type' => 'int',
                'null' => true
            ],
            'student_correspondence_locality_id' => [
                'type' => 'int',
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
        $this->forge->addPrimaryKey('student_address_details_id');
//        $this->forge->addForeignKey('student_registration_id');
        $this->forge->createTable('student_address_details');
    }

    public function down() {
        $this->forge->dropTable('student_address_details');
    }
}
