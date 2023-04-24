@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('color.index') }}" class="btn btn-primary">View All Color
            <i class="fa-solid fa-palette text-lg opacity-10 ms-1" style="color: white;"></i></a>
    </div>
    <hr class="horizontal dark mt-0" />
    <form action="{{ route('color.update', $color->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="" class="text-sm">Enter Color Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Color Name"
                value="{{ $color->name }}" @if ($errors->has('name')) style="border-color:red" @endif>
            {{-- Error Message --}}
            @if ($errors->has('name'))
                <span class="text-sm text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <input type="submit" value="Update"class="btn btn-primary">
    </form>
@endsection
