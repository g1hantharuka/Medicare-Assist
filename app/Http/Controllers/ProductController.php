<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->orderBy('id', 'ASC')->paginate(10);

        return view('admin.product.index', ['product' => $product]);



    }

    // function to display all the products as cards in the products page
    public function showProducts()
    {
        $products = Product::all();
        return view('admin.product.pharmacy', compact('products'));
        // return view('admin.product.show', [
        //     'products' => Product::paginate(10)
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.form', [

            'product' => (new Product()),
            //all product categories
            'categories' => ProductCategory::all(),


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // return redirect()->route('admin.product.index');
        $validated = $request->validate([
            'name' => 'required|unique:products,name',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required',

        ]);


        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/products/', $filename);
            // $post->image = $filename;

            $validated['image'] = $filename;

        }

        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.form', [
            'product' => $product,
            // 'roles' => Role::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
    // Validate the request data, excluding the image initially
    $validated = $request->validate([
        'name' => 'required',
        'slug' => 'required',
        'description' => 'required',
        'image' => 'required',
    ]);
    dd($validated);
    // Check if an image file is present in the request
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/products'), $filename); // Use public_path for correct directory
        $validated['image'] = 'uploads/products/' . $filename; // Store the relative path
    } else {
        // If no new image is uploaded, retain the old image
        $validated['image'] = $product->image;
    }

    // Debug output to check the validated data


    // Update the product with the validated data
    $product->update($validated);

    return redirect()->route('product.index')->with('success', 'Product successfully updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index') ->with('success', 'Product successfully deleted!');
    }
}
