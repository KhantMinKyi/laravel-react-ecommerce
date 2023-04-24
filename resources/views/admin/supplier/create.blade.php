@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('supplier.index') }}" class="btn btn-dark">View All Supplier
            <i class="fa-solid fa-users text-lg ms-1" style="color: white;"></i></a>
    </div>
    <hr class="horizontal dark mt-0" />
    <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="" class="text-sm">Enter Supplier Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Supplier Name"
                @if ($errors->has('name')) style="border-color:red" @endif>
            {{-- Error Message --}}
            @if ($errors->has('name'))
                <span class="text-sm text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="" class="text-sm">Choose Image</label>
            <input type="file" name="image" class="form-control" placeholder="Choose Supplier Image"
                @if ($errors->has('image')) style="border-color:red" @endif>
            {{-- Error Message --}}
            @if ($errors->has('image'))
                <span class="text-sm text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="" class="text-sm">Enter Description</label>
            <textarea type="text" name="description" class="form-control" placeholder="Enter Description"
                @if ($errors->has('description')) style="border-color:red" @endif></textarea>
            {{-- Error Message --}}
            @if ($errors->has('description'))
                <span class="text-sm text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
        <input type="submit" value="Create"class="btn btn-primary">
    </form>
@endsection
