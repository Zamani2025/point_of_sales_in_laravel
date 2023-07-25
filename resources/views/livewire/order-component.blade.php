<div class="col-lg-12">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                    <h4 style="float:left; color: #fff;">Order Products</h4>
                </div>
                <div class="card-body">
                    <div class="row" style="border-bottom: 1px solid black;">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6" style="font-size: 16px;"><strong>Account Number:</strong> 0271350511</div>
                                <div class="col-md-6"><strong>Branch:</strong> Adum Branch Kumasi</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8" style="font-size: 16px;"><strong>Merchant Name:</strong> New View Construction LTD</div>
                                <div class="col-md-4"><strong>Merchant ID:</strong> 430679</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <form wire:submit.prevent="InserttoCart" class=" mb-2">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" wire:model="product_code" placeholder="Product Name" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-left">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Discount (%)</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="addMoreProduct">
                                @foreach($productIncart as $key => $item)
                                    <tr>
                                        <td><p class="mt-2">{{$key + 1}}</p></td>
                                        <td>
                                            <input readonly type="text" value="{{$item->product->name}}" name="product_id[]" id="" class="form-control">
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <button type="button" wire:click="incrementQty({{$item->id}})" class="btn btn-dark btn-sm"> + </button>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="" class="ml-2 mt-1">{{$item->product_qty}}</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" wire:click="decrementQty({{$item->id}})" class="btn btn-dark btn-sm"> - </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" name="price[]" readonly value="{{$item->product_price}}" class="form-control price" id="price">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="discount[]" id="discount">
                                        </td>
                                        <td>
                                            <input type="number" name="total[]"  readonly  value="{{$item->product_qty * $item->product_price}}" class="form-control total" id="total">
                                        </td>

                                        <td><a class="btn btn-sm btn-danger" wire:click="removeCart({{$item->id }})"><i class="fa fa-times-circle"></i></a></td>
                                    </tr>

                                    <?php
                                        if($discount){
                                            $totalprice = $totalprice + ($item->product_qty * $item->product_price) - (($item->product_qty * $item->product_price * $discount) / 100);
                                        }else {
                                            $totalprice = $totalprice + $item->product_qty * $item->product_price;
                                        }
                                    ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <form action="{{ route('addorder') }}" method="post">
                @csrf
                @foreach($productIncart as $key => $item)
                    <input readonly type="hidden" value="{{$item->product->id}}" name="product_id[]">
                    <input readonly type="hidden" value="{{$item->product_qty}}" name="quantity[]">
                    <input type="hidden" name="price[]" value="{{$item->product_price}}">
                    <input type="hidden" name="discount[]" id="discount">
                    <input type="hidden" name="total[]"  value="{{$item->product_qty * $item->product_price}}">
                    @endforeach
                <div class="card">
                    <div class="card-header p-3 bg-success text-white" ><h4>Total <b class="totals">{{number_format($totalprice, 2)}}</b></h4></div>
                    <div class="card-body">
                        <div class="btn-group btn-sm">
                            <button type="button"  class="btn btn-danger btn-sm"><a target="_blank" href="{{route('previnvoice')}}" style="text-decoration: none; color: #fff;"> <i class="fa fa-print"></i> Print Receipt</a></button>
                            <button type="button" class="btn btn-primary btn-sm"><a href="{{route('invoice')}}" style="text-decoration: none; color: #fff;"><i class="fa fa-file-pdf"></i> Export As PDF</a></button>
                            <!-- <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-file-excel"></i> Export Excel</button> -->
                        </div>
                        <div class="panel">
                            <div class="row">
                                <table class="table table-striped">
                                    <td>
                                        <label for="">Customer Name</label>
                                        <input type="text" required name="customer_name" class="form-control">
                                    </td>
                                    <td>
                                        <label for="">Customer Phone</label>
                                        <input type="text" required name="customer_phone" class="form-control">
                                    </td>
                                </table>
                                <td>Payment method
                                    <div class="items">
                                        <span class="radio-item">
                                            <input type="radio" required name="payment_method" id="cash" class="form-check-input" value="cash" checked="checked">
                                            <label for="cash" class="form-check-label"><i class="fa fa-money-bill text-success"></i> Cash</label>
                                        </span>
                                        <span class="radio-item">
                                            <input type="radio" required name="payment_method" id="bank" class="form-check-input" value="bank transfer">
                                            <label for="bank" class="form-check-label"><i class="fa fa-university text-danger"></i> Bank Transfer</label>
                                        </span>
                                        <span class="radio-item">
                                            <input type="radio" required name="payment_method" id="card" class="form-check-input" value="mobile money">
                                            <label for="card" class="form-check-label"> <i class="fa fa-credit-card text-info"></i> Momo Pay</label>
                                        </span>
                                    </div>
                                </td><br>
                                <?php
                                    if($pay_money){
                                        $balance = $pay_money -  $totalprice;
                                    }
                                ?>
                                <td>Payment <input type="number" name="paid_amount" wire:model="pay_money" id="paid_amount" class="form-control"></td>
                                <td>Returning Change <input readonly type="number" name="balance" value="{{$balance}}" class="form-control"></td>
                                <button type="submit" class="btn btn-primary btn-block btn-lg mt-3">Save</button>
                                <a href="#" class="btn btn-danger btn-block mt-2"data-toggle="modal" data-target="#calculatorModal">Calculator</button>
                                <a href="#" class="text-center btn mt-2 text-danger"> </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
