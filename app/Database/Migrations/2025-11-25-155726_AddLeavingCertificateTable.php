<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddLeavingCertificateTable extends Migration
{
    public function up()
    {
        $fields=[
            'lc_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true
            ],         
            'ysd_id'=>[
                'type'=>'int',
            ],
            'examination'=>[
                'type'=>'varchar',
                'constraint'=>255,
            ],
            
            'exam_held_in'=>[
                'type'=>'varchar',
                'constraint'=>50,
            ],
            'date_of_leaving'=>[
                'type'=>'date',
                'null'=>false
            ],
            'is_duplicate'=>[
                'type'=>'int',
            ],
            'previous_lc_date'=>[
                'type'=>'int',
            ],
            'added_by' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'added_at' => [
                'type'=>'timestamp',
                'null'=>false,
                'default'=>new Rawsql('CURRENT_TIMESTAMP'),
            ],
            'updated_by'=> [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'updated_at' =>[
                'type'=>'timestamp',
                'null'       => false,
                'default'=>new Rawsql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ]
        ];
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('lc_id');
         
        $this->forge->createTable('leaving_certificate');
    }

    public function down()
    {
        $this->forge->dropTable('leaving_certificate');
    }
}
