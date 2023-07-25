
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                        <h4 style="float:left; color: #fff;">Customers</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    @if(Auth::user()->is_admin)
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
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->created_at->toFormattedDateString()}}</td>
                                            @if(Auth::user()->is_admin)
                                                <td><a href="{{ route('deletecustomer', ['id' => $customer->id]) }}"  onclick="confirm('Are you sure, You want to delete this user?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i> Delete</a></td>
                                                <form action="{{route('deletecustomer', ['id' => $customer->id])}}" id="formId" style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                            @endif
                                        </tr>
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
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->created_at->toFormattedDateString()}}</td>
                                            @if(Auth::user()->is_admin)
                                                <td><a href="{{ route('deletecustomer', ['id' => $customer->id]) }}"  onclick="confirm('Are you sure, You want to delete this user?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i> Delete</a></td>
                                                <form action="{{route('deletecustomer', ['id' => $customer->id])}}" id="formId" style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                            @endif
                                        </tr>
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
                        <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Search Customer</h4></div>
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
                                        <label for="" class="form-label">Search by phone</label>
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
</div>
