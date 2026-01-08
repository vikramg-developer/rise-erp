<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddLeavingCertificateTable extends Migration {
   protected $DBGroup = 'default'; 
    public function up() {
        $fields = [
            'leaving_certificate_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'leaving_certificate_no' => [
                'type' => 'int',
            ],
            'yearwise_student_data_id' => [
                'type' => 'int',
            ],
            'examination' => [
                'type' => 'varchar',
                'constraint' => 150,
            ],
            'exam_period' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'date_of_leaving' => [
                'type' => 'date',
                'null' => false
            ],
            'is_duplicate' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ],
            'is_cancelled' => [
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
                'default' => new Rawsql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ]
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('leaving_certificate_id');
        $this->forge->addUniqueKey('leaving_certificate_no');
        $this->forge->createTable('leaving_certificate');
    }

    public function down() {
        $this->forge->dropTable('leaving_certificate');
    }
}
