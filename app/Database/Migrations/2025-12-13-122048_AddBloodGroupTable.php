<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use CodeIgniter\Database\RawSql;

class AddBloodGroupTable extends Migration {

    public function up() {
        $fields = [
            'blood_group_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'blood_group_name' => [
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
        $this->forge->addPrimaryKey('blood_group_id');
         $this->forge->addUniqueKey('blood_group_name');
        $this->forge->createTable('blood_group');
    }

    public function down() {
        $this->forge->dropTable('blood_group');
    }
}
