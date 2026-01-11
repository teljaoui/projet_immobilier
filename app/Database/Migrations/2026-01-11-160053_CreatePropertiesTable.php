<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 150],
            'description' => ['type' => 'TEXT'],
            'price' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'transaction_type' => ['type' => 'ENUM', 'constraint' => ['vente', 'location'], 'default' => 'vente'],
            'type_id' => ['type' => 'INT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('type_id', 'property_types', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('properties');
    }

    public function down()
    {
        //
    }
}
