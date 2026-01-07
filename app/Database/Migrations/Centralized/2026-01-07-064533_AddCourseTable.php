<?php

namespace App\Database\Migrations\Centralized;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddCourseTable extends Migration {
    protected $DBGroup = 'centralized'; // 🔥 FORCE centralized DB

    public function up() {
        $fields = [
            'course_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'course_name' => [
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
        $this->forge->addPrimaryKey('course_id');
        $this->forge->addUniqueKey('course_name');
        $this->forge->createTable('course');
    }

    public function down() {
        $this->forge->dropTable('course');
    }
}
