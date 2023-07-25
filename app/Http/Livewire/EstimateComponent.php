<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\EstimateCart;

class EstimateComponent extends Component
{
    public $product_code, $totalprice, $productIncart = [], $charges;

    public function mount(){
        $this->productIncart = EstimateCart::all();
    }
    public function InserttoCart(){
        $countProduct = Product::where('name', $this->product_code)->first();
        if(!$countProduct){
            toastr()->error('Product not found');
            $this->product_code = '';
        }else{
            $countCartProduct = EstimateCart::where('product_name', $this->product_code)->count();
            $ctCartProduct = EstimateCart::where('product_name', $this->product_code)->first();
            if($countCartProduct > 0){
                $add_to_cart =EstimateCart::where('product_name', $this->product_code)->first();
                $add_to_cart->product_qty += 1;
                $add_to_cart->product_price =$countProduct->price;
                $add_to_cart->save();
                $this->mount();
                $this->product_code = "";
            }else {

                $add_to_cart = new EstimateCart();
                $add_to_cart->product_id =$countProduct->id;
                $add_to_cart->product_name =$countProduct->name;
                $add_to_cart->product_qty = 1;
                $add_to_cart->product_price =$countProduct->price;
                $add_to_cart->user_id = auth()->user()->id;
                $add_to_cart->save();
                $this->productIncart->prepend($add_to_cart);
                $this->product_code = "";
                toastr()->success('Product added successfully!');
            }
        }

    }
    public function incrementQty($id){
        $cart = EstimateCart::find($id);
        $cart->increment('product_qty', 1);
        $updatePrice = $cart->product_qty * $cart->product->price;
        $cart->update(['product_price' => $updatePrice]);
        $this->mount();
    }
    public function decrementQty($id){
        $cart = EstimateCart::find($id);
        if($cart->product_qty == 1){
            $cart->delete();
            $this->productIncart = $this->productIncart->except($id);
        }else {
            $cart->decrement('product_qty', 1);
            $updatePrice = $cart->product_qty * $cart->product->price;
            $cart->update(['product_price' => $updatePrice]);
            $this->mount();
        }
    }

    public function removeCart($id){
        $cart = EstimateCart::find($id);

        $cart->delete();
        $this->productIncart = $this->productIncart->except($id);
        toastr()->success("Item removed successfully");
    }
    public function render()
    {
        $products = Product::where('product_status', 1)->get();
        return view('livewire.estimate-component', compact('products'));
    }
}
