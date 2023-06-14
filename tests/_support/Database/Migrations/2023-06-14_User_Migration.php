<?php

namespace Tests\Support\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    protected $DBGroup = 'tests';

    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'mobile' => [
                'type'       => 'INT',
                'constraint' => '100',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);

        $this->forge->addKey('id');

        $this->forge->createTable('db_users');
    }

    public function down()
    {
        $this->forge->dropTable('db_users');
    }
}
