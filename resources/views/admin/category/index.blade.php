@extends('admin.layout.master')
@section('content')
    <div>
        <a href="{{ route('category.create') }}" class="btn btn-primary"> Create Category
            <i class="fa-solid fa-sitemap text-lg ms-1" style="color: white;"></i>
        </a>
        <hr class="horizontal dark mt-0" />
    </div>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Myanmar Name</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td><img src="{{ asset('/images/' . $category->image) }}" alt="" style="height:100px; "></td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->mm_name }}</td>
                    <td>
                        <a href="{{ route('category.edit', $category->slug) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('category.destroy', $category->slug) }}" method="POST" class="d-inline"
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
    {{ $categories->links() }}
@endsection
