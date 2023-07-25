<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReturnProduct;
use App\Models\Product;
use App\Models\OrderDetail;

class ReturnProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('return_products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::where('name', $request->product_name)->first();
        if($product){
            $orderDetial = OrderDetail::where('product_id', $product->id)->first();
            $product->quantity += $request->quantity;
            $product->save();

            $orderDetial->amount -= $request->price;
            $orderDetial->save();

            $return_product = new ReturnProduct();
            $return_product->name = $request->name;
            $return_product->phone = $request->phone;
            $return_product->product_name = $request->product_name;
            $return_product->quantity = $request->quantity;
            $return_product->product_name = $request->product_name;
            $return_product->price = $request->price;
            $return_product->date = $request->date;
            $return_product->save();
            toastr()->success('Product successfully returned');
        }else {
            toastr()->error("Product not found in our list");

        }

        return back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
