<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = json_decode(file_get_contents(database_path('json/Categories.json')), true);
        // dd(file_get_contents(database_path('json/Categories.json')));
        foreach ($categories as $category) {
            Category::create(
                [
                    'title' => $category['title'],
                    'description' => $category['description'],
                ]
            );
        }
    }
}
