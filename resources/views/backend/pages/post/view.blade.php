@extends('backend.partials.master')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .data-item {
            margin-bottom: 15px;
        }

        .data-label {
            font-weight: bold;
        }

        .data-value {
            margin-left: 10px;
        }
    </style>

    <body>
        <div class="container">
            <h2 class="mb-3" style="text-align: center">Blog Details</h2>
            <hr>
            <div class="data-item">
                <span class="data-label">Title:</span>
                <span class="data-value">{{ $blog->title }}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Image:</span>
                <img style="height: 150px; width:130px" src="{{ url('/uploads/blog/', $blog->image) }}" alt="">
            </div>
            <div class="data-item">
                <span class="data-label">Category:</span>
                <span class="data-value">{{ $blog->category->name }}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Blog:</span>
                <span class="data-value">{{ $blog->blog }}</span>
            </div>
            <div class="data-item">
                <span class="data-label">Written By:</span>
                <span class="data-value">{{ $blog->user->name }}</span>
            </div>

            <!-- Add more data items as needed -->
        </div>
    </body>
@endsection
