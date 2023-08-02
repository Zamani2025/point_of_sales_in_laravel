<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">User ID</label>
            <input type="text" value="{{$userDetails->id}}" readonly class="form-control">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">User Name</label>
            <input type="text" value="{{$userDetails->name}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">User Email</label>
            <input type="text" value="{{$userDetails->email}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">User Phone</label>
            <input type="text" value="{{$userDetails->phone}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">User Role</label>
            <input type="text" value="{{$userDetails->role}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">SSNIT Number</label>
            <input type="text" value="{{$userDetails->ssnit_number}}" class="form-control" readonly>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Date</label>
            <input type="text" value="{{$userDetails->date}}" class="form-control" readonly>
        </div>
    </div>
</div>

<style>
    input:read-only{
        background: #fff !important;
    }
</style>
