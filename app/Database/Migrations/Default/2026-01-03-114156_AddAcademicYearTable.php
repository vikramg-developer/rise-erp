<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddAcademicYearTable extends Migration {

    protected $DBGroup = 'default';

    public function up() {
        $fields = [
            'academic_year_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'academic_year_name' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'is_current' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ],
            'is_active' => [
                'type' => 'tinyint',
                'constraint' => '1'
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
        $this->forge->addPrimaryKey('academic_year_id');
        $this->forge->addUniqueKey('academic_year_name');
        $this->forge->createTable('academic_year');
    }

    public function down() {
        $this->forge->dropTable('academic_year');
    }
}
