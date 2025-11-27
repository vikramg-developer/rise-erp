<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddGroupsTable extends Migration
{
    public function up()
    {
        $fields = [
            'group_id' => [
                'type' => 'int',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'group_name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'permission' => [
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
        $this->forge->addPrimaryKey('group_id');
        
        $this->forge->createTable('groups');
    }

    public function down()
    {
        $this->forge->dropTable('groups');
    }
}
