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
}
