<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = json_decode(file_get_contents(database_path('json/comments.json')), true);

        foreach ($comments as $comment) {
            Comment::create(
                [
                    'news_id' => $comment['news_id'],
                    'reviewer_id' => $comment['reviewer_id'],
                    'message' => $comment['message'],
                ]
            );
        }
    }
}
