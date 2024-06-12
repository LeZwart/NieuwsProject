<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function show($id) {
        $category = Category::findOrFail($id);
        $error = session('error');

        return view('category.show', compact('category', 'error'));

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

        try {
            $category->delete();
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('category.show', ['id' => $category->id])->with('error', 'Categorie kan niet verwijderd worden. Mogelijk zijn er nog nieuwsberichten aan gekoppeld.');
        }

        return redirect()->route('category.index');
    }
}
