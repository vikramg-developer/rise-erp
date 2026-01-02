<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddSubjectTypeTable extends Migration {

    public function up() {
        $fields = [
            'subject_type_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'subject_type_name' => [
                'type' => 'varchar',
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
        $this->forge->addPrimaryKey('subject_type_id');
        $this->forge->addUniqueKey('subject_type_name');
        $this->forge->createTable('subject_type');
    }

    public function down() {
        $this->forge->dropTable('subject_type');
    }
}