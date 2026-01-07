<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddFeeReceiptCounterTable extends Migration {
   protected $DBGroup = 'default'; 
    public function up() {
        $fields = [
            'fee_receipt_counter_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'financial_year_id' => [
                'type' => 'int',
                'null' => false
            ],
            'head_group_id' => [
                'type' => 'int',
                'null' => false
            ],
            'receipt_no' => [
                'type' => 'INT',
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
        $this->forge->addPrimaryKey('fee_receipt_counter_id');
        $this->forge->createTable('fee_receipt_counter');
    }

    public function down() {
        $this->forge->dropTable('fee_receipt_counter');
    }
}
