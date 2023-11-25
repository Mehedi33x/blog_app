@extends('frontend.master')
@section('content')
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-3 col-md-6">
                                <article class="post-grid mb-5">
                                    <a class="post-thumb mb-4 d-block" href="blog-single.html">
                                        <img style="width:255px;height:255px;" src="{{ url('/uploads/blog', $blog->image) }}"
                                            alt="">
                                    </a>
                                    <span
                                        class="cat-name text-color font-extra text-sm text-uppercase letter-spacing-1">{{ $blog->category->name }}</span>
                                    <h3 class="post-title mt-1"><a
                                            href="{{ route('single.blog', $blog->id) }}">{{ $blog->title }}</a>
                                    </h3>

                                    <span class="text-muted letter-spacing text-uppercase font-sm">Written By-
                                        {{ $blog->user->name }}</span>

                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="m-auto">
                    <div class="pagination mt-5 pt-4">
                        <ul class="list-inline ">
                            <li class="list-inline-item"><a href="#" class="active">1</a></li>
                            <li class="list-inline-item"><a href="#">2</a></li>
                            <li class="list-inline-item"><a href="#">3</a></li>
                            <li class="list-inline-item"><a href="#" class="prev-posts"><i
                                        class="ti-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
