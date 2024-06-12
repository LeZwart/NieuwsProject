<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Tag;

class NewsController extends Controller
{
    public function index()
    {
        $newsposts = News::OrderBy('created_at', 'desc')->get();

        return view('news.index', compact('newsposts'));
    }

    public function show($id)
    {


        return view('news.show', ['newspost' => News::findOrFail($id)]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function edit($id)
    {
        return view('news.edit', ['newspost' => News::findOrFail($id)]);
    }

    public function landing_page()
    {
        $newsposts = News::orderBy('created_at', 'desc')->take(2)->get();
        $total_posts = News::count();
        $total_comments = Comment::count();


        return view('welcome', compact('newsposts', 'total_posts', 'total_comments'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        $newspost = News::findOrFail($id);
        $newspost->title = $data['title'];
        $newspost->description = $data['description'];
        $newspost->category_id = $data['category'];
        $newspost->save();

        // Remove all tags from the news post and attach the new ones
        DB::table('tagsnews')->where('news_id', $newspost->id)->delete();
        if ($request->tags) {
            foreach ($request->tags as $tag) {
                DB::table('tagsnews')->insert(
                    [
                        'tag_id' => $tag,
                        'news_id' => $newspost->id,
                    ]
                );
            }
        }

        return redirect()->route('news.show', ['id' => $newspost->id]);
    }

    public function delete($id)
    {
        $newspost = News::findOrFail($id);
        $comments = Comment::where('news_id', $newspost->id)->get();
        $tagrels = DB::table('tagsnews')->where('news_id', $newspost->id)->get();

        // Delete comments
        foreach ($comments as $comment) {
            $comment->delete();
        }

        // Delete many to many relationship
        foreach ($tagrels as $tag) {
            DB::table('tagsnews')->where('news_id', $newspost->id)->delete();
        }

        // Finally, delete post
        $newspost->delete();
        return redirect()->route('news.index');
    }

    public function store(Request $request)
    {
        // Validate the request
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        // Check if user is authenticated
        if (auth()->check()) {
            // Create a new news post
            $newspost = new News();
            $newspost->title = $data['title'];
            $newspost->description = $data['description'];
            $newspost->category_id = $data['category'];
            $newspost->author_id = auth()->user()->id;
            $newspost->save();



            // Attach tags to the news post
            if ($request->tags) {
                foreach ($request->tags as $tag) {
                    DB::table('tagsnews')->insert(
                        [
                            'tag_id' => $tag,
                            'news_id' => $newspost->id,
                        ]
                    );
                }
            }

        }

        return redirect()->route('news.show', ['id' => $newspost->id]);
    }
}
