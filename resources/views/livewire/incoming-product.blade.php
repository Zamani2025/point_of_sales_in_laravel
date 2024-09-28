<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                        <h4 style="float:left; color: #fff;">Products Out of stock </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <td>Date</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if($searchProducts)
                                    @forelse ($searchProducts as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="Click to view detail" wire:click.prevent="ProductDetails('{{ $product->id }}  ')">{{$product->name}}</td>
                                            <td>{{number_format($product->price, 2)}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{ $product->created_at->toFormattedDateString() }}</td>
                                            @if(Auth::user()->is_admin)
                                                <td><a href="#"  data-toggle="modal" data-target="#editProductModal{{$product->id}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit fa-lg"></i> Edit</a></td>
                                                <td><a href="{{ route('deleteproduct', ['id' => $product->id]) }}"  onclick="confirm('Are you sure, You want to delete this product?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i> Delete</a></td>
                                                <form action="{{route('deleteproduct', ['id' => $product->id])}}" id="formId" style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                            @endif
                                        </tr>
                                        @include('products.edit');
                                    @empty
                                        <tr>
                                            <td colspan="7"><h5 class="text-center text-danger">Search result not found!</h5></td>
                                        </tr>
                                    @endforelse
                                @else
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="Click to view detail" wire:click.prevent="ProductDetails('{{ $product->id }}  ')">{{$product->name}}</td>
                                            <td>{{number_format($product->price, 2)}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{ $product->created_at->toFormattedDateString() }}</td>
                                            @if(Auth::user()->is_admin)
                                                <td><a href="#"  data-toggle="modal" data-target="#editProductModal{{$product->id}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit fa-lg"></i> Edit</a></td>
                                                <td><a href="{{ route('deleteproduct', ['id' => $product->id]) }}"  onclick="confirm('Are you sure, You want to delete this product?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i> Delete</a></td>
                                                <form action="{{route('deleteproduct', ['id' => $product->id])}}" id="formId" style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                            @endif
                                        </tr>
                                        @include('products.edit');
                                    @endforeach
                                @endif
                            </tbody>
                            {{$products->links("pagination::bootstrap-4")}}
                        </table>
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
</div>
