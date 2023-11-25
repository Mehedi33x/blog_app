@extends('frontend.master')
@section('content')
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2 class="lg-title">Post</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-1 padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="images/contact.jpg" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <p class="mt-5 mb-5">Something splashing about in the pool a little way off, and she swam nearer
                                to make out what it was: at first she thought it must be a walrus or hippopotamus, but then
                                she remembered how small she was now, and she soon made out that it was only a mouse that
                                had slipped in like herself.</p>

                            <h2 class="mb-4" style="text-align: center">Write Your Blog</h2>

                            <form action="{{ route('user.blog.update', $blogs->id) }}" method="POST" id="contact-form"
                                class="contact-form" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title (required)</label>
                                            <input class="form-control form-control-name" name="title" id="title"
                                                value="{{ $blogs->title }}" type="text" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">Blog Category (required)</label>
                                            <select class="form-group" name="category" id="">
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="blog">Your Blog</label>
                                            <textarea class="form-control form-control-message" name="blog" id="blog" rows="7" required>{{ $blogs->blog }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Image (required)</label>
                                            <div>
                                                <img style="width: 120px;height:120px;"
                                                    src="{{ url('/uploads/blog/', $blogs->image) }}" alt=""
                                                    srcset="">
                                            </div>
                                            <input class="form-control form-control-image" name="image" id="image"
                                                type="file" required>
                                        </div>

                                        <button class="btn btn-primary solid blank mt-3" type="submit">Update Blog</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </section>
@endsection
