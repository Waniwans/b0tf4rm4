<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 6, 'username' => 'admin', 'email' => 'admin@example.com', 'password' => 'admin123', 'role' => 'admin'],
            ['id' => 7, 'username' => 'admin1', 'email' => 'admin1@example.com', 'password' => '$2y$10$RO5Yykr2ly.d447VvGknFeOV6xXYuZM9zEc8fNTCNQUlAFFS0VfAi', 'role' => 'admin'],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}