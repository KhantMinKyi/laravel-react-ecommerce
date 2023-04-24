@extends('admin.layout.master')
@section('content')
    <div>
        <div>
            <a href="{{ route('income.create') }}" class="btn btn-primary"> Create Income
                <i class="fas fa-sack-dollar text-lg ms-1" style="color: white;"></i>
            </a>
            <button class="btn btn-outline-danger">Income - {{ $today_income }} Ks </button>
            <span class="ms-2">Date (
                @if ($date)
                    {{ $date }}
                @else
                    Today
                @endif
                )
            </span>
        </div>
        <div class="d-flex flex-row-reverse">
            <form action="">
                <input type="date" class="btn btn-dark" name="date">
                <input type="submit" class="btn btn-dark" value="Search">
                <a href="{{ route('income.index') }}" class="btn btn-danger">Clear</a>
            </form>
        </div>
        <hr class="horizontal dark mt-0" />
    </div>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Amount </th>
                <th>Description</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $income)
                <tr>
                    <td>{{ $income->title }}</td>
                    <td>{{ $income->date }}</td>
                    <td>{{ $income->amount }} Ks</td>
                    <td>{{ $income->description }}</td>
                    <td>
                        <a href="{{ route('income.edit', $income->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('income.destroy', $income->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Do You Want To Delete ?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $incomes->links() }}
@endsection
