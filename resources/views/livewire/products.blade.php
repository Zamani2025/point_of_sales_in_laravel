<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                        <h4 style="float:left; color: #fff;">Products</h4>
                        @if(Auth::user()->is_admin)
                            <a href="" style="float:right; text-decoration:none;" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                                <i class="fa fa-plus"></i> Add Product
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('products.table')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    @if($products_details)
                        <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Product Details</h4></div>
                        <div class="card-body">
                            @include('products.product_details')
                        </div>
                    @else
                        <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Search Product</h4></div>
                        <div class="card-body">
                            <div class="btn-group btn-sm">
                                <button type="button"  class="btn btn-danger btn-sm"><a target="_blank" href="{{route('stockinvoice')}}" style="text-decoration: none; color: #fff;"> <i class="fa fa-print"></i> Print Stock</a></button>
                                <button type="button" class="btn btn-primary btn-sm"><a href="{{route('stock.pdf')}}" style="text-decoration: none; color: #fff;"><i class="fa fa-file-pdf"></i> Export As PDF</a></button>
                            </div>
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
                                <form action="" method="post" wire:submit.prevent="searchProductByPrice">
                                    <div class="form-group">
                                        <label for="" class="form-label">Search by price</label>
                                        <input type="search" wire:model="searchByPrice" class="form-control" placeholder="Type here...">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
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
                    <form method="POST" action="{{route('addproduct')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" required name="name" id="name" class="form-control"/>

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
                            <label for="image">Stock Status</label>
                            <select name="product_status" id="" class="form-select">
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
