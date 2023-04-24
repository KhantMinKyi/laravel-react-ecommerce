@extends('admin.layout.master')

@section('content')
    <div>
        <a href="{{ route('order.list') }}" class="btn btn-dark"> All Orders
            <i class="fa-solid fa-list text-md ms-1" style="color: white;"></i>
        </a>
        <a href="{{ url('/admin/order?status=success') }}" class="btn btn-primary"> Success
        </a>
        <a href="{{ url('/admin/order?status=pending') }}" class="btn btn-warning"> Pending
        </a>
        <a href="{{ url('/admin/order?status=cancel') }}" class="btn btn-danger"> Cancel
        </a>
        <hr class="horizontal dark mt-0" />
    </div>
    <div class="table-responsive">


        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Sale Price</th>
                    <th>User Info</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            <a href={{ route('order.detail', $order->id) }}>
                                <img src={{ $order->product->img_url }} class="img img-thumbnail" style="width:80px">
                            </a>
                        </td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->total_quantity }}</td>
                        <td>{{ $order->total_quantity * $order->product->sale_price }} Ks</td>
                        <td>{{ $order->user->name }}</td>
                        <td>
                            @if ($order->status == 'success')
                                <span class="badge bg-primary">Success</span>
                            @elseif ($order->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @else
                                <span class="badge bg-danger">Cancel</span>
                            @endif
                        </td>
                        <td>
                            @if ($order->status == 'pending')
                                <a href={{ url('/admin/order-update?id=' . $order->id . '&status=success') }}
                                    class="btn btn-primary">Confirm</a>
                                <a href={{ url('/admin/order-update?id=' . $order->id . '&status=cancel') }}
                                    class="btn btn-danger">Cancel</a>
                            @else
                                <span class="badge bg-dark">Done</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
@endsection
