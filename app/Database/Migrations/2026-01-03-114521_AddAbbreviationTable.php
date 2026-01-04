<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddAbbreviationTable extends Migration {

    public function up() {
        $fields = [
            'abbreviation_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => true,
            ],
            'abbreviation_name' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'is_active' => [
                'type' => 'tinyint',
                'constraint' => 1,
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
        $this->forge->addPrimaryKey('abbreviation_id');
        $this->forge->addUniqueKey('abbreviation_name');
        $this->forge->createTable('abbreviation');
    }

    public function down() {
        $this->forge->dropTable('abbreviation', true);
    }
}
