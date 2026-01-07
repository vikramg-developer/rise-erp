<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddTicketTable extends Migration {
   protected $DBGroup = 'default'; 
    public function up() {
        $fields = [
            'ticket_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'college_name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'category_id' => [
                'type' => 'int',
                'null' => false,
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
                'null' => false,
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => '11',
                'null' => false,
            ],
            'contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
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
        $this->forge->addPrimaryKey('ticket_id');
        $this->forge->createTable('ticket');
    }

    public function down() {
        $this->forge->dropTable('ticket');
    }
}
