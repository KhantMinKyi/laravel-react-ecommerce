@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('outcome.create') }}" class="btn btn-primary"> Create Outcome
            <i class="fas fa-sack-dollar text-lg ms-1" style="color: white;"></i>
        </a>
        <button class="btn btn-outline-danger">Outcome - {{ $today_outcome }} Ks </button>
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
            <a href="{{ route('outcome.index') }}" class="btn btn-danger">Clear</a>
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
            @foreach ($outcomes as $outcome)
                <tr>
                    <td>{{ $outcome->title }}</td>
                    <td>{{ $outcome->date }}</td>
                    <td>{{ $outcome->amount }} Ks</td>
                    <td>{{ $outcome->description }}</td>
                    <td>
                        <a href="{{ route('outcome.edit', $outcome->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('outcome.destroy', $outcome->id) }}" method="POST" class="d-inline"
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
    {{ $outcomes->links() }}
@endsection
