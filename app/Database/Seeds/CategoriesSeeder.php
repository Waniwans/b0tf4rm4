<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'Kesehatan Buah', 'slug' => 'kesehatan-buah'],
            ['id' => 2, 'name' => 'pencegahan', 'slug' => 'pencegahan'],
        ];
        $this->db->table('categories')->insertBatch($data);
    }
}

