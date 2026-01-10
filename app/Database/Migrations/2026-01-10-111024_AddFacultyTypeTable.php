<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddFacultyTypeTable extends Migration
{
    public function up()
    {
       $fields = [
            'faculty_type_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'faculty_type_name' => [
                'type' => 'varchar',
                'constraint' => '100',
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
        $this->forge->addPrimaryKey('faculty_type_id');
        $this->forge->addUniqueKey('faculty_type_name');
        $this->forge->createTable('faculty_type');
    }

    public function down()
    {
        $this->forge->dropTable('faculty_type');
    }
}
