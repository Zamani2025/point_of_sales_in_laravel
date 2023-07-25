<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Deposit;

class BankStatementComponent extends Component
{
    public $searchBydate;
    public $searchByamount;
    public $searchStatement = [];
    public function searchStatementByDate(){
        $this->searchStatement = Deposit::where('date', 'like', '%' . $this->searchBydate . '%')->get();
    }
    public function searchStatementByAmount(){
        $this->searchStatement = Deposit::where('amount', 'like', '%' . $this->searchByamount . '%')->get();
    }
    public function render()
    {
        $statements = Deposit::paginate(10);
        return view('livewire.bank-statement-component', compact('statements'));
    }
}
