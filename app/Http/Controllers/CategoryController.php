<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function show($id) {


        return view('category.show', ['category' => Category::findOrFail($id)]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('category.show', ['id' => $category->id]);
    }

    public function edit($id)
    {
        return view('category.edit', ['category' => Category::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('category.show', ['id' => $category->id]);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index');
    }
}
