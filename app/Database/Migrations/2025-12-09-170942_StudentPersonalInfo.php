<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class StudentPersonalInfo extends Migration
{
    public function up()
    {
        $fields = [
            'student_personal_info_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'student_registration_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'student_prn_no' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'student_general_register_no' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'student_mobile_no' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'student_email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'student_gender' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => false,
                'comment' => '1=Male, 2=Female, 3=Transgender'
            ],
            'student_birthdate' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'student_birthplace' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'student_bloodgroup' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'student_religion_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'student_category_id' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => false,
            ],
            'student_caste_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'student_subcaste' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'student_marital_status' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'student_nationality' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'student_minority' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => false,
            ],
            'student_physically_handicap' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
                'comment' => '1=Yes, 2=No'
            ],
            'student_physically_handicap_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'added_by' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'added_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_by' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('student_personal_info_id');
        $this->forge->addUniqueKey('student_mobile_no');
        $this->forge->addUniqueKey('student_registration_id');

        $this->forge->addForeignKey(
            'student_registration_id',
            'student_registration',
            'student_registration_id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('student_personal_info');
    }

    public function down()
    {
        $this->forge->dropTable('student_personal_info');
    }
}
