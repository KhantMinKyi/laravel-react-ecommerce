@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('brand.create') }}" class="btn btn-primary">Create Brand
            <i class="fa-solid fa-bag-shopping text-lg" style="color: white;"></i></a>

        <hr class="horizontal dark mt-0">
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->name }}</td>
                    <td>
                        <a href="{{ route('brand.edit', $brand->slug) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('brand.destroy', $brand->slug) }}" class="d-inline" method="POST"
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
    {{ $brands->links() }}
@endsection
