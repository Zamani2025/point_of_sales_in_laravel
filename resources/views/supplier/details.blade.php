<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Supplier ID</label>
            <input type="text" value="{{$supplierDetails->id}}" readonly class="form-control">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Supplier Name</label>
            <input type="text" value="{{$supplierDetails->name}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Supplier Email</label>
            <input type="text" value="{{$supplierDetails->email}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Supplier Phone</label>
            <input type="text" value="{{$supplierDetails->phone}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Supplier Address</label>
            <input type="text" value="{{$supplierDetails->address}}" class="form-control" readonly>
        </div>
    </div>
</div>

<style>
    input:read-only{
        background: #fff !important;
    }
</style>