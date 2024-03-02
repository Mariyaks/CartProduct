<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $categories = Category::all();

        return response()->json(['categories' => $categories], 200);
    }

    public function getProductById($categoryId)
{
    // Find the category based on the provided ID
    $category = Category::findOrFail($categoryId);

    // Retrieve products that belong to the specified category
    $products = $category->products;

    // Include information about the category and its products in the JSON response
    return response()->json(['category' => $category], 200);
}
}

