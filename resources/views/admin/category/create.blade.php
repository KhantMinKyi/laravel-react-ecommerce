@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('category.index') }}" class="btn btn-dark">View All Category
            <i class="fa-solid fa-sitemap text-lg ms-1" style="color: white;"></i></a>
    </div>
    <hr class="horizontal dark mt-0" />
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="" class="text-sm">Enter Category Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Category Name"
                @if ($errors->has('name')) style="border-color:red" @endif>
            {{-- Error Message --}}
            @if ($errors->has('name'))
                <span class="text-sm text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="" class="text-sm">Enter Category Name (MM)</label>
            <input type="text" name="mm_name" class="form-control" placeholder="Enter Category Name (MM)"
                @if ($errors->has('mm_name')) style="border-color:red" @endif>
            {{-- Error Message --}}
            @if ($errors->has('mm_name'))
                <span class="text-sm text-danger">{{ $errors->first('mm_name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="" class="text-sm">Choose Image</label>
            <input type="file" name="image" class="form-control" placeholder="Choose Category Image"
                @if ($errors->has('image')) style="border-color:red" @endif>
            {{-- Error Message --}}
            @if ($errors->has('image'))
                <span class="text-sm text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>
        <input type="submit" value="Create"class="btn btn-primary">
    </form>
@endsection
