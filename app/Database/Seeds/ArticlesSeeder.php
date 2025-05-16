<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 2,
                'title' => 'manfaat mengkudu bagi kesehatan superfood tropis yang jarang dilirik',
                'slug' => 'manfaat-mengkudu-bagi-kesehatan-superfood-tropis-yang-jarang-dilirik',
                'content' => '[Konten diisi dari PDF]',
                'pdf_file' => '1747348609_80e4a6fbb6a5b6e5a45a.pdf',
                'category_id' => 1,
                'user_id' => 7,
                'created_at' => '2025-05-15 22:36:49'
            ],
            [
                'id' => 3,
                'title' => '4 cara mencegah tbc yang efektif yang perlu kamu ketahui',
                'slug' => '4-cara-mencegah-tbc-yang-efektif-yang-perlu-kamu-ketahui',
                'content' => 'TBC adalah penyakit menular... penyebarannya.',
                'pdf_file' => '1747352149_9ce9eeb59d4a39e4bc5a.pdf',
                'category_id' => 2,
                'user_id' => 7,
                'created_at' => '2025-05-15 23:35:49'
            ]
        ];
        $this->db->table('articles')->insertBatch($data);
    }
}