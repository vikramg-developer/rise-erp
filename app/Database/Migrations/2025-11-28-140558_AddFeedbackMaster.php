<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddFeedbackMaster extends Migration
{
    public function up()
    {
        $fields=[
            'master_id'=>[
                'type'=>'INT',
                'constraint'=>11,
                'auto_increment'=>true
            ],
            'feedback_name'=>[
                'type'=>'VARCHAR',
                'constraint'=>500,
            ],  
            'type_id'=>[
                'type'=>'INT',
                'constraint'=>11,
            ],
            'semester_id'=>[
                'type'=>'INT',
                'constraint'=>11,
            ],
            'part_id'=>[
                'type'=>'INT',
                'constraint'=>11,
            ],
            'academic_year_id'=>[
                'type'=>'INT',
                'constraint'=>11,
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
        $this->forge->addPrimaryKey('master_id');
         
        $this->forge->createTable('feedback_master');
    }

    public function down()
    {
        $this->forge->dropTable('feedback_master');
    }
}
