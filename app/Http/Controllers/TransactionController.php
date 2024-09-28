<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transactions.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $payment_method = Transaction::select('payment_method', 'order_ids')->where('id', $id)->first();
        $order = Order::where('id', $transaction->order_id)->first();
        $last_id = $order->id;
        $order_receipts = OrderDetail::orderBy('created_at', 'DESC')->where('order_id', $order->id)->get();
        // dd($order_receipts);
        return view('invoice-component', compact('order_receipts', 'order', 'transaction', 'payment_method', 'last_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
