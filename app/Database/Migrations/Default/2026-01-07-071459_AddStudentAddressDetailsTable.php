<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddStudentAddressDetailsTable extends Migration {
   protected $DBGroup = 'default'; 
    public function up() {
        $fields = [
            'student_address_details_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'student_registration_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'student_permanant_address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'student_permanant_country' => [
                'type' => 'INT',
                'null' => false,
            ],
            'student_permanant_pincode' => [
                'type' => 'INT',
                'null' => false,
            ],
            'student_permanant_state_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'student_permanant_district_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'student_permanant_taluka_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            
            'student_correspondence_address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'student_correspondence_country' => [
                'type' => 'INT',
                'null' => false,
            ],
            'student_correspondence_pincode' => [
                'type' => 'INT',
                'null' => false,
            ],
            'student_correspondence_state_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'student_correspondence_district_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'student_correspondence_taluka_id' => [
                'type' => 'INT',
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
        $this->forge->addPrimaryKey('student_address_details_id');
        $this->forge->createTable('student_address_details');
    }

    public function down() {
        $this->forge->dropTable('student_address_details');
    }
}
