@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                                <h4 style="float:left; color: #fff;">Products Barcodes</h4>
                                
                            </div>
                            <div class="card-body">
                                <div id="print">
                                    <div class="row">
                                        @forelse($products as $item)
                                            <div class="col-lg-3 col-md-4 col-sm-12 mt-3 text-center">
                                                <div class="card">
                                                    <div class="card-body" style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding-top: 30px;">
                                                        {!! $item->barcode !!}
                                                        <h4  style="padding: 1em; margin-top: 20px;">{{$item->product_code}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
