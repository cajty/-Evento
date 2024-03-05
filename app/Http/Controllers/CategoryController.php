<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(8); 

    return view('adminDashbord', compact('categories'));
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
        return '
            <form action="' . route('categories.update', ['category' => $category->id]) . '" method="POST">
                ' . csrf_field() . '
                <div class="d-flex">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name" class="sr-only">Categories</label>
                        <input type="text" name="name" id="name" class="form-control" value="'.$category->name.'">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
            </form>';
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