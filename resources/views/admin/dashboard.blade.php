@extends('admin.layout.master')
@section('content')
    <div class="row">
        {{-- income --}}
        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card p-3">
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center justify-content-left me-2">
                        <i class="fa fa-dollar text-lg text-primary"></i>
                    </div>
                    <div class="align-items-center p-2 justify-content-center">
                        <h5>Daily Income</h5>
                        <h5>{{ $daily_income_amount }} Ks</h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- outcome --}}
        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card p-3">
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center justify-content-left me-2">
                        <i class="fa fa-dollar text-lg text-danger"></i>
                    </div>
                    <div class="align-items-center p-2 justify-content-center">
                        <h5>Daily Outcome</h5>
                        <h5>{{ $daily_outcome_amount }} Ks</h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- Products Counts --}}
        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card p-3">
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center justify-content-left me-2">
                        <i class="fa fa-box text-lg text-primary"></i>
                    </div>
                    <div class="align-items-center p-2 justify-content-center">
                        <h5>Products</h5>
                        <h5>{{ $products }}</h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- Customer / user --}}
        <div class="col-sm-6 col-md-3 mb-4">
            <div class="card p-3">
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center justify-content-left me-2">
                        <i class="fa fa-users text-lg text-dark"></i>
                    </div>
                    <div class="align-items-center p-2 justify-content-center">
                        <h5>Customers</h5>
                        <h5>{{ $users }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="horizontal dark">
    <div class="row">
        {{-- Proucts Sale by Month Chart --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h6>Proucts Sale by Month</h6>
                    <canvas id="saleChart"></canvas>
                </div>
            </div>
        </div>
        {{-- Income Outcome Chart --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card p-2">
                <div class="card-body">
                    <h6>Income/Outcome</h6>
                    <canvas id="incomeoutcomeChart"></canvas>
                </div>
            </div>
        </div>
        <hr class="horizontal dark mt-4">
        {{-- Products Instoke Table --}}
        <div class="col-sm-12 col-md-6 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6>Products Instokes </h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product_instokes as $product_instoke)
                                <tr>
                                    <td>{{ $product_instoke->name }}</td>
                                    <td><img src={{ $product_instoke->img_url }} style="width:50px"
                                            class="img img-thumbnail">
                                    </td>
                                    <td> <span class="badge bg-danger">{{ $product_instoke->total_quantity }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Suppliers --}}
        <div class="col-sm-12 col-md-6 mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h6>Latest Suppliers</h6>
                    <a href="/admin/supplier" class="btn btn-primary">All Suppliers</a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($suppliers as $supplier)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src="{{ asset('/images/' . $supplier->image) }}" alt="" width="50px">
                                <span><b>{{ $supplier->name }}</b></span>
                                <span>{{ $supplier->created_at }}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <hr class="horizontal dark mt-4">
        {{-- Users Views --}}
        <div class="col-sm-12 col-md-6 mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h6>Latest Users</h6>
                    <span class="btn btn-dark">All Users</span>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($latest_users as $latest_user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src={{ $latest_user->img_url }} width="50px">
                                <span><b>{{ $latest_user->name }}</b></span>
                                <span>{{ $latest_user->email }}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        {{-- Admin Views --}}
        <div class="col-sm-12 col-md-6 mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h6>Admins</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($admins as $admin)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img src={{ $admin->img_url }} width="50px">
                                <span><b>{{ $admin->name }}</b></span>
                                <span>{{ $admin->email }}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('saleChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Proucts Sale by Month',
                    data: @json($saleProducts),
                    borderWidth: 1,
                    backgroundColor: '#A7C61B',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        const inOut = document.getElementById('incomeoutcomeChart');

        new Chart(inOut, {
            type: 'line',
            data: {
                labels: @json($daymonth),
                datasets: [{
                        label: 'Income ',
                        data: @json($incomeData),
                        borderWidth: 2,
                        borderColor: '#A7C61B',
                    }, {
                        label: 'Outcome',
                        data: @json($outcomeData),
                        borderWidth: 2,
                        borderColor: 'red',
                    }

                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
