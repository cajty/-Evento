<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('adminDashbord', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('adminDashbord', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
        Category::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}