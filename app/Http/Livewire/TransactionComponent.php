<?php

namespace App\Http\Livewire;
use App\Models\Transaction;

use Livewire\Component;

class TransactionComponent extends Component
{
    public $searchTransaction = [];
    public $searchByName;
    public $searchByDate;

    public function searchTransactionByName(){
        $this->searchTransaction = Transaction::where('paid_amount', 'like', '%' . $this->searchByName . '%')->get();
    }
    public function searchTransactionByDate(){
        $this->searchTransaction = Transaction::where('created_at', 'like', '%' . $this->searchByDate . '%')->get();
    }
    public function render()
    {
        $transactions = Transaction::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.transaction-component', compact('transactions'));
    }
}
