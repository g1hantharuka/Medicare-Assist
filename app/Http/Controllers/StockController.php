<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\Product;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.stock.index', [
            'stock' => Stock::orderBy('id', 'ASC')->paginate(10),
            'products' => Product::all()
        ]);

        //  $stock = Stock::with('product')->orderBy('id', 'ASC')->paginate(10);

        // return view('admin.stock.index', ['stock' => $stock]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('admin.stock.form', [

        //     'stock' => (new Stock()),


        // ]);

        //retrn view admin.stock for new stock with the products to select a product in the form
        return view('admin.stock.form', [
            'stock' => (new Stock()),
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'quantity' => 'required',
            'product_id' => 'required|unique:stocks,product_id',

        ]);

        // $validated['password'] = bcrypt('password');

        Stock::create($validated);

        return redirect()->route('stock.index')->with('success', 'Stock successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
       return view('admin.stock.form', [
            'stock' => $stock,
           'products' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        $validated = $request->validate([
            'quantity' => 'required',
            // 'product_id' => 'required|unique:stocks,product_id',
            //Unique product id without the current product id

            'product_id' => 'required|unique:stocks,product_id,' . $stock->id,
            // 'role' => 'required'
        ]);

        $stock->update($validated);

        return redirect()->route('stock.index')->with('success', 'Stock successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}