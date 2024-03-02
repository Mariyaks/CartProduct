<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    
    public function ProductShow()
    {
        $categories = Category::all();
        return view('admin.product-add', ['categories' => $categories]);
    }

//     public function ProductAdd(Request $request)
// {
//     // Validate the request
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'category' => 'required|exists:categories,id',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'description' => 'required|string',
//     ]);

//     // Create a new product
//     $product = new Product();
//     $product->name = $request->input('name');
//     $product->category_id = $request->input('category');
//     $product->description = $request->input('description');

//     // Get the image path from the store function
//     $imagePath = $this->store($request);

//     // Set the image path in the product model
//     $product->image = $imagePath;

//     // Save the product to the database
//     $product->save();

//     // Continue with the rest of your code
//     return redirect()->route('productlist')->with('success', 'Product entry added successfully');
// }

    public function ProductAdd(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        Product::Create([
            'name' => $request->name,
            'category_id' => $request->category,
            'image' => 'uploads/' . $imageName,
            'description' => $request->description,

        ]);
        return redirect()->route('productlist')->with('success', 'Product entry added successfully');
    }

    public function ProductList()
    {
        $products = Product::all(); // Retrieve all categories from the database
        return view('admin.product-list', ['products' => $products]);
    }

    public function ProductEdit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Assuming you have a Category model
    
        return view('admin.product-edit', compact('product', 'categories'));
    }

    public function ProductUpdate(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|exists:categories,id',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required|string',
    ]);

    // Find the existing product
    $product = Product::findOrFail($id);

    // Update product properties based on form inputs
    $product->name = $request->input('name');
    $product->category_id = $request->input('category');
    $product->description = $request->input('description');

    // Check if a new image is provided
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($product->image) {
            unlink(public_path($product->image));
        }

        // Upload and store the new image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);
        $product->image = 'uploads/' . $imageName;
    }

    // Save the changes to the database
    $product->save();

    // Redirect to the product list with a success message
    return redirect()->route('productlist')->with('success', 'Product updated successfully');
}

    
    public function ProductDelete($id)
{
    // Find the product by ID
    $product = Product::findOrFail($id);

    // Delete the product
    $product->delete();

    // Redirect back to the product list with a success message
    return redirect()->route('productlist')->with('success', 'Product deleted successfully');
}
}
