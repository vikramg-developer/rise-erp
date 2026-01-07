<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddHeadGroupTable extends Migration {

    protected $DBGroup = 'default';

    public function up() {
        $fields = [
            'head_group_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'head_group_name' => [
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
        $this->forge->addPrimaryKey('head_group_id');
        $this->forge->addUniqueKey('head_group_name');
        $this->forge->createTable('head_group');
    }

    public function down() {
        $this->forge->dropTable('head_group');
    }
}
