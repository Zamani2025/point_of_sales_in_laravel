<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Picqer;

class OrderController extends Controller
{

    public function index()
    {
        $invoice_id = rand(1000, 10000);
        $products = Product::all();
        $last_id = OrderDetail::max('order_id');
        $order_receipts = OrderDetail::where('order_id', $last_id)->whereDate("created_at", Carbon::today())->get();
        $subtotal = OrderDetail::where('order_id', $last_id)->sum('amount');
        $orders = Order::all();
        $payment_method = Transaction::select('payment_method')->where('order_id', $last_id)->whereDate("created_at", Carbon::now())->first();
        $order = Order::where('id', $last_id)->whereDate("created_at", Carbon::now())->first();
        return view('orders.index', compact('payment_method','orders', 'order', 'subtotal', 'products', 'order_receipts', 'invoice_id', 'last_id'));
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request){
            $order_code = rand(100000, 900000);
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            $barcodes = $generator->getBarcode($order_code, $generator::TYPE_CODE_128, 3, 70);

            //Order Model
            $order = new Order();
            $order->name = $request->customer_name;
            // $order->discount = $request->discount;
            $order->order_code = $order_code;
            $order->barcode = $barcodes;
            $order->phone = $request->customer_phone;
            $order->save();
            $order_id = $order->id;

            //Order Details Model
            for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order_id;
                $orderDetail->product_id = $request->product_id[$product_id];
                $orderDetail->unitprice = $request->price[$product_id];
                $orderDetail->quantity = $request->quantity[$product_id];
                $orderDetail->amount = $request->total[$product_id];
                $orderDetail->discount = $request->discount[$product_id];
                $orderDetail->save();

                $product = Product::where('id', $request->product_id[$product_id])->first();

                $product->quantity -=  $request->quantity[$product_id];
                if($product->quantity == 0){
                    $product->product_status = 0;
                }
                $product->save();
            }

            //Transaction Model
            $transaction = new Transaction();
            $transaction->order_id = $order_id;
            $transaction->user_id = auth()->user()->id;

            $transaction->paid_amount = $request->paid_amount;
            $transaction->balance = $request->balance;
            $transaction->payment_method = $request->payment_method;
            $transaction->transac_amount = $orderDetail->amount;
            $transaction->transac_date = date('Y-m-d');
            $transaction->save();



            $products = Product::all();
            $order_details = OrderDetail::where('order_id', $order_id)->get();
            $orderedBy = Order::where('id', $order_id)->get();

            return view('orders.index', compact('products', 'order_details', 'orderedBy'));

        });

        Cart::truncate();

        toastr()->success("Order Placed Successfully");
        return back();

    }

}
