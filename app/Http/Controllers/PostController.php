<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Post::with('gallery', 'category')->paginate('20');
        return view('backend.pages.post.list', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.pages.post.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'blog' => 'required',
            'image' => 'required',
        ]);
        // dd($request);
        $blog_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $blog_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/blog', $blog_image);
        }

        Post::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'blog' => $request->blog,
            'user_role' => 'admin',
            'image' => $blog_image,
            'is_publish' => 'is_publish'
        ]);

        toastr()->success('Blog created successfully');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Post::with('category', 'user')->find($id);
        // dd($blog);
        return view('backend.pages.post.view', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $blog = Post::find($id);
        return view('backend.pages.post.edit', compact('categories', 'blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Post::find($id);
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'blog' => 'required',
        ]);
        // dd($request->all());

        $blog_image = $request->image;
        if ($image = $request->file('image')) {
            if ($image = $request->file('image')) {
                if (file_exists(public_path('uploads/blog/' . $blog_image))) {
                    File::delete(public_path('uploads/blog/' . $blog_image));
                }
                $blog_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/blog/', $blog_image);
            }
        }
        $blog->update([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'blog' => $request->blog,
            'user_role' => 'admin',
            'image' => $blog_image,
            'is_publish' => 'is_publish'
        ]);

        toastr()->success('Blog created successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function postDelete($blog_id)
    {
        Post::find($blog_id)->delete();
        toastr()->success('Blog deleted successfully');
        return redirect()->back();
    }
    public function destroy($id)
    {
    }

    public function postaccept($id)
    {
        $post = Post::find($id);

        $post->is_publish = 'publish';
        $post->save();
        return redirect()->back()->with('message', 'post published');
    }
    public function postreject($id)
    {
        $post = Post::find($id);

        $post->is_publish = 'rejected';
        $post->save();
        return redirect()->back()->with('message', 'post rejected');
    }













    #frontend_blogs
    public function createpost()
    {
        $categories = Category::all();
        return view('frontend.pages.post.createpost', compact('categories'));
    }

    public function poststore(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'blog' => 'required',
            'image' => 'required',
        ]);

        if ($validate->fails()) {
            toastr()->warning('Something went wrong!!!');
            return redirect()->back();
        }

        $blog_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $blog_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/blog', $blog_image);
        }

        $user = User::find(auth()?->user()?->id);

        if ($user) {
            Post::create([
                'user_id' => auth()->id(),
                'user_role' => auth()->user()->role,
                'category_id' => $request->category,
                'title' => $request->title,
                'blog' => $request->blog,
                'image' => $blog_image
            ]);
            toastr()->success('Blog created successfully');
            return redirect()->route('webhome');
        } else {
            toastr()->warning('Login first for blog post');
            return to_route('create.post');
        }
    }
    public function singleBlog($blog_id)
    {
        // dd($blog_id);
        $blog_details = Post::with('category', 'user')->find($blog_id);
        // dd($blog_details);
        return view('frontend.pages.post.single_blog', compact('blog_details'));
    }
    public function allBlog()
    {
        $category_blogs = Post::latest()->paginate(12);
        return view('frontend.pages.post.category_wise_blog', compact('category_blogs'));
    }
    public function cateWiseBlog($category_id)
    {
        $category_blogs = Post::where('category_id', $category_id)->with('category', 'user')->paginate(12);
        return view('frontend.pages.post.category_wise_blog', compact('category_blogs'));
    }
    public function blog_search(Request $request)
    {
        // dd($request->all());
        $searchKey = $request->search;
        // dd($searchKey);

        $blogs = Post::where('title', 'LIKE', '%' . $searchKey . '%')->paginate(12);
        // dd($blogs);
        return view('frontend.pages.post.search_post', compact('blogs'));
    }
    public function userBlogs()
    {
        $blogs = Post::where('user_id', auth()?->user()?->id)->with('category')->paginate(5);
        // dd($blogs);
        return view('frontend.pages.profile.users_blogs', compact('blogs'));
    }
    public function userBlogView($blog_id)
    {
        $blog_details = Post::find($blog_id)->with('category', 'user');
        return view('frontend.pages.post.single_blog', compact('blog_details'));
    }
    public function userBlogEdit($blog_id)
    {
        $blogs = Post::find($blog_id);
        return view('frontend.pages.profile.edit_blog', compact('blogs'));
    }
    public function userBlogUpdate(Request $request, $blog_id)
    {
        // dd($request->all());
        $blog = Post::find($blog_id);
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'blog' => 'required',
            'image' => 'required',
        ]);

        if ($validate->fails()) {
            toastr()->warning('Something went wrong!!!');
            return redirect()->back();
        }

        $blog_image = $blog->image;

        if ($image = $request->file('image')) {
            if ($image = $request->file('image')) {
                if (file_exists(public_path('uploads/blog/' . $blog_image))) {
                    File::delete(public_path('uploads/blog/' . $blog_image));
                }
                $blog_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/blog/', $blog_image);
            }
        }
        $user = User::find(auth()?->user()?->id);

        if ($user) {
            $blog->update([
                'user_id' => auth()->id(),
                'user_role' => auth()->user()->role,
                'category_id' => $request->category,
                'title' => $request->title,
                'blog' => $request->blog,
                'image' => $blog_image
            ]);
            toastr()->success('Blog update successfully');
            return redirect()->route('user.blogs');
        } else {
            toastr()->warning('Something went wrong!!!');
            return redirect()->back();
        }
    }

    public function userBlogDelete($blog_id)
    {

        $blog = Post::find($blog_id);
        if ($blog) {
            $blog->delete();
            toastr()->success('Blog deleted successfully');
            return redirect()->route('user.blogs');
        } else {
            toastr()->warning('Something went wrong!!!');
            return redirect()->back();
        }
    }
}
