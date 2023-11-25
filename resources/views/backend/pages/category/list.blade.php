@extends('backend.partials.master')
@section('content')
    <div class=" mx-4 my-4">
        <div>
            <a href="{{ route('category.create') }}" class="btn btn-success">Add Category</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Blog Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $key => $data)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td><img style="height: 120px;width: 120px;" src="{{ url('/uploads/category', $data->image) }}"
                                alt=""></td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ Str::ucfirst($data->status) }}</td>
                        <td>
                            <div class="container">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('category.edit', $data->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('category.delete', $data->id) }}"
                                            onclick="return confirm('Are you sure to Delete?')"><i
                                                class="fa-solid fa-trash"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
