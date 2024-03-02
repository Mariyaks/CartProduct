<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryShow()
    {
        return view('admin.category-add');
    }

    public function CategoryAdd(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
      
            // Directory creation logic
            $category = new Category();
            $category->name = $request->input('name');
            $category->save();
            return redirect()->route('categorylist')->with('success', 'Category entry added successfully');
    }

    public function CategoryList()
    {
        $categories = Category::all(); // Retrieve all categories from the database
        return view('admin.category-list', ['categories' => $categories]);
    }

    public function CategoryEdit($id)
    {
        $category = Category::find($id);

        return view('admin.category-edit', ['category' => $category]);
    }

    public function CategoryUpdate(Request $request, $id)
    {
        // Find the category
        $category = Category::find($id);
    
        // Check if the category exists
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
    
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Update category
        $category->name = $request->input('name');
        $category->save();
    
        return redirect()->route('categorylist')->with('success', 'Category entry updated successfully');
    }
    

    public function CategroyDelete($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categorylist')->with('error', 'Category not found');
        }
        $category->delete();
        return redirect()->route('categorylist')->with('success', 'Category deleted successfully');
    }

    
}

