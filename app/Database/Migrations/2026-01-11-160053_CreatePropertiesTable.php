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
            'surface' => ['type' => 'INT', 'null' => true],
            'rooms' => ['type' => 'INT', 'null' => true],
            'bedrooms' => ['type' => 'INT', 'null' => true],
            'bathrooms' => ['type' => 'INT', 'null' => true],
            'latitude' => ['type' => 'DECIMAL', 'constraint' => '10,7', 'null' => true],
            'longitude' => ['type' => 'DECIMAL', 'constraint' => '10,7', 'null' => true],
            'address' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],

            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('type_id', 'property_types', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('properties');
    }


    public function down()
    {
        $this->forge->dropTable('properties', true);

    }
}
