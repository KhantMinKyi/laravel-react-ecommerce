@extends('admin.layout.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <style>
        .select2-selection {
            height: 45px !important;
            border-radius: 10px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 40px !important;
        }
    </style>
@endsection
@section('content')
    <div>
        <a href="{{ route('product.index') }}" class="btn btn-dark">All Products</a>
    </div>
    <hr class="horizontal dark ml-0">
    <form action="{{ route('product.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8 col-md-12">
                {{-- Product Detail Card --}}
                <div class="card p-4 mb-2">
                    <small class="text-muted">Product Detail</small>
                    <hr class="horizontal dark">
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">Enter Product Name</label>
                        <input type="text" name="name" class="form-control" id="" placeholder="Product Name"
                            value="{{ $product->name }}"
                            @error('name')
                            style="border-color:red;"
                        @enderror>
                        {{-- error name --}}
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">Choose Product Image</label>
                        <input type="file" name="image" class="form-control" id=""
                            placeholder="Choose Product Image"
                            @error('image')
                            style="border-color:red;"
                            @enderror>
                        {{-- error image --}}
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <img src="{{ asset('/images/' . $product->image) }}" class="img-thumbnail" style="height:150px;"
                            alt="">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">Enter Product Description</label>
                        <textarea name="description" class="form-control" id="description"
                            @error('description')
                        style="border-color:red;"
                        @enderror>

                    {{ $product->description }}
                    </textarea>
                        {{-- error description --}}
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                {{-- Product Price Card --}}
                <div class="card p-4">
                    <small class="text-muted"> Product Price</small>
                    <hr class="horizontal dark">
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">Total Quantity</label>
                        <input type="number" name="total_quantity" class="form-control" id=""
                            placeholder="Product Total" value="{{ $product->total_quantity }}"
                            @error('total_quantity')
                            style="border-color:red;"
                            @enderror>
                        {{-- error total_quantity --}}
                        @error('total_quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">Buy Price </label>
                        <input type="number" name="buy_price" class="form-control" id="" placeholder="Buy Price"
                            value="{{ $product->buy_price }}"
                            @error('buy_price')
                        style="border-color:red;"
                        @enderror>
                        {{-- error buy_price --}}
                        @error('buy_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">Sale Price </label>
                        <input type="number" name="sale_price" class="form-control" id="" placeholder="Sale Price"
                            value="{{ $product->sale_price }}"
                            @error('sale_price')
                            style="border-color:red;"
                            @enderror>
                        {{-- error sale_price --}}
                        @error('sale_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">No Discount Price </label>
                        <input type="number" name="discount_price" class="form-control" id=""
                            placeholder="Discount Price" value="{{ $product->discount_price }}"
                            @error('discount_price')
                            style="border-color:red;"
                            @enderror>
                        {{-- error discount_price --}}
                        @error('discount_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card p-4 ">
                    <small class="text-muted"> Product Tags</small>
                    <hr class="horizontal dark">
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">Choose Supplier</label>
                        <select name="supplier_id" id="supplier" class="form-control">
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" @if ($product->supplier_id == $supplier->id) selected @endif>
                                    {{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        {{-- error supplier_id --}}
                        @error('supplier_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">Choose Category</label>
                        <select name="category_slug" id="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug }}" @if ($product->category_id == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        {{-- error category_slug --}}
                        @error('category_slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">Choose Brand</label>
                        <select name="brand_slug" id="brand" class="form-control">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->slug }}" @if ($product->brand_id == $brand->id) selected @endif>
                                    {{ $brand->name }}</option>
                            @endforeach
                        </select>
                        {{-- error brand_slug --}}
                        @error('brand_slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="text-sm text-dark">Choose Color</label>
                        <select name="color_slug[]" id="color" class="form-control" multiple>
                            @foreach ($colors as $color)
                                <option value="{{ $color->slug }}"
                                    @foreach ($product->color as $product_color)
                                    @if ($product_color->id == $color->id) selected @endif @endforeach>
                                    {{ $color->name }}</option>
                            @endforeach
                        </select>
                        {{-- error color_slug --}}
                        @error('color_slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            $('#supplier').select2();
            $('#category').select2();
            $('#brand').select2();
            $('#color').select2();

            $('#description').summernote({
                callbacks: {
                    onImageUpload: function(files) {
                        var frmData = new FormData();
                        frmData.append('image', files[0]);
                        frmData.append('_token', "@php
                            echo csrf_token();
                        @endphp")
                        $.ajax({
                            method: 'POST',
                            url: '/admin/product-upload',
                            data: frmData,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                $('#description').summernote('insertImage', data);
                            }
                        })
                    }
                }
            });
        });
    </script>
@endsection
