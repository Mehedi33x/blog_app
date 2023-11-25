@extends('backend.partials.master')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection

@section('content')
    <a href="{{ route('post.create') }}" class="btn btn-primary my-3">Add Post</a>
    <table id='post-table' class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Blog</th>
                <th scope="col">Status</th>
                <th scope="col">Posted by</th>
                <th scope="col">Action</th>
                <th scope="col">Accept</th>
                <th scope="col">Reject</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blog as $key => $data)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ ucfirst($data->title) }}</td>
                    <td>{{ ucfirst($data->category->name) }}</td>
                    <td>
                        <img style="height: 80px;width:80px" src="{{ url('/uploads/blog/', $data->image) }}">
                    </td>
                    <td>{{ $data->blog }}</td>
                    <td>{{ ucfirst($data->is_publish) }}</td>
                    <td>{{ ucfirst($data->user->name) }}</td>
                    <td>
                        <div class="container">
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('post.show', $data->id) }}"><i
                                            class="fas fa-eye"></i>View</a>
                                    <a class="dropdown-item" href="{{ route('post.edit', $data->id) }}"><i
                                            class="fas fa-edit"></i>Edit</a>
                                    <a class="dropdown-item" href="{{ route('post.delete', $data->id) }}"
                                        onclick="return confirm('Are you sure to Delete?')"><i
                                            class="fas fa-trash"></i>Delete</a>


                                </div>
                            </div>
                        </div>
                    </td>

                    <td>
                        <a href="{{ route('post.accept', $data->id) }}" class="btn btn-primary my-2">Accept</a>

                    </td>
                    <td>
                        <a href="{{ route('post.reject', $data->id) }}" class="btn btn-danger my-2">Reject</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#post-table').DataTable();
        });
    </script>

    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
@endsection
