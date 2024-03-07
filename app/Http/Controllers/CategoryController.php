<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(8)
        ;
        
   

    return view('admin.adminCategories', compact('categories'));
    }

    


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:17'
        ]);
        Category::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('categories.index');
    }

  
    public function edit(Category $category)
    {

        return view('ajax.category', compact('category'));
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