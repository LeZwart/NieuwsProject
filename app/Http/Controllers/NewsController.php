<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $newsposts = News::all();

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

    // TODO: Implement deletion of news posts
    public function delete($id)
    {
        News::destroy($id);

        return redirect()->route('news.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',

        ]);



        // return redirect()->route('news.index');
    }
}
