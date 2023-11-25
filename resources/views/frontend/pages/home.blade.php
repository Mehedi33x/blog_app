@extends('frontend.master')
@section('content')
    <section class="slider mt-4">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-lg-12 col-sm-12 col-md-12 slider-wrap">
                    <div class="slider-item">
                        <div class="slider-item-content">
                            <div class="post-thumb mb-4">
                                <a href="blog-single.html">
                                    <img src="{{ url('/frontend/assets/images/slider/slider1.jpg') }}" alt=""
                                        class="img-fluid">
                                </a>
                            </div>

                            <div class="slider-post-content">
                                <span
                                    class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">Lifestyle</span>
                                <h3 class="post-title mt-1"><a href="blog-single.html">Tips for Taking a Long-term Trip</a>
                                </h3>
                                <span class=" text-muted  text-capitalize">January 2, 2019</span>
                            </div>
                        </div>
                    </div>

                    <div class="slider-item">
                        <div class="slider-item-content">
                            <div class="post-thumb mb-4">
                                <a href="blog-single.html">
                                    <img src="{{ url('/frontend/assets/images/slider/slider2.jpg') }}" alt=""
                                        class="img-fluid">
                                </a>
                            </div>
                            <div class="slider-post-content">
                                <span
                                    class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">Travel</span>
                                <h3 class="post-title mt-1"><a href="blog-single.html">Trip to California</a></h3>
                                <span class=" text-muted  text-capitalize">September 15, 2019</span>
                            </div>
                        </div>
                    </div>

                    <div class="slider-item">
                        <div class="slider-item-content">
                            <div class="post-thumb mb-4">
                                <a href="blog-single.html">
                                    <img src="{{ url('/frontend/assets/images/slider/slider3.jpg') }}" alt=""
                                        class="img-fluid">
                                </a>
                            </div>
                            <div class="slider-post-content">
                                <span
                                    class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">weekends</span>
                                <h3 class="post-title mt-1"><a href="blog-single.html">Our Favorite Weekend Getaways</a>
                                </h3>
                                <span class=" text-muted  text-capitalize">June 12, 2019</span>
                            </div>
                        </div>
                    </div>

                    <div class="slider-item">
                        <div class="slider-item-content">
                            <div class="post-thumb mb-4">
                                <a href="blog-single.html">
                                    <img src="{{ url('/frontend/assets/images/slider/slider2.jpg') }}" alt=""
                                        class="img-fluid">
                                </a>
                            </div>

                            <div class="slider-post-content">
                                <span
                                    class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">Travel</span>
                                <h3 class="post-title mt-1"><a href="blog-single.html">Trip to California</a></h3>
                                <span class=" text-muted  text-capitalize">September 15, 2019</span>
                            </div>
                        </div>
                    </div>

                    <div class="slider-item">
                        <div class="slider-item-content">
                            <div class="post-thumb mb-4">
                                <a href="blog-single.html">
                                    <img src="{{ url('/frontend/assets/images/slider/slider3.jpg') }}" alt=""
                                        class="img-fluid">
                                </a>
                            </div>

                            <div class="slider-post-content">
                                <span
                                    class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">Travel</span>
                                <h3 class="post-title mt-1"><a href="blog-single.html">Trip to California</a></h3>
                                <span class=" text-muted  text-capitalize">September 15, 2019</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <h1 style="text-align: center" class="mb-3">Latest Blogs</h1>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">

                        @foreach ($blogs as $blog)
                            <div class="col-lg-3 col-md-6">
                                <article class="post-grid mb-5">
                                    <a class="post-thumb mb-4 d-block" href="blog-single.html">
                                        <img style="width:255px;height:255px;"
                                            src="{{ url('/uploads/blog', $blog->image) }}" alt="">
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

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
