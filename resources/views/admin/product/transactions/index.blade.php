@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-8 col-sm">
            <h4>Product Transactions</h4>
            <hr class="horizontal dark my-2">
        </div>
        <div class="col-md-4 col-sm">
            <a href="{{ route('admin.view.add-product.transaction') }}" class="btn btn-sm btn-dark">Add Lists</a>
            <a href="{{ route('admin.view.remove-product.transaction') }}" class="btn btn-sm btn-dark">Remove Lists</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-6 col-md rounded mt-4 table-responsive">
            <h5 class="text-primary">Add Transactions - {{ $addTransactions->count() }} </h5>
            <hr class="horizontal dark my-2">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Supplier</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($addTransactions as $addTransaction)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $addTransaction->product->name }}</td>
                            <td>{{ $addTransaction->supplier->name }}</td>
                            <td>{{ $addTransaction->total_quantity }}</td>
                            <td>{{ date('d-m-Y', strtotime($addTransaction->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $addTransactions->links() }}
        </div>
        <div class="col-lg-6 col-md rounded mt-4 table-responsive" style="background-color: #FBFBFB">
            <h5 class="text-dark">Remove Transactions - {{ $removeTransactions->count() }}</h5>
            <hr class="horizontal dark my-2">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Supplier</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($removeTransactions as $removeTransaction)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $removeTransaction->product->name }}</td>
                            <td>{{ $removeTransaction->supplier->name }}</td>
                            <td>{{ $removeTransaction->total_quantity }}</td>
                            <td>{{ date('d-m-Y', strtotime($removeTransaction->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $removeTransactions->links() }}
        </div>
    </div>
@endsection
