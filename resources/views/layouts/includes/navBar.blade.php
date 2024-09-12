<li class="nav-item">
    <a href="/" class="btn btn-outline "><i class="fa fa-home"></i></a>
</li>
@auth
<li class="nav-item">
    <a href="{{route('estimate')}}" class="btn btn-outline ">Estimate</a>
</li>
<li class="nav-item">
    <a href="{{route('employee')}}" class="btn btn-outline ">Employees</a>
</li>
<li class="nav-item">
    <a href="{{route('products')}}" class="btn btn-outline ">Products</a>
</li>
<li class="nav-item">
    <a href="{{route('orders')}}" class="btn btn-outline ">Cashire</a>
</li>
<li class="nav-item">
    <a href="{{route('transaction')}}" class="btn btn-outline ">Transactions</a>
</li>
<li class="nav-item">
    <a href="{{route('supplier')}}" class="btn btn-outline ">Suppliers</a>
</li>
<li class="nav-item">
    <a href="{{route('customer')}}" class="btn btn-outline ">Customers</a>
</li>
<li class="nav-item">
    <a href="{{route('incomingproduct')}}" class="btn btn-outline ">Out Of Stock</a>
</li>
<li class="nav-item">
    <a href="{{route('products.code')}}" class="btn btn-outline ">BarCodes</a>
</li>
<li class="nav-item">
    <a href="{{route('bank')}}" class="btn btn-outline ">Bank Statements</a>
</li>
@if (Auth::check())
    @if (Auth::user()->is_admin)
        <li class="nav-item">
            <a href="{{route('return_products')}}" class="btn btn-outline ">Return Products</a>
        </li>
    @endif
@endif
@endauth

<style>
    .btn-outline{
        border-color: #008B8B;
        color: #008B8B;
    }
    .btn-outline:hover{
        background: #008B8B;
        color: #fff;
    }
    a {
        margin-right: 10px;
    }
</style>
