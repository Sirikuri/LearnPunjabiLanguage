@extends('admin.layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-6">
            <h1>Sub Category</h1>
        </div>
        <div class="col-6 text-end">
        <a href="{{ route('subcategories.create') }}" class="btn btn-primary">Add subCategory</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                 <th>id</th>
                <th> Name</th>
                <th> Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $subcategory)
                <tr>
                <td>{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->category->name }}</td>
                   <td>
                        <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
                        <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
