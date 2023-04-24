@extends('Layouts.master')
@section('header-text', 'Products')
@section('content')
    <div class="container mt-4">
        <div class="row">
            {{-- Left side /Category --}}
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                <div class="card ">
                    <div class="card-header bg-primary mb-3">
                        <h6 class="text-white">Categories</h6>
                    </div>
                    <ul>
                        <li class="list-group-item ">
                            @foreach ($categories as $category)
                                <a href={{ url('/products?category=') . $category->slug }}>
                                    <div class="row">


                                        <div class="col-9 col-sm-6 col-md-9">
                                            <img src={{ $category->img_url }} class="img img-thumbnail" style="width: 80px">
                                            <span
                                                class="ms-2">{{ app()->getLocale() == 'mm' ? $category->mm_name : $category->name }}</span>
                                        </div>
                                        <div class="col-3 col-sm-6 col-md-3">

                                            <small
                                                class=" float-right badge bg-primary mt-2">{{ $category->product_count }}</small>
                                        </div>
                                    </div>
                                </a>
                                <hr class="horizontal dark">
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Right Side Products Filter --}}
            <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card w-100 p-4">
                            <form action="">
                                <select name="category" class="btn btn-dark  ">
                                    <option value="">Category</option>
                                    @foreach ($categories as $category)
                                        <option value={{ $category->slug }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <select name="brand" class="btn btn-dark ">
                                    <option value="">Brands</option>
                                    @foreach ($brands as $brand)
                                        <option value={{ $brand->slug }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                <select name="color" class="btn btn-dark ">
                                    <option value="">Color</option>
                                    @foreach ($colors as $color)
                                        <option value={{ $color->slug }}>{{ $color->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="btn btn-white " name="search" placeholder="Enter Search">
                                <input type="submit" class="btn btn-primary " value="Search">
                                <a href={{ url('/products') }} class="btn btn-danger">Clear</a>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- All Products --}}
                <div class="row mt-4">
                    @foreach ($products as $product)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <a href={{ '/product/' . $product->slug }}>
                                <div class=" border rounded p-2">
                                    <img src={{ $product->img_url }} style="height:200px"
                                        class="rounded col-md-12 col-sm-12" />
                                    <div class="text-center">
                                        <div class="mt-2">
                                            <b>{{ $product->name }}</b>

                                        </div>
                                        <div class="mt-2">
                                            Category : <b>{{ $product->category->name }}</b>

                                        </div>
                                        <div class="mt-2">
                                            Brand : <b>{{ $product->brand->name }}</b>

                                        </div>
                                        <div class="mt-2">
                                            <span>Price : </span>
                                            <b class="badge bg-primary">{{ $product->sale_price }} Ks !</b>
                                            <p>
                                                <b>{{ $product->total_quantity }}</b> items
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </a>

                        </div>
                    @endforeach
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
