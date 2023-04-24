@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-10 col-sm">
            <h4>Add Transactions - Total (<b class="text-primary">{{ $addTransactions->count() }}</b>)</h4>
            <hr class="horizontal dark my-2">
        </div>
        <div class="col-md-2 col-sm">
            <a href="{{ route('admin.view.remove-product.transaction') }}" class="btn btn-sm btn-dark">Remove Lists</a>
        </div>
    </div>
    <div class="mt-4 table-responsive">

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Supplier</th>
                    <th>Total</th>
                    <th>Buy Date</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addTransactions as $addTransaction)
                    <tr>
                        <td><img src="{{ asset('/images/' . $addTransaction->product->image) }}" alt=""
                                style="width:80px; height:80px;"></td>
                        <td>{{ $addTransaction->product->name }}</td>
                        <td>{{ $addTransaction->supplier->name }}</td>
                        <td>{{ $addTransaction->total_quantity }}</td>
                        <td>{{ date('d-m-Y', strtotime($addTransaction->created_at)) }}</td>
                        <td>{{ $addTransaction->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $addTransactions->links() }}
    </div>
@endsection
