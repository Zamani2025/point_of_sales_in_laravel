<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $searchByName;
    public $searchByPrice;
    public $products_details;
    public $searchProducts = [];
    
    public function ProductDetails($product_id){
        $this->products_details = Product::find($product_id);

    }
    public function searchProductByName(){
        $this->searchProducts = Product::where('name', 'like', '%' . trim($this->searchByName) . '%')->where('product_status', 1)->get();
        // dd($this->searchProduct);
    }
    public function searchProductByPrice(){
        $this->searchProducts = Product::where('price', 'like', '%' . $this->searchByPrice . '%')->where('product_status', 1)->get();
        // dd($this->searchProduct);
    }
    public function render()
    {
        $products = Product::orderBy('created_at', 'DESC')->where('product_status', 1)->paginate(10);

        return view('livewire.products', compact('products'));
    }
}
