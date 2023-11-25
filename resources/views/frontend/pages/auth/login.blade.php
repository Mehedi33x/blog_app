@extends('frontend.master')
@section('content')
    <div class="mt-5">
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                            class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form action="{{ route('doweblogin') }}" method="post">
                            @csrf
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <h3>
                                Login
                                </h3>
                            </div><br>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Email</label>
                                <input name='email' type="email" id="form3Example3" class="form-control form-control-lg"
                                    placeholder="Enter email" />
                            </div>
                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input name='password' type="password" id="form3Example4"
                                    class="form-control form-control-lg" placeholder="Enter password" />
                            </div>

                            <div class="d-flex justify-content-between align-items-center">

                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{route('register')}}"
                                        class="btn btn-danger btn-lg">Register</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
