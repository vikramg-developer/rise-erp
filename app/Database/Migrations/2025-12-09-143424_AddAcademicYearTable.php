<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddAcademicYearTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'aca_year_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'academic_year' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false
            ],
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1
            ],
            'added_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false
            ],
            'added_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => false,
                'default'=>new Rawsql('CURRENT_TIMESTAMP'),
            ],
            'updated_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false
            ],
            'updated_at' => [
                'type'      => 'TIMESTAMP',
                'null'      => false,
                'default'=>new Rawsql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0
            ]
        ]);

        $this->forge->addKey('aca_year_id', true);
        $this->forge->createTable('academic_year');
    }

    public function down()
    {
        $this->forge->dropTable('academic_year');
    }
}
