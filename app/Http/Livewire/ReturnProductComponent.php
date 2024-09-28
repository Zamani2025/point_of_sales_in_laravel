<?php

namespace App\Http\Livewire;

use App\Models\ReturnProduct;

use Livewire\Component;

class ReturnProductComponent extends Component
{
    public $searchByName;
    public $searchByDate;
    public $searchProducts = [];

    public function searchProductByName(){
        $this->searchProducts = ReturnProduct::where('name', 'like', '%' . trim($this->searchByName) . '%')->get();
    }
    public function searchProductByDate(){
        $this->searchProducts = ReturnProduct::where('date', 'like', '%' . $this->searchByDate . '%')->get();
    }
    public function render()
    {
        $products = ReturnProduct::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.return-product-component', compact('products'));
    }
}
