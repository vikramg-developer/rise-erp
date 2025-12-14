<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleTable extends Migration
{
    public function up()
    {
        $fields = [
            'role_id' => [
                'type' => 'int',
                'constraint' => '11',
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
                'type'=>'TIMESTAMP',
                'null'=>false,
                'default'=>new Rawsql('CURRENT_TIMESTAMP'),
            ],
            'updated_by'=> [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'updated_at' =>[
                'type'=>'TIMESTAMP',
                'null'       => false,
                'default'=>new Rawsql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ]
        ];
        
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('role_id');
        
        $this->forge->createTable('role');
    }

    public function down()
    {
        $this->forge->dropTable('role');
    }
}
