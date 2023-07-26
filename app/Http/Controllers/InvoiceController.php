<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\EstimateDetail;
use App\Models\Order;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Estimate;
use App\Models\Transaction;
use App\Models\EstimateTransaction;
use Carbon\Carbon;
use PDF;

class InvoiceController extends Controller
{
    public function Invoice(){
        $invoice_id = rand(1, 1000);
        $last_id = OrderDetail::max('order_id');
        $order = Order::where('id', $last_id)->whereDate("created_at", Carbon::now())->first();
        $payment_method = Transaction::select('payment_method')->where('order_id', $last_id)->whereDate("created_at", Carbon::now())->first();
        $order_receipts = OrderDetail::orderBy('created_at', 'DESC')->where('order_id', $last_id)->whereDate("created_at", Carbon::now())->get();
        $subtotal = OrderDetail::where('order_id', $last_id)->whereDate("created_at", Carbon::now())->sum('amount');
        $pdf = PDF::loadView('invoice-component', compact('order_receipts', 'subtotal', 'last_id', 'invoice_id', 'order', 'payment_method'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('order#'.$invoice_id.'.pdf');
    }

    public function prev(){
        $invoice_id = rand(1000, 10000);
        $last_id = OrderDetail::max('order_id');
        $order = Order::where('id', $last_id)->whereDate("created_at", Carbon::now())->first();
        $payment_method = Transaction::select('payment_method')->where('order_id', $last_id)->whereDate("created_at", Carbon::now())->first();
        $order_receipts = OrderDetail::orderBy('created_at', 'DESC')->where('order_id', $last_id)->whereDate("created_at", Carbon::now())->get();
        $subtotal = OrderDetail::where('order_id', $last_id)->whereDate("created_at", Carbon::now())->sum('amount');
        return view('invoice-component', compact('order_receipts', 'subtotal', 'last_id', 'invoice_id', 'order', 'payment_method'));
    }

    public function monthly_invoice() {
        $invoice_id = rand(1000, 10000);
        $monthlyRevenue = Order::whereYear("created_at", Carbon::now()->year)->whereMonth("created_at", Carbon::now()->month)->sum("total_price");
        $monthlyInvoice = OrderDetail::whereYear("created_at", Carbon::now()->year)->whereMonth("created_at", Carbon::now()->month)->get();
        return view('monthly_sales_invoice', compact('invoice_id', 'monthlyRevenue', 'monthlyInvoice'));
    }
    public function estimate_invoice(){
        $invoice_id = rand(1000, 10000);
        $last_id = EstimateDetail::max('estimate_id');
        $order = Estimate::where('id', $last_id)->whereDate("created_at", Carbon::now())->first();
        $charges = EstimateTransaction::select('charges')->where('estimate_id', $last_id)->whereDate("created_at", Carbon::now())->first();
        $order_receipts = EstimateDetail::orderBy('created_at', 'DESC')->where('estimate_id', $last_id)->whereDate("created_at", Carbon::now())->get();
        $subtotal = EstimateDetail::where('estimate_id', $last_id)->whereDate("created_at", Carbon::now())->sum('amount');

        return view('estimate_invoice',compact('order_receipts', 'subtotal', 'last_id', 'invoice_id', 'order', 'charges'));

    }
    public function estimate_invoicePDF(){
        $invoice_id = rand(1000, 10000);
        $last_id = EstimateDetail::max('estimate_id');
        $order = Estimate::where('id', $last_id)->whereDate("created_at", Carbon::now())->first();
        $charges = EstimateTransaction::select('charges')->where('estimate_id', $last_id)->whereDate("created_at", Carbon::now())->first();
        $order_receipts = EstimateDetail::orderBy('created_at', 'DESC')->where('estimate_id', $last_id)->whereDate("created_at", Carbon::now())->get();
        $subtotal = EstimateDetail::where('estimate_id', $last_id)->whereDate("created_at", Carbon::now())->sum('amount');
        $pdf = PDF::loadView('estimate_invoice',compact('order_receipts', 'subtotal', 'last_id', 'invoice_id', 'order', 'charges'));
        return $pdf->download('estimate#'.$invoice_id.'.pdf');
    }
    public function employee_invoice(){
        $invoice_id = rand(1000, 10000);
        $employees = Employee::all();

        return view('employee_invoice', compact('invoice_id', 'employees'));
    }
    public function employee_invoicePDF(){
        $invoice_id = rand(1000, 10000);
        $employees = Employee::all();
        $pdf = PDF::loadView('employee_invoice', compact('invoice_id', 'employees'));
        return $pdf->download('employee#'.$invoice_id.'.pdf');
    }
    public function stock_invoice(){
        $invoice_id = rand(1000, 10000);
        $products = Product::all();

        return view('stock_invoice', compact('invoice_id', 'products'));
    }
    public function stock_invoicePDF(){
        $invoice_id = rand(1000, 10000);
        $products = Product::all();
        $pdf = PDF::loadView('stock_invoice', compact('invoice_id', 'products'));
        return $pdf->download('stock_invoice#'.$invoice_id. '.pdf');
    }
}
