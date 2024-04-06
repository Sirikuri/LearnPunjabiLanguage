@extends('admin.layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-6">
            <h1>Topics</h1>
        </div>
        <div class="col-6 text-end">
        <a href="{{ route('topics.create') }}" class="btn btn-primary">Add topic</a>
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
                <th>Sub Category</th>
                <th>quesion image</th>
                <th>question audio</th>
                <th>answer image</th>
                <th>answer audio</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($topics as $topic)
                <tr>
                <td>{{ $topic->id }}</td>
                    <td>{{ $topic->name }}</td>
                    <td>{{ $topic->category->name }}</td>
                    <td>{{ $topic->subcategory->name }}</td>
                    
                    <td><img src="{{ asset('images/'.$topic->question_image) }}" width ="60px" hight ="60px"alt="Image"></td>
                    <td><audio controls>
												<source src="{{ asset('audios/'.$topic->question_audio) }}" type="audio/mpeg">
												Your browser does not support the audio element.
											</audio></td>
                    
                    <td><img src="{{ asset('images/'.$topic->answer_image) }}" width ="60px" hight ="60px"alt="Image"></td>
                    <td><audio controls>
												<source src="{{ asset('audios/'.$topic->answer_audio) }}" type="audio/mpeg">
												Your browser does not support the audio element.
											</audio></td>
                    <td>
                        <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
                        <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" style="display: inline-block;">
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
