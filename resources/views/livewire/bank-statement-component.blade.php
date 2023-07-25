<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                        <h4 style="float:left; color: #fff;">Bank Statements</h4>
                        <a href="" style="float:right; text-decoration:none;" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                            <i class="fa fa-plus"></i> Add Statement
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Branch Name</th>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                    <th>Amount Deposit</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($searchStatement)
                                    @forelse ($searchStatement as $key => $statement)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $statement->bank_name }}</td>
                                            <td>{{ $statement->account_name }}</td>
                                            <td>{{ $statement->account_number }}</td>
                                            <td>{{ number_format($statement->amount, 2) }}</td>
                                            <td>{{ $statement->date }}</td>
                                            <td>
                                                <a href="" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7"><h5 class="text-center text-danger">Search result not found!</h5></td>
                                        </tr>
                                    @endforelse
                                @else
                                    @foreach ($statements as $key => $statement)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $statement->bank_name }}</td>
                                            <td>{{ $statement->account_name }}</td>
                                            <td>{{ $statement->account_number }}</td>
                                            <td>{{ number_format($statement->amount, 2) }}</td>
                                            <td>{{ $statement->date }}</td>
                                            <td>
                                                <a href="" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            {{$statements->links("pagination::bootstrap-4")}}
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Search Statement</h4></div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form wire:submit.prevent="searchStatementByAmount">
                                <div class="form-group">
                                    <label for="" class="form-label">Search by amount</label>
                                    <input type="search" wire:model="searchByamount" class="form-control" placeholder="Type here...">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <form wire:submit.prevent="searchStatementByDate">
                                <div class="form-group">
                                    <label for="" class="form-label">Search by date</label>
                                    <input type="datetime-local" wire:model="searchBydate" class="form-control" placeholder="Type here...">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal right fade" id="addProductModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addUserModalLabel">Add Statement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="POST" action="{{ route('bank.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" required name="bank_name" id="bank_name" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input type="text" required name="account_name" id="account_name" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="number" required name="account_number" id="account_number" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" required name="amount" id="amount" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="datetime-local" required name="date" id="date" class="form-control"/>

                        </div>
                        <div class="modal-fotter">
                            <button class="btn btn-block btn-primary" type="submit">Save Statement</button>
                            <button class="btn btn-block btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
