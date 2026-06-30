<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Orquestra o seed do módulo de blog.
 * Rode com: php artisan db:seed --class=Database\\Seeders\\BlogSeeder --force
 */
class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BlogCategorySeeder::class,
            BlogTagSeeder::class,
            BlogPostSeeder::class,
        ]);
    }
}
