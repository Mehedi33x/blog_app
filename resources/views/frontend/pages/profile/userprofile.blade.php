@extends('frontend.master')
@section('content')

    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card">
                        <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                                <img src="{{ url('/uploads/user', auth()->user()->image) }}" alt="Generic placeholder image"
                                    class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                <a href="{{ route('edit.profile') }}"class="btn btn-info" data-mdb-ripple-color="dark"
                                    style="z-index: 1;">
                                    Edit profile</a>

                            </div>

                        </div>

                    </div>
                    <div class="p-4 text-black" style="background-color: #f8f9fa;">
                        <div class="d-flex justify-content-end text-center py-1">
                            <div>
                                <p class="mb-1 h5">{{ count($posts) }}</p>
                                <span>Posts</span>
                            </div>
                            <div class="px-3">
                                <p class="mb-1 h5">1026</p>
                                <span>Followers</span>
                            </div>
                            <div>
                                <p class="mb-1 h5">478</p>
                                <span>Following</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 text-black">
                        <div class="mb-5">
                            <p class="lead fw-normal mb-1">About</p>
                            <div class="p-4" style="background-color: #f8f9fa;">
                                <h5>Name: {{ auth()->user()->name }}</h5>
                                <span>Email: {{ auth()->user()->email }}</span><br>
                                <span>Prosession: {{ auth()->user()->profession }}</span><br>
                                <span>Address: {{ auth()->user()->address }}</span><br>
                                <span>About Me: {{ auth()->user()->address }}</span><br>
                            </div>
                            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase"
                                    href="{{ route('user.blogs') }}">My Blogs →</a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0">Recent posts</p>
                                <!-- <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p> -->
                            </div>

                            <div class="container px-4 px-lg-5">
                                <div class="row gx-4 gx-lg-5 justify-content-center">
                                    <div class="col-md-10 col-lg-8 col-xl-7">
                                        <!-- Post preview-->
                                        @if (count($posts) > 0)
                                            @foreach ($posts as $data)
                                                <div class="post-preview">
                                                    <a href="{{ route('singlepost.show', $data->id) }}">
                                                        <h2 class="post-title">{{ $data->title }}</h2>
                                                        <!-- <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3> -->
                                                        <img src="{{ url('/uploads/blog', $data->image) }}"
                                                            style="width:20%" alt="image">
                                                    </a>
                                                    <p class="post-meta">
                                                        Posted by
                                                        {{ $data->name }}
                                                        <br>
                                                        {{ $data->institute }}
                                                        {{ $data->profession }}
                                                        {{ $data->created_at }}
                                                    </p>


                                                </div>
                                            @endforeach
                                        @else
                                            <h3>No post added yet</h3>
                                        @endif
                                        <!-- Divider-->
                                        <hr class="my-4" />
                                        <!-- Divider-->
                                        <hr class="my-4" />
                                        <!-- Pager-->
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
