<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro ID</label>
            <input type="text" value="{{$products_details->id}}" readonly class="form-control">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Name</label>
            <input type="text" value="{{$products_details->name}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Code</label>
            <input type="text" value="{{$products_details->product_code}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Price</label>
            <input type="text" value="{{$products_details->price}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Qty</label>
            <input type="text" value="{{$products_details->quantity}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Pro Stock</label>
            <input type="text" value="{{$products_details->alert_stock}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group" style="text-align:center !important; padding-left: 15%">
            <span style="text-align: center">
                {!! $products_details->barcode !!}
            </span>
        </div>
        <h5 class="mt-3 text-center">{{$products_details->product_code}}</h5>
    </div>
</div>

<style>
    input:read-only{
        background: #fff !important;
    }
</style>