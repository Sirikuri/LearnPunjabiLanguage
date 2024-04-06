@extends('admin.layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-6">
            <h1>Add Sticker</h1>
        </div>
    </div>

    <form action="{{ route('stickers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="sticker_img" class="form-label">Sticker Image</label>
            <input type="file" class="form-control" id="sticker_img" name="sticker_img" required accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Add Sticker</button>
    </form>
@endsection
