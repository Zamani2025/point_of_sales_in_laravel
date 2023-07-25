<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Picqer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->where('product_status', 0)->paginate(10);
        return view("products.index", compact('products'));
    }

    public function incoming(){
        return view('products.incoming_products');
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
        $product = new Product();


        // if($request->hasFile('product_image')){
        //     if($request->has('product_image')){
        //         $files = $request->file('product_image');
        //         $files->move(public_path() . '/products/images', $files->getClientOriginalName());
        //         $product_image = $files->getClientOriginalName();
        //         $product->product_image = $product_image;
        //     }
        // }

        $product_code = rand(100000, 900000);
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcodes = $generator->getBarcode($product_code, $generator::TYPE_CODE_128, 3, 70);


        $product->name = $request->name;
        $product->price = $request->price;
        $product->product_code = $product_code;
        $product->product_status = $request->product_status;
        $product->barcode = $barcodes;
        $product->alert_stock = $request->stock;
        $product->quantity = $request->quantity;

        $product->save();
        toastr()->success("Product Added Successfully");

        return back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $product = Product::find($id);

        // if($request->hasFile('product_image')){
        //     if($request->has('product_image')){
        //         if($product->product_image != ''){
        //             $product_path = public_path() . '/products/images/'. $product->product_image;
        //             unlink($product_path);
        //         }
        //         $files = $request->file('product_image');
        //         $files->move(public_path() . '/products/images', $files->getClientOriginalName());
        //         $product_image = $files->getClientOriginalName();
        //         $product->product_image = $product_image;
        //     }
        // }

        $product->name =  $request->name;
        $product->product_status =  $request->product_status;
        $product->price =  $request->price;
        $product->quantity =  $request->quantity;
        $product->alert_stock =  $request->stock;

        $product->save();

        toastr()->success('Product updated successfully');

        return back();
    }

    public function barcodes(){
        $products = Product::select('barcode', 'product_code')->where('product_status', 1)->get();
        // dd($products);
        return view('products.barcode.index', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        
        // if($product->product_image != ''){
        //     $product_path = public_path() . '/products/images/'. $product->product_image;
        //     unlink($product_path);
        // }

        $product->delete();
        toastr()->success('Product deleted successfully');

        return back();
    }
}
