<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddFeedbackMasterTable extends Migration {

    public function up() {
        $fields = [
            'feedback_master_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'feedback_name' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
            ],
            'subject_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'semester_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'semester_part_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'academic_year_id' => [
                'type' => 'INT',
                'constraint' => 11,
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
        $this->forge->addPrimaryKey('feedback_master_id');
        $this->forge->createTable('feedback_master');
    }

    public function down() {
        $this->forge->dropTable('feedback_master');
    }
}
