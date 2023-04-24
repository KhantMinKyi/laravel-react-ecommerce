@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('brand.index') }}" class="btn btn-primary">View All Brand
            <i class="fa-solid fa-bag-shopping text-lg" style="color: white;"></i></a>
    </div>
    <hr class="horizontal dark mt-0" />
    <form action="{{ route('brand.update', $brand->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="" class="text-sm">Enter Brand Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Brand Name"
                value="{{ $brand->name }}" @if ($errors->has('name')) style="border-color:red" @endif>
            {{-- Error Message --}}
            @if ($errors->has('name'))
                <span class="text-sm text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <input type="submit" value="Update"class="btn btn-primary">
    </form>
@endsection
