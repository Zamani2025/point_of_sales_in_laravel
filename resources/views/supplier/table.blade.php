<table class="table table-striped table-left">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            @if(Auth::user()->is_admin)
                <th>Edit</th>
                <th>Delete</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @if($searchSupplier )
            @forelse ($searchSupplier as $key => $supplier)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="Click to view detail" wire:click.prevent="SupplierDetail('{{ $supplier->id }}  ')">{{$supplier->name}}</td>
                    <td>{{$supplier->phone}}</td>
                    <td>{{$supplier->email}}</td>
                    <td>{{$supplier->address}}</td>
                    @if(Auth::user()->is_admin)
                        <td><a href="#"  data-toggle="modal" data-target="#editProductModal{{$supplier->id}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit fa-lg"></i></a></td>
                        <td><a href="{{ route('deletesupplier', ['id' => $supplier->id]) }}"  onclick="confirm('Are you sure, You want to delete this supplier?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a></td>
                        <form action="{{route('deletesupplier', ['id' => $supplier->id])}}" id="formId" style="display: none;" method="POST">
                            @csrf
                        </form>
                    @endif
                </tr>

                <!-- Modal -->
                <div class="modal right fade" id="editProductModal{{$supplier->id}}" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="editProductModalLabel">Edit Supplier</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('editsupplier', ['id' => $supplier->id])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input type="text" value="{{$supplier->name}}" name="name" id="name" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" value="{{$supplier->phone}}" name="phone" id="phone" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="phone">Email</label>
                                    <input type="email" value="{{$supplier->email}}" name="email" id="password" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="phone">Address</label>
                                    <input type="address" value="{{$supplier->address}}" name="address" id="password" class="form-control"/>

                                </div>
                                <div class="modal-fotter">
                                    <button class="btn btn-block btn-primary" type="submit">Edit Product</button>
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
        @else
            @foreach ($suppliers as $key => $supplier)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="Click to view detail" wire:click.prevent="SupplierDetail('{{ $supplier->id }}  ')">{{$supplier->name}}</td>
                    <td >{{$supplier->phone}}</td>
                    <td>{{$supplier->email}}</td>
                    <td>{{$supplier->address}}</td>
                    @if(Auth::user()->is_admin)
                        <td><a href="#"  data-toggle="modal" data-target="#editProductModal{{$supplier->id}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit fa-lg"></i></a></td>
                        <td><a href="{{ route('deletesupplier', ['id' => $supplier->id]) }}"  onclick="confirm('Are you sure, You want to delete this supplier?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a></td>
                        <form action="{{route('deletesupplier', ['id' => $supplier->id])}}" id="formId" style="display: none;" method="POST">
                            @csrf
                        </form>
                    @endif
                </tr>

                <!-- Modal -->
                <div class="modal right fade" id="editProductModal{{$supplier->id}}" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="editProductModalLabel">Edit Supplier</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('editsupplier', ['id' => $supplier->id])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input type="text" value="{{$supplier->name}}" name="name" id="name" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" value="{{$supplier->phone}}" name="phone" id="phone" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="phone">Email</label>
                                    <input type="email" value="{{$supplier->email}}" name="email" id="password" class="form-control"/>

                                </div>
                                <div class="form-group">
                                    <label for="phone">Address</label>
                                    <input type="address" value="{{$supplier->address}}" name="address" id="password" class="form-control"/>

                                </div>
                                <div class="modal-fotter">
                                    <button class="btn btn-block btn-primary" type="submit">Edit Product</button>
                                    <button class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach

        @endif
    </tbody>
    {{$suppliers->links("pagination::bootstrap-4")}}
</table>
