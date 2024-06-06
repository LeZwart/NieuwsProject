<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = json_decode(file_get_contents(database_path('json/news.json')), true);

        foreach ($news as $newsItem) {
            News::create(
                [
                    'title' => $newsItem['title'],
                    'description' => $newsItem['description'],
                    'category_id' => $newsItem['category_id'],
                ]
            );
        }
    }
}
