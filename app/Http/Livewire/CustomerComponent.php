<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class CustomerComponent extends Component
{
    public $searchCustomer = [];
    public $searchByName;
    public $searchByPhone;

    public function searchCustomerByName(){
        $this->searchCustomer = Order::where('name', 'like', '%' . $this->searchByName . '%')->get();
    }
    public function searchCustomerByPhone(){
        $this->searchCustomer = Order::where('phone', 'like', '%' . $this->searchByPhone . '%')->get();
    }
    public function render()
    {
        $customers = Order::paginate(10);
        return view('livewire.customer-component', compact('customers'));
    }
}
