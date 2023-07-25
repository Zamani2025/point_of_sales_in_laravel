
<div class="container-fluid">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                                <h4 style="float:left; color: #fff;">Suppliers</h4>
                                @if(Auth::user()->is_admin)
                                    <a href="" style="float:right; text-decoration:none;" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                                        <i class="fa fa-plus"></i> Add Supplier
                                    </a>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @include('supplier.table')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        @if($supplierDetails)
                            <div class="card">
                                <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Supplier Details</h4></div>
                                <div class="card-body">
                                    @include('supplier.details')
                                </div>
                            </div>
                        @else
                            <div class="card">
                            <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Search Supplier</h4></div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <form action="" method="post" wire:submit.prevent="searchSupplierByName">
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
                                    <form action="" method="post" wire:submit.prevent="searchSupplierByPhone">
                                        <div class="form-group">
                                            <label for="" class="form-label">Search by phone</label>
                                            <input type="search" wire:model="searchByPhone" class="form-control" placeholder="Type here...">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Model of adding user --->

        <!-- Modal -->
        <div class="modal right fade" id="addProductModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addUserModalLabel">Add Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('addsupplier')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" wire:model="name" id="name" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" wire:model="price" id="phone" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="phone">Email</label>
                            <input type="email" name="email" id="password" wire:model="quantity" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="email">Address</label>
                            <input type="text" name="address" id="email" wire:model="stock" class="form-control"/>

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
