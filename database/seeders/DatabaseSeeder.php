<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            CategoriesSeeder::class,
            TagsSeeder::class,
            NewsSeeder::class,
        ]);

        DB::table('tagsnews')->insert(
            [
                [
                    'tag_id' => 1,
                    'news_id' => 1,
                ],
                [
                    'tag_id' => 2,
                    'news_id' => 1,
                ],
                [
                    'tag_id' => 3,
                    'news_id' => 2,
                ],
                [
                    'tag_id' => 4,
                    'news_id' => 3,
                ],
                [
                    'tag_id' => 5,
                    'news_id' => 4,
                ],
                [
                    'tag_id' => 6,
                    'news_id' => 5,
                ]
            ]
        );
    }
}
