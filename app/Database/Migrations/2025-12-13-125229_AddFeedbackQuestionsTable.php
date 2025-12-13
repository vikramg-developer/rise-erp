<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use CodeIgniter\Database\RawSql;

class AddFeedbackQuestionsTable extends Migration {

    public function up() {
        $fields = [
            'feedback_question_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'feedback_master_id' => [
                'type' => 'int',
                'constraint' => '50',
                'null' => false
            ],
            'feedback_question' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'option_1' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'option_2' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'option_3' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'option_4' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'option_5' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'weightage' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'semester_type_id' => [
                'type' => 'int',
                'constraint' => '50',
                'null' => false
            ],
            'semester_part_id' => [
                'type' => 'int',
                'constraint' => '50',
                'null' => false
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
                'null' => false
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'null' => false,
                'default' => new Rawsql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ]
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('feedback_question_id');
        $this->forge->createTable('feedback_questions');
    }

    public function down() {
        $this->forge->dropTable('feedback_questions');
    }
}
