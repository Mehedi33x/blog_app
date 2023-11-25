@extends('backend.partials.master')
@section('content')
    <link rel="stylesheet" href="{{ url('/backend/form.css') }}">
    <div class="container mt-5">
        <h1>Blog Category Create</h1>
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Blog Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            <div class="alert-danger">
                {{ $errors->first('name') }}
            </div>
            <br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Enter description" rows="5" required></textarea>
            <div class="alert-danger">
                {{ $errors->first('description') }}
            </div>
            <br>
            <label for="image">Blog Image:</label>
            <input type="file" id="image" name="image" required>
            <br>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
