<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Главный сидер, вызывающий все остальные
 */
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ArticleSeeder::class,
        ]);
    }
}
