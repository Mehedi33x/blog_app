@extends('frontend.master')
@section('content')
    <div class="mx-4 my-4">
        <h2 style="text-align: center">Your Posts</h2>
        <div class="mx-5 my-4">
            <div class="mx-4 my-4">
                <div class="mx-5 my-4">
                    <table id='post-table' class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Gallery</th>
                                <th scope="col">Title</th>
                                <th scope="col">Blog Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key => $blog)
                                <tr>
                                    <td><img style="height: 100px;width:100px"
                                            src="{{ url('/uploads/blog', $blog->image) }}" alt=""></td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->category->name }}</td>
                                    <td>{{ $blog->created_at }}</td>
                                    <td>
                                        <div class="container">
                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('single.blog', $blog->id) }}"><i
                                                            class="fas fa-eye"></i>View</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('user.blog.edit', $blog->id) }}"><i
                                                            class="fas fa-edit"></i>Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('user.blog.delete', $blog->id) }}"
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
                    <div class="m-auto">
                        <div class="pagination mt-5 pt-4">
                            <ul class="list-inline ">
                                {{ $blogs->links() }}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
