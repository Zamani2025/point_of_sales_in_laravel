@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><marquee behavior="" direction="">Welcome To The New View Constructions Limited Point Of Sales</marquee></h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2 px-2 bg-primary text-white">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs text-white font-weight-bold text-primary text-uppercase mb-1">
                                                    Today Sales</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $todaySales }} Items</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2 px-2 bg-success text-white">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                                    Today Revenue</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">₵ {{ number_format($todayRevenue, 2) }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2 px-2 bg-primary text-white">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs text-white font-weight-bold text-primary text-uppercase mb-1"><a target="_blank" href="{{ route('monthly') }}" class="text-white font-weight-bold text-decoration-none">Monthly Sales</a></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a target="_blank" href="{{ route('monthly') }}" class="text-white font-weight-bold text-decoration-none">{{ $monthlySales}} Items</a></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2 px-2 bg-success text-white">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                                    Monthly Revenue</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">₵ {{ number_format($monthlyRevenue, 2) }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2 px-2 bg-primary text-white">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs text-white font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Sales</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSales }} Items</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2 px-2 bg-success text-white">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                                    Total Revenue</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">₵ {{ number_format($totalRevenue, 2) }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2 px-2 bg-secondary text-white">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs text-white font-weight-bold text-primary text-uppercase mb-1">
                                                    Products</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts }} Items</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-box fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2 px-2 bg-warning text-white">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                                    Coupons</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrders }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2 px-2 bg-dark text-white">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs text-white font-weight-bold text-primary text-uppercase mb-1">
                                                    Suplliers</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSuppliers }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-danger shadow h-100 py-2 px-2 bg-danger text-white">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                                    Out Of Stock</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalIncomingProducts }} Items</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-truck fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <canvas id="canvas1" height="300" width="750"></canvas>
                            </div>
                            <div class="col-md-6">
                                <canvas id="canvas2" height="300" width="750"></canvas>
                            </div>
                        </div>
                        <div class="row mt-5">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-3">
                <div class="card">
                    <div class="card-header p-3 bg-success text-white"><h4>Welcome Admin</h4></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">User ID</label>
                                    <input type="text" value="{{Auth::user()->id}}" readonly class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" value="{{Auth::user()->name}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" value="{{Auth::user()->email}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" value="{{Auth::user()->phone}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <input type="text" @if( Auth::user()->is_admin) value="Admin" @else value="Cashire" @endif class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection


@section('script')
    <script>
        const ctx = document.getElementById('canvas1');
        const ctx1 = document.getElementById('canvas2');
        var barColors = ["red", "green", "blue"];
        var barColors1 = ["red", "green", "blue"];

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Today Revenue', 'Monthly Revenue', 'Total Revenue'],
            datasets: [{
                label: 'New view construction limited Revenue Charts ',
                data: ['{{ $todayRevenue }}','{{ $monthlyRevenue }}','{{ $totalRevenue }}'],
                borderWidth: 2,
                borderColor: 'rgba(0, 0, 255, 0.1)',
                backgroundColor: barColors
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
        new Chart(ctx1, {
            type: 'bar',
            data: {
            labels: ['Today Sales', 'Monthly Sales', 'Total Sales'],
            datasets: [{
                label: 'New view construction limited Sales Charts',
                data: ['{{ $todaySales }}','{{ $monthlySales }}','{{ $totalSales }}'],
                borderWidth: 2,
                borderColor: 'rgba(0, 0, 255, 0.1)',
                backgroundColor: barColors1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>
@endsection
