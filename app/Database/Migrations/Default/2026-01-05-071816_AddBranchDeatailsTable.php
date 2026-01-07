<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class AddBranchDetailsTable extends Migration {
   protected $DBGroup = 'default'; 
    public function up() {
        $fields = [
            'branch_id' => [
                'type' => 'int',
                'auto_increment' => true,
            ],
            'branch_code' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => false,
            ],
            'branch_name' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => false,
            ],
            'signature_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'branch_email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'branch_contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ],
            'branch_website' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => false,
            ],
            'branch_address' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => false,
            ],
            'branch_region_id' => [
                'type' => 'INT',
                'null' => false,
                'comment' => 'central/western etc from branch_region table',
            ],
            'branch_location_id' => [
                'type' => 'INT',
                'null' => false,
                'comment' => 'urban/rural/Ati-Durgam/Durgam etc from branch_location table',
            ],
            'branch_district_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'branch_taluka_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'branch_pincode_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'branch_type_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'branch_principal_name' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => false,
            ],
            'branch_principal_contact_number' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ],
            'branch_logo' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ],
            'branch_header' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ],
            'branch_udise_number' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false,
            ],
            'branch_otp' => [
                'type' => 'INT',
                'null' => false,
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
        $this->forge->addPrimaryKey('branch_id');
        $this->forge->createTable('branch_details');
    }

    public function down() {
        $this->forge->dropTable('branch_details');
    }
}
