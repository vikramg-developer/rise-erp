<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddFeedbackMaster extends Migration {

    public function up() {
        $fields = [
            'feedback_master_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
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
        /* Subject Type */
        $this->forge->addForeignKey(
                'subject_type_id',
                'subject_type',
                'subject_type_id',
                'CASCADE',
                'CASCADE'
        );
        /* semester */
        $this->forge->addForeignKey(
                'semester_id',
                'semester',
                'semester_id',
                'CASCADE',
                'CASCADE'
        );
        /* semester_part */
        $this->forge->addForeignKey(
                'semester_part_id',
                'semester_part',
                'semester_part_id',
                'CASCADE',
                'CASCADE'
        );
        /* academic_year */
        $this->forge->addForeignKey(
                'academic_year_id',
                'academic_year',
                'academic_year_id',
                'CASCADE',
                'CASCADE'
        );

        $this->forge->createTable('feedback_master');
    }

    public function down() {
        $this->forge->dropTable('feedback_master');
    }
}
