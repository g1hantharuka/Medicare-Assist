<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_category.index', [
            'product_categories' => ProductCategory::orderBy('id', 'ASC')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product_category.form', [

            'productCategory' => (new ProductCategory()),


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
    {
        (new ProductCategory())->create($request->all());

        return redirect()->route('admin.product-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product_category.form', [
            'productCategory' => $productCategory,
            // 'roles' => Role::cases()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required'
            // 'email' => 'required|email',
            // 'role' => 'required'
        ]);

        $productCategory->update($validated);

        return redirect()->route('product-category.index')->with('success', 'Category successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return redirect()->route('product-category.index') ->with('success', 'Category successfully deleted!');

    }
}
