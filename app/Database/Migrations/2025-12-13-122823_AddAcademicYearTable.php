<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use CodeIgniter\Database\RawSql;

class AddAcademicYearTable extends Migration {

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
                'null' => false
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'null' => false,
                'default' => new Rawsql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ]
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('academic_year_id');
        $this->forge->createTable('academic_year');
    }

    public function down() {
        $this->forge->dropTable('academic_year');
    }
}
