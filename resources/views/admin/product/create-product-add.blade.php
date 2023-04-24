@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>Adding For
                <b class="text-primary">{{ $product->name }}</b>
            </h3>
        </div>
        <div class="col-md-4">
            <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">All Product</a>
            <a href="{{ route('admin.create-product-remove', $product->slug) }}" class="btn btn-sm btn-dark">Remove
                Transaction</a>
        </div>
        <hr class="horizontal dark my-3">
    </div>
    <div class="row">
        <div class="col-md-3 col-sm">
            <img src="{{ asset('/images/' . $product->image) }}" alt="" class="img-thumbnail" style="height:200px;">
        </div>
        <div class="col-md-9 col-sm">
            <p>Product Name :<b> {{ $product->name }}</b></p>
            <p>Total Quantity :<b> {{ $product->total_quantity }}</b></p>
            <p>Product Category :<b> {{ $product->category->name }}</b></p>
            <p>Product Brand :<b> {{ $product->brand->name }}</b></p>
            <p>Description :<b> {!! $product->description !!}</b></p>
        </div>
        <hr class="horizontal dark my-3">
    </div>
    <div>
        <form action="{{ route('admin.create-product-add', $product->slug) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="" class="text-sm">Choose Supplier</label>
                <select name="supplier_id" class="form-control">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" class="text-sm">Enter Total Quantity</label>
                <input type="number" class="form-control" name="total_quantity" placeholder="Total Quantity"
                    @error('total_quantity')
                    style="border-color: red "
                @enderror>
                @error('total_quantity')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="" class="text-sm">Enter Description</label>
                <input type="text" class="form-control" name="description" placeholder="Description"
                    @error('description')
                style="border-color: red "
            @enderror>

                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <input type="submit" value="Add" class="btn btn-dark">
        </form>
    </div>
@endsection
