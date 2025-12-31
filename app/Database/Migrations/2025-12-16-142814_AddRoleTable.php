<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use CodeIgniter\Database\RawSql;

class AddRoleTable extends Migration
{
    public function up()
    {
        $fields = [
            'role_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'role_name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'permissions' => [
                'type' => 'text',
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
        $this->forge->addPrimaryKey('role_id');
        $this->forge->addUniqueKey('role_name');
        $this->forge->createTable('role');
    }

    public function down()
    {
        $this->forge->dropTable('role');
    }
}