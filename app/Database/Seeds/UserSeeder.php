<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $users = [];

        $users[] = [
            'firstName' => 'Admin',
            'lastName' => 'Principal',
            'email' => 'admin@immobilier.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'admin',
            'phone_number' => '0652583234',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        for ($i = 1; $i <= 10; $i++) {
            $users[] = [
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => password_hash('client123', PASSWORD_DEFAULT),
                'role' => 'client',
                'phone_number' => '0600000000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        // Insérer dans la table
        $this->db->table('users')->insertBatch($users);
    }
}
