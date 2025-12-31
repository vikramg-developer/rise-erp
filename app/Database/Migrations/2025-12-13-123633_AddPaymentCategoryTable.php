<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddPaymentCategoryTable extends Migration {

    public function up() {
        $fields = [
            'payment_category_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'payment_category_name' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'is_active' => [
                'type' => 'int',
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
        $this->forge->addPrimaryKey('payment_category_id');
         $this->forge->addUniqueKey('payment_category_name');
        $this->forge->createTable('payment_category');
    }

    public function down() {
        $this->forge->dropTable('payment_category');
    }
}
