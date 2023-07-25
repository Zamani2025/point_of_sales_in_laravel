<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderDetail;
use Carbon\Carbon;

class ReceiptComponent extends Component
{
    public function render()
    {
        $last_id = OrderDetail::max('order_id');
        $subtotal = OrderDetail::where('order_id', $last_id)->sum('amount');
        $order_receipts = OrderDetail::where('order_id', $last_id)->whereDate("created_at", Carbon::today())->get();
        return view('livewire.receipt-component', compact('order_receipts', 'subtotal'));
    }
}
