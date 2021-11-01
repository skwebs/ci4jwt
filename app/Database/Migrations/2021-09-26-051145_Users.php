<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXX USERS XXXXXXXXXXXXXXXXXXXXXXXX USERS XXXXXXXXXXXXXXXXXXXXX USERS XXXXXXXXXXXXXXXXXXXX USERS XXXXXXXXXXXXX
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'    => ['type' => 'varchar', 'constraint' => 20],
            'email'         => ['type' => 'varchar', 'constraint' => 30],
            'password' => ['type' => 'varchar', 'constraint' => 255],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at'    => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addUniqueKey('email');
        // $this->forge->addForeignKey('role_id', 'roles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        // Rollback users table from database
        $this->forge->dropTable('users');
    }
}
