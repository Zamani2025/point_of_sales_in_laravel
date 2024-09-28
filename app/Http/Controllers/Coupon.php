<?php

namespace App\Http\Controllers;

use App\Models\Coupen;
use Illuminate\Http\Request;

class Coupon extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers.index');
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
        $coupon_number = $request->quantity;
        // dd($coupon_number);

        for ($i=0; $i < $coupon_number; $i++) { 
            $coupon = new Coupen();
    
            $coupon->name = $request->name;
            $coupon->discount = $request->discount;
            $coupon->token = "MVC" . rand(100000, 900000);;
    
            $coupon->save();
        }
        toastr()->success("Coupon Added Successfully");

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
        $coupon = Coupen::find($id);

        $coupon->name = $request->name;
        $coupon->discount = $request->discount;
        $coupon->token = "MVC" . rand(100000, 900000);;

        $coupon->save();
        toastr()->success("Coupon Updated Successfully");

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Coupen::find($id);

        $product->delete();
        toastr()->success('Coupen deleted successfully');

        return back();
    }
}
