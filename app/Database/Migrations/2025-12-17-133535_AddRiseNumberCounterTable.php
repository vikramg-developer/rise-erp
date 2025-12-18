<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use CodeIgniter\Database\RawSql;

class AddRiseNumberCounterTable extends Migration
{
    public function up()
    {
        $fields = [
            'rise_number_counter_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'user_type_id' => [
                'type' => 'int',
                'null' => false
            ],
            'academic_year_id' => [
                'type' => 'int',
                'null' => false
            ],
            'rise_no' => [
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
                'default' => new Rawsql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ]
        ];
        
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('rise_number_counter_id');
        $this->forge->createTable('rise_number_counter');
    }

    public function down()
    {
        $this->forge->dropTable('rise_number_counter');
    }
}
