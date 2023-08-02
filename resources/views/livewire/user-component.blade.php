<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;">
                        <h4 style="float:left;">Employees</h4>
                        @if(Auth::user()->is_admin)
                            <a href="" style="float:right; text-decoration:none;" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                                <i class="fa fa-plus"></i> Add Employee
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('users.table')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    @if($userDetails)
                        <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Employee Details</h4></div>
                        <div class="card-body">
                            @include('users.user_detail')
                        </div>
                    @else
                        <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Search Employee</h4></div>
                        <div class="card-body">
                            <div class="btn-group btn-sm">
                                <button type="button"  class="btn btn-danger btn-sm"><a target="_blank" href="{{route('employeeinvoice')}}" style="text-decoration: none; color: #fff;"> <i class="fa fa-print"></i> Print Employees</a></button>
                                <button type="button" class="btn btn-primary btn-sm"><a href="{{route('employee.pdf')}}" style="text-decoration: none; color: #fff;"><i class="fa fa-file-pdf"></i> Export As PDF</a></button>
                            </div>
                            <div class="col-md-12">
                                <form action="" method="post" wire:submit.prevent="searchUserByName">
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
                                <form action="" method="post" wire:submit.prevent="searchUserByEmail">
                                    <div class="form-group">
                                        <label for="" class="form-label">Search by email</label>
                                        <input type="search" wire:model="searchByEmail" class="form-control" placeholder="Type here...">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Model of adding user --->

<!-- Modal -->
<div class="modal right fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="addUserModalLabel">Add Employee</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('adduser')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control"/>

                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control"/>

                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control"/>

                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" id="salary" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="ssnit_number">SSNIT Number</label>
                    <input type="text" name="ssnit_number" id="ssnit_number" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="salary">Date</label>
                    <input type="date" name="date" id="salary" class="form-control"/>
                </div>
                <div class="modal-fotter">
                    <button class="btn btn-block btn-primary" type="submit">Save Employee</button>
                    <button class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
