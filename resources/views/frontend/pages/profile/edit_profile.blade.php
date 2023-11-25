@extends('frontend.master')
@section('content')
    <section class="single-block-wrapper section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <form action="{{ route('store.profile') }}" method="POST" class="comment-form mb-5 gray-bg p-5"
                        id="comment-form" enctype="multipart/form-data">
                        @csrf
                        <h3 class="mb-4 text-center">Edit Profile</h3>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        placeholder="Name:" value="{{ auth()->user()->name }}">
                                </div>
                                <div class="alert-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input class="form-control" type="email" name="email" id="mail"
                                        placeholder="Email:" value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input class="form-control" type="text" name="address" id="address"
                                        value="{{ auth()?->user()?->address }}" placeholder="Address:">
                                </div>
                                <div class="alert-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Profession</label>
                                    <input class="form-control" type="text" name="profession" id="profession"
                                        value="{{ auth()?->user()?->profession }}" placeholder="Profession:">
                                </div>
                                <div class="alert-danger">
                                    {{ $errors->first('profession') }}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="">About Yourself</label>
                                <textarea class="form-control mb-3" name="about_user" id="about_user" cols="30" rows="5"
                                    placeholder="About Yourself">{{ auth()?->user()?->about_user }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input class="form-control" type="password" name="password" id="password"
                                        placeholder="Password:">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Profile Photo</label>
                                    <input class="form-control" type="file" name="image" id="image"
                                        placeholder="Image:">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Update Profile</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
