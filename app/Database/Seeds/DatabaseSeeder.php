<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(ChatbotQnaSeeder::class);
        $this->call(FeedbackSeeder::class);
    }
}
