<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PropertiesSeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'title' => 'Appartement moderne au centre-ville',
                'description' => 'Appartement spacieux avec 2 chambres, cuisine équipée et balcon.',
                'price' => 120000.00,
                'transaction_type' => 'vente',
                'type_id' => 1,
                'surface' => 85,
                'rooms' => 4,
                'bedrooms' => 2,
                'bathrooms' => 1,
                'latitude' => 33.589886,
                'longitude' => -7.603869,
                'city' => 'Rabat',
                'address' => 'Rabat, Maroc',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Maison familiale avec jardin',
                'description' => 'Grande maison avec 3 chambres, salon, garage et jardin.',
                'price' => 2500.00,
                'transaction_type' => 'location',
                'type_id' => 2,
                'surface' => 150,
                'rooms' => 6,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'latitude' => 33.574825,
                'longitude' => -7.61135,
                'city' => 'Rabat',
                'address' => 'Rabat, Maroc',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Villa de luxe en bord de mer',
                'description' => 'Villa avec piscine, 4 chambres et vue sur l’océan.',
                'price' => 750000.00,
                'transaction_type' => 'vente',
                'type_id' => 3,
                'surface' => 320,
                'rooms' => 8,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'latitude' => 33.590112,
                'longitude' => -7.620543,
                'city' => 'Casablanca',
                'address' => 'Casablanca, Maroc',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Studio cosy pour étudiant',
                'description' => 'Petit studio proche de l’université, entièrement meublé.',
                'price' => 500.00,
                'transaction_type' => 'location',
                'type_id' => 4,
                'surface' => 35,
                'rooms' => 1,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'latitude' => 33.581234,
                'longitude' => -7.593456,
                'city' => 'Casablanca',
                'address' => 'Casablanca, Maroc',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('properties')->insertBatch($data);
    }
}
