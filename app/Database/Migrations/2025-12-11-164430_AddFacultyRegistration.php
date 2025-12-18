<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddFacultyRegistration extends Migration
{
    public function up()
    {
        $fields = [

            'faculty_registration_id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],

            'faculty_rise_no' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'role_id' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],

            'faculty_first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'faculty_middle_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'faculty_last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'faculty_mobile_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],

            'faculty_email_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],

            'faculty_aadhar_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],

            'faculty_pan_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],

            'faculty_password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],

            'added_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],

            'added_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],

            'updated_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],

            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],

            'is_deleted' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
            ],
        ];

        $this->forge->addField($fields);

        // Primary Key
        $this->forge->addKey('faculty_registration_id', true);

        $this->forge->addUniqueKey('faculty_email_id');
        $this->forge->addUniqueKey('faculty_mobile_number');
        $this->forge->addUniqueKey('faculty_aadhar_number');
        $this->forge->addUniqueKey('faculty_pan_number');

        $this->forge->createTable('faculty_registration');
    }

    public function down()
    {
        $this->forge->dropTable('faculty_registration');
    }
}
