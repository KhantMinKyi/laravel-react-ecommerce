@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('supplier.create') }}" class="btn btn-primary"> Create Supplier
            <i class="fa-solid fa-users text-lg ms-1" style="color: white;"></i>
        </a>
        <hr class="horizontal dark mt-0" />
    </div>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td><img src="{{ asset('/images/' . $supplier->image) }}" alt="" style="height:100px; "></td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->description }}</td>
                    <td>
                        <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" class="d-inline"
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
    {{ $suppliers->links() }}
@endsection
