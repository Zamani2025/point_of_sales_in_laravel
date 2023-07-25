<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\EstimateDetail;
use App\Models\EstimateTransaction;
use App\Models\Product;
use App\Models\EstimateCart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Picqer;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('estimates.index');
    }
    public function store(Request $request)
    {
        DB::transaction(function () use ($request){
            $order_code = rand(100000, 900000);
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            $barcodes = $generator->getBarcode($order_code, $generator::TYPE_CODE_128, 3, 70);

            //Estimate Model
            $estimate = new Estimate();
            $estimate->name = $request->customer_name;
            $estimate->order_code = $order_code;
            $estimate->barcode = $barcodes;
            $estimate->phone = $request->customer_phone;
            $estimate->save();
            $estimate_id = $estimate->id;

            //Estimate Details Model
            for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {
                $estimateDetail = new EstimateDetail();
                $estimateDetail->estimate_id = $estimate_id;
                $estimateDetail->product_id = $request->product_id[$product_id];
                $estimateDetail->unitprice = $request->price[$product_id];
                $estimateDetail->quantity = $request->quantity[$product_id];
                $estimateDetail->amount = $request->total[$product_id];
                $estimateDetail->save();
            }

            //EstimateTransaction Model
            $estimateTransaction = new EstimateTransaction();
            $estimateTransaction->estimate_id = $estimate_id;
            $estimateTransaction->user_id = auth()->user()->id;

            $estimateTransaction->charges = $request->charges;
            $estimateTransaction->transac_amount = $estimateDetail->amount;
            $estimateTransaction->transac_date = date('Y-m-d');
            $estimateTransaction->save();



            $products = Product::all();
            $order_details = EstimateDetail::where('estimate_id', $estimate_id)->get();
            $orderedBy = Estimate::where('id', $estimate_id)->get();

            return view('estimates.index', compact('products', 'order_details', 'orderedBy'));

        });

        EstimateCart::truncate();

        toastr()->success("Product Estimated Successfully");
        return back();
    }

}
