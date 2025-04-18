<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Category';
        $categories = Category::all();
        return view('dashboard.category.index', compact('title', 'categories'));
    }

    public function create()
    {
        $title = 'Category | Create Category';
        return view('dashboard.category.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/category')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        $title = 'Category | Edit Category';
        return view('dashboard.category.edit', compact('title', 'category'));
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        if($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/category')->with('success', 'Category updated successfully!');
        }

        public function destroy(Category $category)
        {
            Category::destroy($category->id);
            return redirect('/dashboard/category')->with('success', 'Category deleted successfully!');
        }
    }

