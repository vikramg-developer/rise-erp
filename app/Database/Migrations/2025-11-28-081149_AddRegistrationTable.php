<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;
class AddRegistrationTable extends Migration
{
    public function up()
    {
    $fields = [
            'registration_id' => [
                'type' => 'int',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'first_name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'middle_name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'last_name' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
            'prn_no' => [
                'type' => 'bigint',
                'constraint' => '50',
                'null' => false,
            ],
            'mobile_no' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false,
            ],
            'aadhar_no' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false,
            ],
            'course_id' => [
                'type' => 'int',
                'constraint' => '10',
                'null' => false,
            ],
            'year_id' => [
                'type' => 'int',
                'constraint' => '10',
                'null' => false,
            ],
            'academic_year' => [
                'type' => 'varchar',
                'constraint' => '10',
                'null' => false,
            ],
            'admission_year' => [
                'type' => 'varchar',
                'constraint' => '10',
                'null' => false,
            ],
            'date_of_birth' => [
                'type' => 'date',
                'null' => false,
            ],
           'gender' => [
                'type' => 'varchar',
                'constraint' => '20',
                'null' => false,
            ],
           'email' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false,
            ],
           'password' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false,
            ],
           'photo' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
           'sign' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => false,
            ],
           'is_approved' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ],
           'is_confirmed' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ],
           'personal_details' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ],
           'parent_details' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ],
           'address_details' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ],
           'bank_details' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ],
           'education_details' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ],
           
            'added_by' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'added_at' => [
                'type'=>'TIMESTAMP',
                'null'=>false,
                'default'=>new Rawsql('CURRENT_TIMESTAMP'),
            ],
            'updated_by'=> [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => false
            ],
            'updated_at' =>[
                'type'=>'TIMESTAMP',
                'null'       => false,
                'default'=>new Rawsql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
            'is_deleted' => [
                'type' => 'tinyint',
                'constraint' => '1'
            ]
        ];
        
        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('registration_id');
        
        $this->forge->createTable('registration');    
        
    }

    public function down()
    {
      $this->forge->dropTable('registration');
    }
}
