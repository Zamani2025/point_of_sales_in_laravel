<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Cart;
use Carbon\Carbon;

class OrderComponent extends Component
{
    public $product_code, $totalprice, $productIncart, $pay_money, $balance, $discount, $total = [];

    public function mount(){
        $this->productIncart = Cart::all();
    }
    public function InserttoCart(){
        $countProduct = Product::where('name', $this->product_code)->first();
        if(!$countProduct){
            toastr()->error('Product not found');
            $this->product_code = '';
        }else{
            $countCartProduct = Cart::where('product_name', $this->product_code)->count();
            $ctCartProduct = Cart::where('product_name', $this->product_code)->first();
            if($countCartProduct > 0){
                $add_to_cart =Cart::where('product_name', $this->product_code)->first();
                $add_to_cart->product_qty += 1;
                $add_to_cart->product_price =$countProduct->price;
                $add_to_cart->save();
                $this->mount();
                $this->product_code = "";
            }else {

                $add_to_cart = new Cart();
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
        $cart = Cart::find($id);
        $cart->increment('product_qty', 1);
        $updatePrice = $cart->product_qty * $cart->product->price;
        $cart->update(['product_price' => $updatePrice]);
        $this->mount();
    }
    public function decrementQty($id){
        $cart = Cart::find($id);
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
        $cart = Cart::find($id);

        $cart->delete();
        $this->productIncart = $this->productIncart->except($id);
        toastr()->success("Item removed successfully");
    }
    public function render()
    {
        $products = Product::where('product_status', 1)->get();
        $invoice_id = rand(1000, 10000);
        $last_id = OrderDetail::max('order_id');
        $order_receipts = OrderDetail::where('order_id', $last_id)->whereDate("created_at", Carbon::today())->get();
        $subtotal = OrderDetail::where('order_id', $last_id)->sum('amount');
        return view('livewire.order-component', compact('products','subtotal', 'order_receipts', 'invoice_id'));
    }
}
