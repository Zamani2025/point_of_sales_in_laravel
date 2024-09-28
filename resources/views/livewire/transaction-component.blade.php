<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-3" style="background: rgb(52, 73, 94) !important;">
                <h4 style="float:left; color: #fff;">Transactions</h4>

            </div>
            <div class="card-body">
                <div id="print">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Paid</th>
                                        <th>Balance</th>
                                        <th>Order ID</th>
                                        <th>Method</th>
                                        <th> Date</th>
                                    </tr>
                                </thead>
                                @if ($searchTransaction)
                                    <tbody>
                                        @forelse ($searchTransaction as $key => $transaction)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$transaction->order->name}}</td>
                                                <td>{{number_format($transaction->transac_amount, 2)}}</td>
                                                <td>{{number_format($transaction->paid_amount, 2)}}</td>
                                                <td>{{$transaction->balance}}</td>
                                                <td>{{$transaction->order_ids}}</td>
                                                <td>{{$transaction->payment_method}}</td>
                                                <td>{{$transaction->created_at->toFormattedDateString()}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7"><h5 class="text-center text-danger">Search result not found!</h5></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                @else
                                    <tbody>
                                        @foreach($transactions as $key => $transaction)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td><a href="{{ route('printtrans', $transaction->id) }}" style="text-decoration: none; color: black;">{{$transaction->order->name}}</a></td>
                                                <td>{{number_format($transaction->transac_amount, 2)}}</td>
                                                <td>{{number_format($transaction->paid_amount, 2)}}</td>
                                                <td>{{$transaction->balance}}</td>
                                                <td>{{$transaction->order_ids}}</td>
                                                <td>{{$transaction->payment_method}}</td>
                                                <td>{{$transaction->created_at->toFormattedDateString()}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
        <div class="card-header p-3" style="background: rgb(52, 73, 94); color: #fff;"><h4>Search Transaction</h4></div>
        <div class="card-body">
            <div class="col-md-12">
                <form wire:submit.prevent="searchTransactionByName">
                    <div class="form-group">
                        <label for="" class="form-label">Search by Order ID</label>
                        <input type="number" wire:model="searchByName" class="form-control" placeholder="Type here...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12 mt-4">
                <form wire:submit.prevent="searchTransactionByDate">
                    <div class="form-group">
                        <label for="" class="form-label">Search by date</label>
                        <input type="date" wire:model="searchByDate" class="form-control" placeholder="Type here...">
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
