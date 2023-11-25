<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Blogs</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- THEME CSS
 ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Themify -->
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/slick-carousel/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/slick-carousel/slick.css') }}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- manin stylesheet -->
    <link rel="stylesheet" href="{{ url('frontend/assets/css/style.css') }}">
    {{-- toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    {{-- header --}}
    @include('frontend.fixed.header')
    {{-- sadska --}}
    @if (Route::is('webhome', 'all.blog', 'cate.wise.blog'))
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="subscribe-footer text-center">
                    <div class="form-group mb-0 mt-4">
                        <div class="form-group form-row align-items-center mb-0">
                            <div class="col-sm-9">
                                <form action="{{ route('blog.search') }}" method="post">
                                    @csrf
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Search Your Blog">
                                    <button type="submit" class="col-sm-3 btn btn-dark mt-3 ">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- body  --}}
    @yield('content')

    {{-- #footer --}}
    @include('frontend.fixed.footer')

    <!-- THEME JAVASCRIPT FILES
================================================== -->
    <!-- initialize jQuery Library -->
    <script src="{{ url('frontend/assets/plugins/jquery/jquery.js') }}"></script>
    <!-- Bootstrap jQuery -->
    <script src="{{ url('frontend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('frontend/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <!-- Owl caeousel -->
    <script src="{{ url('frontend/assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('frontend/assets/plugins/slick-carousel/slick.min.js') }}"></script>
    <script src="{{ url('frontend/assets/plugins/magnific-popup/magnific-popup.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ url('frontend/assets/plugins/instafeed-js/instafeed.min.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script src="{{ url('frontend/assets/') }}plugins/google-map/gmap.js"></script>
    <!-- main js -->
    <script src="{{ url('frontend/assets/js/custom.js') }}"></script>
    {{-- bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    {{-- toastr --}}
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

</body>

</html>
