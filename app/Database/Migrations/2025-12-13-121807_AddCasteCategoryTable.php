<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddCasteCategoryTable extends Migration {

    public function up() {
        $fields = [
            'caste_category_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'caste_category_name' => [
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
        $this->forge->addPrimaryKey('caste_category_id');
        $this->forge->addUniqueKey('caste_category_name');
        $this->forge->createTable('caste_category');
    }

    public function down() {
        $this->forge->dropTable('caste_category');
    }
}
