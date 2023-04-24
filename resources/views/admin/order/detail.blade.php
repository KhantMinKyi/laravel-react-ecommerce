@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4">
                <h5>{{ $order->product->name }}</h5>
                <img src={{ $order->product->img_url }} class="img img-thumbnail" style="width:200px">
                <div class="mt-2">
                    <span> Category : <b>{{ $order->product->category->name }}</b></span>
                </div>
                <div class="mt-2">
                    <span> Brand : <b>{{ $order->product->brand->name }}</b></span>
                </div>
                <div class="mt-2">
                    <h6>Available Color :</h6>
                    @foreach ($order->product->color as $c)
                        <div class="d-inline btn m-1" style="height:20px; background-color:{{ $c->name }}"
                            class="m-3"></div>
                    @endforeach
                </div>
                <div class="mt-2">
                    <span> Description : <b>{{ $order->product->description }}</b></span>
                </div>
            </div>
            <div class="col-md-9 col-lg-8 table-responsive">
                <table class="table">
                    <thead class="bg-dark">
                        <tr class="text-white">
                            <th>#</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">
                                Image
                            </td>
                            <td>
                                <img src={{ $order->user->img_url }} class="img img-thumbnail rounded-circle"
                                    style="width:80px">
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $order->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $order->user->phone }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $order->user->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $order->user->phone }}</td>
                        </tr>
                        <tr>
                            <td>Deliver Address</td>
                            <td>{{ $order->user->address }}</td>
                        </tr>

                    </tbody>
                </table>
                <hr class="horizontal dark">
                <table class="table">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>#</th>
                            <th>Order Detaill</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Order Color</td>
                            <td><b>{{ $order->color }}</b></td>
                        </tr>
                        <tr>
                            <td>Total Quantity</td>
                            <td>{{ $order->total_quantity }}</td>
                        </tr>
                        <tr>
                            <td>Sale Price</td>
                            <td>{{ $order->product->sale_price }} Ks</td>
                        </tr>
                        <tr>
                            <td>Total Price</td>
                            <td>{{ $order->product->sale_price * $order->total_quantity }} Ks</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                @if ($order->status == 'success')
                                    <span class="badge bg-primary">Success</span>
                                @elseif ($order->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-danger">Cancel</span>
                                @endif

                            </td>

                        </tr>
                        <tr>
                            <td></td>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
