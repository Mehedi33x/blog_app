@extends('frontend.master')
@section('content')
    <section class="single-block-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="single-post">
                        <div class="post-header mb-5 text-center">
                            <div class="meta-cat">
                                <a class="post-category font-extra text-color text-uppercase font-sm letter-spacing-1"
                                    href="#">{{ $blog_details->category->name }}</a>

                            </div>
                            <h2 class="post-title mt-2">
                                {{ ucfirst($blog_details->title) }}
                            </h2>

                            <div class="post-meta">
                                <span class="text-uppercase font-sm letter-spacing-1 mr-3">by Liam</span>
                                <span class="text-uppercase font-sm letter-spacing-1">January 17,2019</span>
                            </div>
                            <div class="post-featured-image mt-5">
                                <img style="width: 730px;height:430px;"
                                    src="{{ url('/uploads/blog', $blog_details->image) }}" class="img-fluid w-100"
                                    alt="featured-image">
                            </div>
                        </div>
                        <div class="post-body">
                            <div class="entry-content">
                                <p>{{ ucfirst($blog_details->blog) }}</p>
                            </div>

                            <div class="post-tags py-4">
                                <a href="#">#Health</a>
                                <a href="#">#Game</a>
                                <a href="#">#Tour</a>
                            </div>


                            <div
                                class="tags-share-box center-box d-flex text-center justify-content-between border-top border-bottom py-3">
                            </div>
                        </div>
                    </div>

                    <div class="post-author d-flex my-5">
                        {{-- <div class="author-img">
                            <img alt="" src="images/author.jpg" class="avatar avatar-100 photo" width="100"
                                height="100">
                        </div> --}}

                        {{-- <div class="author-content pl-4">
                            <h4 class="mb-3"><a href="#" title="" rel="author"
                                    class="text-capitalize">Themefisher</a></h4>
                            <p>Hey there. My name is Liam. I was born with the love for traveling. I also love taking photos
                                with my phone in order to capture moment..</p>

                            <a target="_blank" class="author-social" href="#"><i class="ti-facebook"></i></a>
                            <a target="_blank" class="author-social" href="#"><i class="ti-twitter"></i></a>
                            <a target="_blank" class="author-social" href="#"><i class="ti-google-plus"></i></a>
                            <a target="_blank" class="author-social" href="#"><i class="ti-instagram"></i></a>
                            <a target="_blank" class="author-social" href="#"><i class="ti-pinterest"></i></a>
                            <a target="_blank" class="author-social" href="#"><i class="ti-tumblr"></i></a>
                        </div> --}}
                    </div>
                    <nav class="post-pagination clearfix border-top border-bottom py-4">
                    </nav>
                    <div class="related-posts-block mt-5">


                    </div>

                    {{-- <div class="comment-area my-5">
                        <h3 class="mb-4 text-center">2 Comments</h3>
                        <div class="comment-area-box media">
                            <img alt="" src="images/blog-user-2.jpg" class="img-fluid float-left mr-3 mt-2">

                            <div class="media-body ml-4">
                                <h4 class="mb-0">Micle harison </h4>
                                <span class="date-comm font-sm text-capitalize text-color"><i class="ti-time mr-2"></i>June
                                    7, 2019 </span>

                                <div class="comment-content mt-3">
                                    <p>Lorem ipsum dolor sit amet, usu ut perfecto postulant deterruisset, libris causae
                                        volutpat at est, ius id modus laoreet urbanitas. Mel ei delenit dolores.</p>
                                </div>
                                <div class="comment-meta mt-4 mt-lg-0 mt-md-0">
                                    <a href="#" class="text-underline ">Reply</a>
                                </div>
                            </div>
                        </div>

                        <div class="comment-area-box media mt-5">
                            <img alt="" src="images/blog-user-3.jpg" class="mt-2 img-fluid float-left mr-3">

                            <div class="media-body ml-4">
                                <h4 class="mb-0 ">John Doe </h4>
                                <span class="date-comm font-sm text-capitalize text-color"><i class="ti-time mr-2"></i>June
                                    7, 2019 </span>

                                <div class="comment-content mt-3">
                                    <p>Some consultants are employed indirectly by the client via a consultancy staffing
                                        company. </p>
                                </div>
                                <div class="comment-meta mt-4 mt-lg-0 mt-md-0">
                                    <a href="#" class="text-underline">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <form class="comment-form mb-5 gray-bg p-5" id="comment-form">
                        <h3 class="mb-4 text-center">Leave a comment</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" id="name"
                                        placeholder="Name:">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="mail" id="mail"
                                        placeholder="Email:">
                                </div>
                            </div>
                        </div>

                        <input class="btn btn-primary" type="submit" name="submit-contact" id="submit_contact"
                            value="Submit Message">
                    </form> --}}

                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        <div class="sidebar-wrap mt-5 mt-lg-0">
                            <div class="sidebar-widget about mb-5 text-center p-3">
                                <div class="about-author">
                                    <img src="{{ url('/uploads/user', $blog_details->user->image) }}" alt=""
                                        class="img-fluid">
                                </div>
                                <h4 class="mb-0 mt-4"></h4>
                                <p><b>Written By- </b> {{ $blog_details->user->name }}</p>
                                <p><b>Porfession:</b> {{ $blog_details->user->profession }}</p>
                                <p><b>About:</b> {{ $blog_details->user->about_user }}</p>
                                <img src="images/liammason.png" alt="" class="img-fluid">
                            </div>



                            <div class="sidebar-widget sidebar-adv mb-5">
                                <a href="#"><img src="images/sidebar-banner3.png" alt=""
                                        class="img-fluid w-100"></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
