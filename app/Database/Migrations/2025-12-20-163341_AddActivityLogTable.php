<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddActivityLogTable extends Migration {

    public function up() {
        $fields = [
            'activity_log_id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'table_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'coumn_names' => [
                'type' => 'LONGTEXT',
            ],
            'record_id' => [
                'type' => 'INT',
                'null' => true,
                'comment' => 'Affected record ID',
            ],
            'old_values' => [
                'type' => 'LONGTEXT',
            ],
            'new_values' => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'action' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'comment' => 'create/update/delete/login',
            ],
            'ip_address' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'user_agent' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Request URL',
            ],
            'url' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Request URL',
            ],
            'added_by' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'added_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('activity_log_id');
        $this->forge->createTable('activity_log');
    }

    public function down() {
        $this->forge->dropTable('activity_log');
    }
}
