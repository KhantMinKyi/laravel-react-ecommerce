@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('color.index') }}" class="btn btn-dark">View All Color
            <i class="fa-solid fa-palette text-lg opacity-10 ms-1" style="color: white;"></i></a>
        <hr class="horizontal dark mt-0" />
    </div>
    <form action="{{ route('color.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="" class="text-sm">Enter Color </label>
            <input type="text" name="name" class="form-control" placeholder="Enter Color Name"
                @if ($errors->has('name')) style="border-color:red" @endif>
            @if ($errors->has('name'))
                <span class="text-sm text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <input type="submit" value="Create" class="btn btn-primary" id="">
    </form>
@endsection
