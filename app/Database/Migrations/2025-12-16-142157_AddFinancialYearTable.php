<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use CodeIgniter\Database\RawSql;

class AddFinancialYearTable extends Migration
{
    public function up()
    {
        $fields = [
            'financial_year_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'financial_year_name' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
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
                'default' => new Rawsql('NULL ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ]
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('financial_year_id');
        $this->forge->createTable('financial_year');
    }

    public function down()
    {
         $this->forge->dropTable('financial_year');
    }
}
