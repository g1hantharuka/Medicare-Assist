<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->orderBy('id', 'ASC')->paginate(10);

        return view('admin.product.index', ['product' => $product]);


        // return view('admin.product.index', [
        //     'product' => Product::orderBy('id', 'ASC')->paginate(10)
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.form', [

            'product' => (new Product()),


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        (new Product())->create($request->all());

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
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
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required'
            // 'email' => 'required|email',
            // 'role' => 'required'
        ]);

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
