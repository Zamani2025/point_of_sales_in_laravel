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
    public $order_id;
    public $isOkay = false;

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
    DB::transaction(function () use ($request) {
        // Generate order code and barcode
        $order_code = rand(100000, 900000);
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcodes = $generator->getBarcode($order_code, $generator::TYPE_CODE_128, 3, 70);

        // Order Model - Create one order first, outside the loop
        $order = new Order();
        $order->name = $request->customer_name;
        $order->discount = $request->discount;
        $order->total_price = $request->totalprice;
        $order->order_code = $order_code;
        $order->barcode = $barcodes;
        $order->user_name = auth()->user()->name;
        $order->phone = $request->customer_phone;
        $order->save();

        // Store the order ID for later use
        $this->order_id = $order->id;

        // Loop through each product to create the OrderDetail entries
        for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {
            $product = Product::where('id', $request->product_id[$product_id])->first();

            if ($product->quantity == 0) {
                $product->product_status = 0;
                $this->isOkay = true;
                $product->save();
            } elseif ($product->quantity < $request->quantity[$product_id]) {
                $this->isOkay = false;
            } else {
                // OrderDetail Model - Create an OrderDetail for each product
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $this->order_id;  // Use the same order ID for all products
                $orderDetail->user_id = auth()->user()->id;
                $orderDetail->product_id = $request->product_id[$product_id];
                $orderDetail->unitprice = $request->price[$product_id];
                $orderDetail->quantity = $request->quantity[$product_id];
                $orderDetail->amount = $request->total[$product_id];
                $orderDetail->save();

                // Update product quantity
                $product->quantity -= $request->quantity[$product_id];
                $product->save();

                $this->isOkay = true;
            }
        }

        // Transaction Model - Create a transaction for the entire order
        $transaction = new Transaction();
        $transaction->order_id = $this->order_id;
        $transaction->order_ids = rand(1000, 10000);
        $transaction->user_id = auth()->user()->id;
        $transaction->paid_amount = $request->paid_amount;
        $transaction->balance = $request->balance;
        $transaction->payment_method = $request->payment_method;
        $transaction->transac_amount = $request->totalprice;  // Total amount for the entire order
        $transaction->transac_date = date('Y-m-d');
        $transaction->save();

        if ($this->isOkay == true) {
            $products = Product::all();
            $order_details = OrderDetail::where('order_id', $this->order_id)->get();
            $orderedBy = Order::where('id', $this->order_id)->first();  // Use 'first' instead of 'get'

            return view('orders.index', compact('products', 'order_details', 'orderedBy'));
        }
    });

    if ($this->isOkay == true) {
        Cart::truncate();
        toastr()->success("Order Placed Successfully");
        return back();
    } else {
        toastr()->error("Order quantity can't be greater than Product quantity");
        return back();
    }
}


}
