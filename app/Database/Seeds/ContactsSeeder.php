<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContactsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Mohamed Teljaoui',
                'email' => 'mohamed@example.com',
                'phone_number' => '+212600000001',
                'message' => 'Bonjour, je souhaite avoir plus d’informations sur vos services.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Salma Idrissi',
                'email' => 'salma@example.com',
                'phone_number' => '+212600000002',
                'message' => 'Je veux prendre rendez-vous pour visiter un appartement.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Mehdi El Khatib',
                'email' => 'mehdi@example.com',
                'phone_number' => '+212600000003',
                'message' => 'Pouvez-vous m’envoyer la brochure complète des biens disponibles ?',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Fatima Zahra',
                'email' => 'fatima@example.com',
                'phone_number' => '+212600000004',
                'message' => 'Je voudrais savoir si vous avez des biens à louer dans Casablanca.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('contacts')->insertBatch($data);
    }
}
