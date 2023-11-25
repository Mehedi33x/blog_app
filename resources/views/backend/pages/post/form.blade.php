@extends('backend.partials.master')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-weight: bold;
        }


        input[type="text"],
        input[type="file"],
        input[type="number"],
        input[type="status"],


        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f7f7f7;
            color: #333;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <div class="container">

        <h2>Write Your Blog</h2>

        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <div class="alert-danger">
                    {{ $errors->first('title') }}
                </div>
            </div>

            <div class="form-group">
                <label for="status">Blog Category:</label>
                <select id="status" name="category_id" required>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Blog:</label>
                <textarea name="blog" id="blog" cols="90" rows="10"></textarea>
                <div class="alert-danger">
                    {{ $errors->first('blog') }}
                </div>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>

        </form>

    </div>
@endsection
