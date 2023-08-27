<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Product::paginate(10);
        $data = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.id', 
                     'products.name', 
                     'products.description', 
                     'products.price', 
                     'products.image', 
                     'categories.name as category_name', 
                     'products.stock_quantity', 
                     'products.is_available', 
                     'products.created_at')
            ->where('products.deleted_at')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10240|dimensions:min_width=1,min_height=1,max_width=10000,max_height=10000',
            'category_id' => 'required|exists:categories,id',
            'stock_quantity' => 'required|numeric|min:1',
            'is_available' => 'required',
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $file_name;
        $product->category_id = $request->category_id;
        $product->stock_quantity = $request->stock_quantity;
        $product->is_available = $request->is_available;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $category = Category::find($product->category_id);
        return view('product.show', compact('product', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10240|dimensions:min_width=1,min_height=1,max_width=10000,max_height=10000',
            'category_id' => 'required|exists:categories,id',
            'stock_quantity' => 'required|numeric|min:1',
            'is_available' => 'required',
        ]);

        $image = $request->hidden_image;
        if ($request->image != '') {
            $image = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $image);
        }

        $product = Product::find($request->hidden_id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $image;
        $product->category_id = $request->category_id;
        $product->stock_quantity = $request->stock_quantity;
        $product->is_available = $request->is_available;

        $product->save();
        return redirect()->route('products.index')->with('success', 'Product data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product data deleted successfully.');
    }
}
