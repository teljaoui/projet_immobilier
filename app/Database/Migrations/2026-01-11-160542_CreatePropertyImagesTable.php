<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePropertyImagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'property_id' => ['type' => 'INT'],
            'image' => ['type' => 'VARCHAR', 'constraint' => 255],
            'is_main' => ['type' => 'TINYINT', 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('property_id', 'properties', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('property_images');
    }

    public function down()
    {
        $this->forge->dropTable('property_images', true);

    }
}
