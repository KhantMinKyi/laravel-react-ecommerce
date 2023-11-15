@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('product.create') }}" class="btn btn-primary"> Create Product
            <i class="fa-solid fa-sitemap text-lg ms-1" style="color: white;"></i>
        </a>
        <hr class="horizontal dark mt-0" />
    </div>

    <div class="table-responsive">


        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Total</th>
                    <th>Add or Delete</th>
                    <th>Option</th>
                    <th>Colors</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td style="text-align: center"><img src="{{ asset('/images/' . $product->image) }}" alt=""
                                style="height: 100px;"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->total_quantity }}</td>
                        <td>
                            <a href="{{ route('admin.create-product-remove', $product->slug) }}"
                                class="btn btn-warning">-</a>
                            <a href="{{ route('admin.create-product-add', $product->slug) }}" class="btn btn-success">+</a>
                        </td>
                        <td>
                            <a href="{{ route('product.edit', $product->slug) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('product.destroy', $product->slug) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Do You Want To Delete ?')">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                        <td>
                            @foreach ($product->color as $c)
                                <div class="d-inline btn m-1" style="height:20px; background-color:{{ $c->name }}"
                                    class="m-3"></div>
                            @endforeach

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $products->links() }}
@endsection
