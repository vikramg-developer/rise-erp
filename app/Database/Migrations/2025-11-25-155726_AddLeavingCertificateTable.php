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
            'student_name'=>[
                'type'=>'VARCHAR',
                'constraint'=>500,
            ],           
           
           
            'is_deleted'=>[
                'type'=>'TINYINT',
                'constraint'=>1,
            ],
            'added_by'=>[
                'type'=>'VARCHAR',
                'constraint'=>200,
            ],
            'added_date'=>[
                'type'=>'TIMESTAMP',
                'null'=>false,
                'default'=>new Rawsql('CURRENT_TIMESTAMP'),
                
            ],
            'updated_by'=>[
                'type'=>'VARCHAR',
                'constraint'=>200,
            ],
            'updated_date'=>[
                'type'=>'TIMESTAMP',
                'null'       => false,
                'default'=>new Rawsql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
                
            ],
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
