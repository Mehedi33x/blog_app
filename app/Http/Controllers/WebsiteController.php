<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    public function webhome()
    {

        // $categories = Category::all();
        // $posts = Post::where('is_publish', '=', 'publish')->paginate(5);
        // return view('frontend.partials.webhome', compact('posts', 'categories'));
        $blogs = Post::with('category', 'user')->latest()->take(12)->get();
        // dd($posts);
        return view('frontend.pages.home', compact('blogs'));
    }

    public function showpost($id)
    {

        $post = Post::find($id);
        $comment = Comment::where('post_id', $post->id)->get();
        return view('frontend.pages.post.singlepost', compact('post', 'comment'));
    }

    public function latestpost()
    {
        $latestpost = Post::where('is_publish', '=', 'publish')->orderby('id', 'desc')->take(2)->get();

        return view('frontend.pages.post.latest', compact('latestpost'));
    }


    


    public function userprofile()
    {

        $posts = Post::where('user_id', auth()->user()->id)->where('is_publish', 'publish')->get();

        $user = User::where('id', auth()->user()->id)->get();

        return view('frontend.pages.profile.userprofile', compact('user', 'posts'));
    }

    // public function changelang($lang)
    // {

    //     App::setLocale($lang);
    //     session()->put('locale', $lang);

    //     return redirect()->route('webhome');
    // }
}
