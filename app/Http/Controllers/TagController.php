<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tag.index', compact('tags'));
    }

    public function show($id)
    {
        return view('tag.show', ['tag' => Tag::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('tag.edit', ['tag' => Tag::findOrFail($id)]);
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $tag = new Tag();
        $tag->title = $request->title;
        $tag->description = $request->description;
        $tag->save();

        return redirect()->route('tag.show', ['id' => $tag->id]);
    }

    public function update($id)
    {
        $tag = Tag::findOrFail($id);

        $tag->title = request('title');
        $tag->description = request('description');
        $tag->save();

        return redirect()->route('tag.show', ['id' => $tag->id]);

    }

    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
