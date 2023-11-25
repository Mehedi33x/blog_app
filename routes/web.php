<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [WebsiteController::class, 'webhome'])->name('webhome');



Route::get('/show/post/{id}', [WebsiteController::class, 'showpost'])->name('singlepost.show');
Route::get('/latest/post', [WebsiteController::class, 'latestpost'])->name('latest.post');

//#auth
Route::get('/user/register', [AuthController::class, 'register'])->name('register');
Route::post('/reg/store', [AuthController::class, 'registore'])->name('regi.store');
Route::get('/web/login', [AuthController::class, 'weblogin'])->name('weblogin');
Route::post('/do/web/login', [AuthController::class, 'doweblogin'])->name('doweblogin');
Route::get('/web/logout', [AuthController::class, 'weblogout'])->name('web.logout');


Route::get('/create/post', [PostController::class, 'createpost'])->name('create.post');
Route::post('/createpost/store', [PostController::class, 'poststore'])->name('createpost.store');
Route::get('/single-blog/{blog_id}', [PostController::class, 'singleBlog'])->name('single.blog');
Route::get('/all-blog', [PostController::class, 'allBlog'])->name('all.blog');
Route::get('/category-wise-blog/{category_id}', [PostController::class, 'cateWiseBlog'])->name('cate.wise.blog');
Route::post('/blog-search', [PostController::class, 'blog_search'])->name('blog.search');

Route::get('/user/user-blogs', [PostController::class, 'userBlogs'])->name('user.blogs');
Route::get('/user/user-blog-view/{blog_id}', [PostController::class, 'userBlogView'])->name('user.blog.view');
Route::get('/user/user-blog-edit/{blog_id}', [PostController::class, 'userBlogEdit'])->name('user.blog.edit');
Route::put('/user/user-blog-update/{blog_id}', [PostController::class, 'userBlogUpdate'])->name('user.blog.update');
Route::get('/user/user-blog-delete/{blog_id}', [PostController::class, 'userBlogDelete'])->name('user.blog.delete');


Route::get('/user/profile', [WebsiteController::class, 'userprofile'])->name('user.profile');
Route::get('/user/profile_edit', [UserController::class, 'editProfile'])->name('edit.profile');
Route::post('/user/profile_store', [UserController::class, 'storeProfile'])->name('store.profile');



//for comment
// Route::post('/comment/{postId}', [CommentController::class, 'comment'])->name('comment');









// Backend

Route::get('/admin/login', [DashboardController::class, 'adminlogin'])->name('login');
Route::post('/admin/do-login', [DashboardController::class, 'dologin'])->name('dologin');
Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

    //for category
    Route::get('/category-list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('/category-create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category-delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    //for post
    Route::resource('post', PostController::class);


    Route::get('/post-delete/{blog_id}', [PostController::class, 'postDelete'])->name('post.delete');
    Route::get('/post/accept/{id}', [PostController::class, 'postaccept'])->name('post.accept');
    Route::get('/post/reject/{id}', [PostController::class, 'postreject'])->name('post.reject');

    Route::resource('view', ViewController::class);
});
