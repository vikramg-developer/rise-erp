<?php //

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class StudentPersonalInfo extends Migration {

    public function up() {
        $fields = [
            'student_personal_info_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'student_registration_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
            ],
            'student_prn_no' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'student_abc_id' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'student_general_register_no' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'student_contact_no' => [
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
                'type' => new RawSql("ENUM('male','female','transgender')"),
                'null' => true,
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
            'student_birthplace' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => false,
            ],
            'student_bloodgroup_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'student_age' => [
                'type' => 'INT',
                'null' => false,
            ],
            'student_category_id' => [
                'type' => 'INT',
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
        $this->forge->addPrimaryKey('student_personal_info_id');
        $this->forge->addUniqueKey('student_contact_no');
        $this->forge->addUniqueKey('student_registration_id');
        $this->forge->addUniqueKey('student_prn_no');
        $this->forge->addUniqueKey('student_abc_id');
        $this->forge->createTable('student_personal_info');
    }

    public function down() {
        $this->forge->dropTable('student_personal_info');
    }
}
