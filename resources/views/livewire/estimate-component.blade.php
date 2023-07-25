<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                        <h4 style="float:left; color: #fff;">Estimate Products</h4>
                        <a href="" style="float:right; text-decoration:none;" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                            <i class="fa fa-plus"></i> Add Product
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="mt-4">
                            <form wire:submit.prevent="InserttoCart" class=" mb-2">
                                <div class="form-group">
                                    <input type="text" wire:model="product_code" class="form-control" placeholder="Product name">
                                </div>
                            </form>
                        </div>
                        <table class="table table-striped table-left">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
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
                                            <input type="number" name="price[]" readonly value="{{number_format($item->product_price, 2)}}" class="form-control price" id="price">
                                        </td>
                                        <td>
                                            <input type="number" name="total[]" readonly value="{{number_format($item->product_qty * $item->product_price, 2)}}" class="form-control total" id="total">
                                        </td>

                                        <td><a class="btn btn-sm btn-danger" wire:click="removeCart({{$item->id }})"><i class="fa fa-times-circle"></i></a></td>
                                    </tr>
                                    <?php
                                    if ($charges){
                                        $totalprice = $totalprice + $item->product_qty * $item->product_price + $charges;
                                    }else{
                                        $totalprice = $totalprice + $item->product_qty * $item->product_price;
                                    }
                                    ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <form action="{{ route('estimate.add') }}" method="post">
                    @csrf
                    @foreach($productIncart as $key => $item)
                        <input readonly type="hidden" value="{{$item->product->id}}" name="product_id[]">
                        <input readonly type="hidden" value="{{$item->product_qty}}" name="quantity[]">
                        <input type="hidden" name="price[]" value="{{$item->product_price}}">
                        <input type="hidden" name="total[]"  value="{{$item->product_qty * $item->product_price}}">
                    @endforeach
                    <div class="card">
                        <div class="card-header p-3 bg-success text-white" ><h4>Total <b class="totals">{{number_format($totalprice, 2)}}</b></h4></div>
                        <div class="card-body">
                            <div class="btn-group btn-sm">
                                <button type="button"  class="btn btn-danger btn-sm"><a target="_blank" href="{{route('estimate.invoice')}}" style="text-decoration: none; color: #fff;"> <i class="fa fa-print"></i> Print Receipt</a></button>
                                <button type="button" class="btn btn-primary btn-sm"><a href="{{route('estimate.pdf')}}" style="text-decoration: none; color: #fff;"><i class="fa fa-file-pdf"></i> Export As PDF</a></button>
                            </div>
                            <div class="panel">
                                <div class="row">
                                    <table class="table table-striped">
                                        <td>
                                            <label for="" class="form-label">Customer Name</label>
                                            <input type="text" required name="customer_name" class="form-control">
                                        </td>
                                        <td>
                                            <label for="">Customer Phone</label>
                                            <input type="number" required name="customer_phone" class="form-control">
                                        </td>
                                        <?php
                                            if($charges){
                                                $totalprice = $totalprice + $charges;
                                            }
                                        ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Charges</label>
                                                <input type="number" name="charges" wire:model="charges" class="form-control">
                                            </div>
                                        </div>
                                    </table>
                                    <button type="submit" class="btn btn-primary btn-block btn-lg mt-3">Create Estimate</button>
                                    <a href="#" class="btn btn-danger btn-block mt-2"data-toggle="modal" data-target="#calculatorModal">Calculator</button>
                                    <a href="#" class="text-center btn mt-2 text-danger"> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal right fade" id="addProductModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addUserModalLabel">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('addproduct')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" required name="name" wire:model="name" id="name" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" required name="price"  id="price" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" required name="quantity" id="quantity" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" required name="stock" id="stock" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file"  name="product_image" id="image" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="image">Stock Status</label>
                            <select name="product_status" id="" class="form-control">
                                <option value="">Stock status</option>
                                <option value="1">Instock</option>
                                <option value="0">Out Of Stock</option>
                            </select>

                        </div>
                        <div class="modal-fotter">
                            <button class="btn btn-block btn-primary" type="submit">Save Product</button>
                            <button class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
