@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('color.create') }}" class="btn btn-primary">Create Color
            <i class="fa-solid fa-palette text-lg opacity-10 ms-1" style="color: white;"></i></a>

        <hr class="horizontal dark mt-0">
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colors as $color)
                <tr>
                    <td>{{ $color->name }}</td>
                    <td>
                        <div class="d-inline btn m-1" style="height:20px; background-color:{{ $color->name }}" class="m-3">
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('color.edit', $color->slug) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('color.destroy', $color->slug) }}" class="d-inline" method="POST"
                            onsubmit="return confirm('Do You Want To Delete ?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" id="" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $colors->links() }}
@endsection
