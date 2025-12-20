<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use CodeIgniter\Database\RawSql;

class AddActivityLogTable extends Migration
{
    public function up()
    {
       $fields = [
            'activity_log_id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
           'table_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
           'coumn_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
           'record_id' => [
                'type'       => 'INT',
                'null'       => true,
                'comment'    => 'Affected record ID',
            ],
            'rise_no' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'old_value' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'new_value' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
           'action' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
                'comment'    => 'create/update/delete/login',
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'user_agent' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'url' => [
                'type'       => 'TEXT',
                'null'       => true,
                'comment'    => 'Request URL',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => false,
                'default' => date('Y-m-d H:i:s'),
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
                'default' => new Rawsql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ]
        ];
        
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('activity_log_id');
        $this->forge->createTable('activity_log');
    }

    public function down()
    {
         $this->forge->dropTable('activity_log');
    
    }
}
