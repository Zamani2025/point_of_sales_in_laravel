<table class="table table-striped table-left">
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Alert Stock</th>
            @if(Auth::user()->is_admin)
                <th>Edit</th>
                <th>Delete</th>
            @endif
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
                    <td>
                        @if( $product->alert_stock >= $product->quantity)
                            <span class="badge badge-danger">Low Stock > {{$product->alert_stock}}</span>
                        @else
                            <span class="badge badge-success">{{$product->alert_stock}}</span>
                        @endif()
                    </td>
                    @if(Auth::user()->is_admin)
                        <td><a href="#"  data-toggle="modal" data-target="#editProductModal{{$product->id}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit fa-lg"></i></a></td>
                        <td><a href="{{ route('deleteproduct', ['id' => $product->id]) }}"  onclick="confirm('Are you sure, You want to delete this product?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a></td>
                        <form action="{{route('deleteproduct', ['id' => $product->id])}}" id="formId" style="display: none;" method="POST">
                            @csrf
                        </form>
                    @endif
                </tr>
                @include('products.edit')
            @empty
                <tr>
                    <td colspan="7"><h5 class="text-center text-danger">Search result not found!</h5></td>
                </tr>
            @endforelse
        @else
            @foreach ($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="cursor:pointer;" data-toggle="tooltip" data-placement="right" title="Click to view detail" wire:click.prevent="ProductDetails({{ $product->id }})">{{$product->name}}</td>
                    <td>{{number_format($product->price, 2)}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>
                        @if( $product->alert_stock >= $product->quantity)
                            <span class="badge badge-danger">Low Stock > {{$product->alert_stock}}</span>
                        @else
                            <span class="badge badge-success">{{$product->alert_stock}}</span>
                        @endif()
                    </td>
                    @if(Auth::user()->is_admin)
                        <td><a href="#"  data-toggle="modal" data-target="#editProductModal{{$product->id}}" class="btn btn-primary btn-sm" ><i class="fa fa-edit fa-lg"></i></a></td>
                        <td><a href="{{ route('deleteproduct', ['id' => $product->id]) }}"  onclick="confirm('Are you sure, You want to delete this product?') || event.stopImmediatePropagation(); event.preventDefault(); document.getElementById('formId').submit();" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a></td>
                        <form action="{{route('deleteproduct', ['id' => $product->id])}}" id="formId" style="display: none;" method="POST">
                            @csrf
                        </form>
                    @endif
                </tr>
                @include('products.edit')
            @endforeach
        @endif
    </tbody>
    {{$products->links("pagination::bootstrap-4")}}
</table>
