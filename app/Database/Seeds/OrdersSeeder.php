<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'property_id' => 1,
                'client_message' => 'Bonjour, je souhaite visiter ce bien ce samedi.',
                'agent_message' => 'Bonjour, c’est possible à 14h.',
                'status' => 'accepted',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'property_id' => 2,
                'client_message' => 'Est-ce que la maison est toujours disponible ?',
                'agent_message' => null,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 3,
                'property_id' => 3,
                'client_message' => 'Je voudrais négocier le prix.',
                'agent_message' => 'Désolé, le prix est ferme.',
                'status' => 'rejected',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'property_id' => 4,
                'client_message' => 'Pouvez-vous m’envoyer plus de photos du studio ?',
                'agent_message' => 'Bien sûr, je vous envoie les photos aujourd’hui.',
                'status' => 'accepted',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('orders')->insertBatch($data);
    }
}
