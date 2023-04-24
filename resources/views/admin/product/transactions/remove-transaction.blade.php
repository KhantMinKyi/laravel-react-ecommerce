@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-10 col-sm">
            <h4>Remove Transactions - Total (<b class="text-primary">{{ $removeTransactions->count() }}</b>)</h4>
            <hr class="horizontal dark my-2">
        </div>
        <div class="col-md-2 col-sm">
            <a href="{{ route('admin.view.add-product.transaction') }}" class="btn btn-sm btn-dark">Add Lists</a>
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
                    <th>Remove Date</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($removeTransactions as $removeTransaction)
                    <tr>
                        <td><img src="{{ asset('/images/' . $removeTransaction->product->image) }}" alt=""
                                style="width:80px; height:80px;"></td>
                        <td>{{ $removeTransaction->product->name }}</td>
                        <td>{{ $removeTransaction->supplier->name }}</td>
                        <td>{{ $removeTransaction->total_quantity }}</td>
                        <td>{{ date('d-m-Y', strtotime($removeTransaction->created_at)) }}</td>
                        <td>{{ $removeTransaction->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $removeTransactions->links() }}
    </div>
@endsection
