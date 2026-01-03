<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddBonafideCertificateTable extends Migration {

    public function up() {
        $fields = [
            'bonafide_certificate_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'bonafide_certificate_no' => [
                'type' => 'int',
            ],
            'yearwise_student_data_id' => [
                'type' => 'int',
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
        $this->forge->addPrimaryKey('bonafide_certificate_id');
        $this->forge->addUniqueKey('bonafide_certificate_no');
        $this->forge->addForeignKey(
                'yearwise_student_data_id',
                'yearwise_student_data',
                'yearwise_student_data_id',
                'CASCADE',
                'CASCADE'
        );
        $this->forge->createTable('bonafide_certificate');
    }

    public function down() {
        $this->forge->dropTable('bonafide_certificate');
    }
}
