@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('income.index') }}" class="btn btn-dark">View All Income
            <i class="fas fa-sack-dollar text-lg ms-1" style="color: white;"></i></a>
    </div>
    <hr class="horizontal dark mt-0" />
    <form action="{{ route('income.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="" class="text-sm">Enter Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title"
                @if ($errors->has('title')) style="border-color:red" @endif>
            {{-- Error Message --}}
            @if ($errors->has('title'))
                <span class="text-sm text-danger">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="" class="text-sm">Enter Amount </label>
            <input type="number" name="amount" class="form-control" placeholder="Enter Amount"
                @if ($errors->has('amount')) style="border-color:red" @endif>
            {{-- Error Message --}}
            @if ($errors->has('amount'))
                <span class="text-sm text-danger">{{ $errors->first('amount') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="" class="text-sm">Enter Date </label>
            <input type="date" name="date" class="form-control" placeholder="Enter Date"
                @if ($errors->has('date')) style="border-color:red" @endif>
            {{-- Error Message --}}
            @if ($errors->has('date'))
                <span class="text-sm text-danger">{{ $errors->first('date') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="" class="text-sm">Enter Description </label>
            <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
        </div>
        <input type="submit" value="Create"class="btn btn-primary">
    </form>
@endsection
