@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            <h1>Categories</h1>

            <a href="{{ route('admin.categories.create') }}" class="btn btn-default">New Category</a>

            <br><br>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Products</th>
                    <th>Action</th>
                </tr>

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->products->count() }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">Edit</a> |
                            <a href="{{ route('admin.categories.destroy', ['id' => $category->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </table>

            {!! $categories->render() !!}

        </div>
    </div>
@endsection