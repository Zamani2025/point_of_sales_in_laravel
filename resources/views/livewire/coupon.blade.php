
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                        <h4 style="float:left; color: #fff;">Coupons</h4>
                        @if(Auth::user()->is_admin)
                            <a href="" style="float:right; text-decoration:none;" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                                <i class="fa fa-plus"></i> Generate Coupon
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if(Count($customers) > 0)
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <a href="/preview-coupons" target="_blank" class="btn btn-info">Print Coupons</a>
                                </div>
                            </div>
                        @endif
                        <table class="table table-striped table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Coupon Name</th>
                                    <th>Token</th>
                                    <th>Discount (%)</th>
                                    @if(Auth::user()->is_admin)
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    @endif
                                </tr>
                            </thead>
                            @if ($searchCustomer)
                                <tbody>
                                    @forelse ($searchCustomer as $key => $customer)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$customer->name}}</td>
                                            <td>{{$customer->token}}</td>
                                            <td>{{$customer->discount}}</td>
                                            @if(Auth::user()->is_admin)
                                                <td><a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addProductModal{{$customer->id}}"><i class="fa fa-edit fa-lg"></i></a></td>
                                                <td><a href="{{ route('deletecustomer', ['id' => $customer->id]) }}"  onclick="confirm('Are you sure, You want to delete this user?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a></td>
                                                <form action="{{route('deletecoupon', ['id' => $customer->id])}}" id="formId" style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                            @endif
                                        </tr>
                                        
                                        <div class="modal right fade" id="addProductModal{{$customer->id}}" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="addUserModalLabel">Edit Coupon</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('editcoupon', ['id' => $customer->id])}}" >
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="name">Coupon Name</label>
                                                                <input type="text" required name="name" value="{{$customer->name}}" id="name" class="form-control"/>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="quantity">Discount</label>
                                                                <input type="number" required name="discount" value="{{$customer->discount}}" id="quantity" class="form-control"/>

                                                            </div>
                                                            <div class="modal-fotter">
                                                                <button class="btn btn-block btn-primary" type="submit">Update Coupon</button>
                                                                <button class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="7"><h5 class="text-center text-danger">Search result not found!</h5></td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            @else
                                <tbody>
                                    @foreach ($customers as $key => $customer)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$customer->name}}</td>
                                            <td>{{$customer->token}}</td>
                                            <td>{{$customer->discount}}</td>
                                            @if(Auth::user()->is_admin)
                                                <td><a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addProductModal{{$customer->id}}"><i class="fa fa-edit fa-lg"></i></a></td>
                                                <td><a href="{{ route('deletecustomer', ['id' => $customer->id]) }}"  onclick="confirm('Are you sure, You want to delete this user?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a></td>
                                                <form action="{{route('deletecoupon', ['id' => $customer->id])}}" id="formId" style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                            @endif
                                        </tr>
                                        
                                        <div class="modal right fade" id="addProductModal{{$customer->id}}" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="addUserModalLabel">Edit Coupon</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('editcoupon', ['id' => $customer->id])}}" >
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="name">Coupon Name</label>
                                                                <input type="text" required name="name" value="{{$customer->name}}" id="name" class="form-control"/>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Number Of Coupon</label>
                                                                <input type="number" required value="{{$customer->name}}" name="quantity" id="qty" class="form-control"/>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="quantity">Discount</label>
                                                                <input type="number" required name="discount" value="{{$customer->discount}}" id="quantity" class="form-control"/>

                                                            </div>
                                                            <div class="modal-fotter">
                                                                <button class="btn btn-block btn-primary" type="submit">Update Coupon</button>
                                                                <button class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            @endif
                            {{$customers->links("pagination::bootstrap-4")}}
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                        <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Search Coupon</h4></div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <form wire:submit.prevent="searchCustomerByName">
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
                                <form wire:submit.prevent="searchCustomerByPhone">
                                    <div class="form-group">
                                        <label for="" class="form-label">Search by token</label>
                                        <input type="search" wire:model="searchByPhone" class="form-control" placeholder="Type here...">
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
                    <h4 class="modal-title" id="addUserModalLabel">Generate Coupon</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('addCoupon')}}" >
                        @csrf
                        <div class="form-group">
                            <label for="name">Coupon Name</label>
                            <input type="text" required name="name" id="name" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="name">Number Of Coupon</label>
                            <input type="text" required name="quantity" id="qty" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="quantity">Discount</label>
                            <input type="number" required name="discount" id="quantity" class="form-control"/>

                        </div>
                        <div class="modal-fotter">
                            <button class="btn btn-block btn-primary" type="submit">Generate Coupon</button>
                            <button class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
