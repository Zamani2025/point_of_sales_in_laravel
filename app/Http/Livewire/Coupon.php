<?php

namespace App\Http\Livewire;

use App\Models\Coupen;
use App\Models\Order;
use Livewire\Component;

class Coupon extends Component
{
    public $searchCustomer = [];
    public $searchByName;
    public $searchByPhone;

    public function searchCustomerByName(){
        $this->searchCustomer = Coupen::where('name', 'like', '%' . $this->searchByName . '%')->get();
    }
    public function searchCustomerByPhone(){
        $this->searchCustomer = Coupen::where('token', 'like', '%' . $this->searchByPhone . '%')->get();
    }
    public function render()
    {
        $customers = Coupen::where('status', false)->paginate(10);
        return view('livewire.coupon', compact('customers'));
    }
}
