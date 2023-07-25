<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                        <h4 style="float:left; color: #fff;">Return Products</h4>
                        @if(Auth::user()->is_admin)
                            <a href="" style="float:right; text-decoration:none;" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                                <i class="fa fa-plus"></i> Add Product
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($searchProducts)
                                        @forelse ($searchProducts as $key => $product)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->phone }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->date }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7"><h5 class="text-center text-danger">Search result not found!</h5></td>
                                            </tr>
                                        @endforelse
                                    @else
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->phone }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->date }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Search Product</h4></div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="" method="post" wire:submit.prevent="searchProductByName">
                                <div class="form-group">
                                    <label for="" class="form-label">Search by name</label>
                                    <input type="search" wire:model="searchByName" class="form-control" placeholder="Type here...">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 mt-4">
                            <form action="" method="post" wire:submit.prevent="searchProductByDate">
                                <div class="form-group">
                                    <label for="" class="form-label">Search by date</label>
                                    <input type="date" wire:model="searchByDate" class="form-control" placeholder="Type here...">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                    <form method="POST" action="{{route('addreturn_products')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" required name="name" id="name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Customer Phone</label>
                            <input type="text" required name="phone" id="phone" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" required name="product_name" id="product_name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price</label>
                            <input type="number" required name="price"  id="price" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Product Quantity</label>
                            <input type="number" required name="quantity" id="quantity" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Date</label>
                            <input type="date" required name="date" id="date" class="form-control"/>
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
