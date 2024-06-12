<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
Use App\Models\News;
Use App\Models\Category;
Use App\Models\Tag;
Use App\Models\User;

class StatController extends Controller
{
    public function index()
    {
        // Global stats
        $total_posts = News::count();
        $total_comments = Comment::count();
        $total_categories = Category::count();
        $total_tags = Tag::count();
        $total_users = User::count();

        return view('stats', compact('total_posts', 'total_comments', 'total_categories', 'total_tags', 'total_users'));
    }
}
