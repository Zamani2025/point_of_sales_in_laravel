<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class IncomingProduct extends Component
{
    public $searchByName;
    public $searchByPrice;
    public $products_details;
    public $searchProducts = [];

    public function ProductDetails($product_id){
        $this->products_details = Product::find($product_id);

    }
    public function searchProductByName(){
        $this->searchProducts = Product::where('name', 'like', '%' . $this->searchByName . '%')->where('product_status', 0)->where('quantity', 0)->get();
    }
    public function searchProductByPrice(){
        $this->searchProducts = Product::where('price', 'like', '%' . $this->searchByPrice . '%')->where('product_status', 0)->where('quantity', 0)->get();
    }
    public function render()
    {
        $products = Product::orderBy('created_at', 'DESC')->where('product_status', 0)->where('quantity', 0)->paginate(10);

        return view('livewire.incoming-product', compact('products'));
    }
}
