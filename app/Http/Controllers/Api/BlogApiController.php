<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogApiController extends Controller
{
    public function allBlogs()
    {
        $allBlog = Post::all();
        if ($allBlog) {
            return $this->responseWithSuccess($allBlog, "all-blogs");
        } else {
            return $this->responseWithError('No Blog Found');
        }
    }
    public function singleBlog($id)
    {
        $blog = Post::find($id);
        if ($blog) {
            return $this->responseWithSuccess($blog, "single-blogs");
        } else {
            return $this->responseWithError('No Blog Found');
        }
    }

    public function createBlog(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'category_id' => 'required',
                'blog' => 'required',
                'image' => 'required',
            ]
        );
        if ($validate->fails()) {
            return $this->responesewithError($validate->getMessageBag());
        }
        // dd($request);
        $blog_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $blog_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/blog', $blog_image);
        }

        $blog = Post::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'blog' => $request->blog,
            'user_role' => 'admin',
            'image' => $blog_image,
            'is_publish' => 'is_publish'
        ]);
        return $this->responesewithSuccess($blog, 'Blog created successfully');
    }
    public function deleteBlog($id)
    {
        $blog = Post::find($id);
        if ($blog) {
            $blog->delete();
            return $this->responesewithSuccess($blog, 'Data deleted successfully');
        } else
            return $this->responesewithError('No data found');
    }
}
