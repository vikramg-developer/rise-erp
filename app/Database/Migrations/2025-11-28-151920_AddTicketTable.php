<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddTicketTable extends Migration

{
    public function up()
    {
        $fields = [
            'ticket_id' => [
                'type' => 'int',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'college_name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'category_id' => [
                'type' => 'int',
                'constraint' => '11',
            ],
             'issue_title' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
             'description' => [
                'type' => 'varchar',
                'constraint' => '500',
                'null' => false,
            ],
             'priority' => [
                'type' => 'int',
                'constraint' => '11',
                'null' => false,
            ],
             'email' => [
                'type' => 'varchar',
                'constraint' => '11',
                'null' => false,
            ],
             'mobile' => [
                'type' => 'int',
                'constraint' => '10',
                'null' => false,
            ],
             'file' => [
                'type' => 'varchar',
                'constraint' => '11',
                'null' => false,
            ],
             'status' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
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
        $this->forge->addPrimaryKey('ticket_id');
        
        $this->forge->createTable('ticket');
    }

    public function down()
    {
        $this->forge->dropTable('ticket');
    }
}
