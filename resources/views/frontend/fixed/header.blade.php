<header class="header-top bg-grey justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-4 text-center d-none d-lg-block">
                {{-- <a class="navbar-brand " href="index.html">
              <img src="{{url('frontend/assets/images/logo.png')}}" alt="" class="img-fluid">
            </a> --}}
            </div>

            <div class="col-lg-8 col-md-12">
                <nav class="navbar navbar-expand-lg navigation-2 navigation">
                    {{-- <a class="navbar-brand text-uppercase d-lg-none" href="#">
              <img src="{{url('frontend/assets/images/logo.png')}}" alt="" class="img-fluid">
            </a> --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                        aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="ti-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar-collapse">
                        <ul id="menu" class="menu navbar-nav mx-auto">
                            <li class="nav-item"><a href="{{ route('webhome') }}" class="nav-link">Home</a></li>
                            {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Home
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.html">Home 1</a>

                            </div>
                        </li> --}}
                            <li class="nav-item"><a href="{{ route('all.blog') }}" class="nav-link">All Blogs</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('all.blog') }}" id="navbarDropdown2"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Blog Posts
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                    @foreach ($category as $cat)
                                        <a class="dropdown-item"
                                            href="{{ route('cate.wise.blog', $cat->id) }}">{{ $cat->name }}</a>
                                    @endforeach


                                </div>
                            </li>

                            <li class="nav-item"><a href="{{ route('create.post') }}" class="nav-link">Make Post</a>
                            </li>

                            {{-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> --}}
                            @if (auth()->user())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ auth()->user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a>

                                        <a class="dropdown-item" href="{{ route('web.logout') }}">Logout</a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item"><a href="{{ route('weblogin') }}" class="nav-link">Login</a></li>
                            @endif
                        </ul>

                        {{-- <ul class="list-inline mb-0 d-block d-lg-none">
                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                      <li class="list-inline-item"><a href="#"><i class="ti-twitter"></i></a></li>
                      <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                      <li class="list-inline-item"><a href="#"><i class="ti-pinterest"></i></a></li>
                        </ul> --}}

                    </div>
                </nav>
            </div>

            {{-- <div class="col-lg-2 col-md-4 col-6">
                <div class="header-socials-2 text-right d-none d-lg-block">
                    <ul class="list-inline mb-0">
                        asada
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</header>
