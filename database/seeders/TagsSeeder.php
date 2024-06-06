<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = json_decode(file_get_contents(database_path('json/tags.json')), true);

        foreach ($tags as $tag) {
            Tag::create(
                [
                    'title' => $tag['title'],
                    'description' => $tag['description'],
                ]
            );
        }
    }
}
