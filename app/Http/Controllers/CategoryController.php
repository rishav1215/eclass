<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view("admin.manageCategory", compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.insertCategory');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    $request->validate([
    'cat_title' => 'required|string|max:255',
    'cat_description' => 'nullable|string',
]);
 Category::create($request->all());

    return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
    $request->validate([
        'cat_title' => 'required|string|max:255',
        'cat_description' => 'nullable|string',
    ]);

    $category->update($request->all());

    return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with("msg", "category deleted successfully");
    }
}
