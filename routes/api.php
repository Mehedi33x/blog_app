<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\CategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//category
Route::get('/all-category', [CategoryApiController::class, 'allCategory']);
Route::get('/single-category/{id}', [CategoryApiController::class, 'singleCategory']);
Route::post('/create-category',[CategoryApiController::class,'createCategory']);
Route::delete('/delete-category/{id}',[CategoryApiController::class,'deleteCategory']);

// post
Route::get('/all-blog', [BlogApiController::class, 'allBlogs']);
Route::get('/single-blog/{id}', [BlogApiController::class, 'singleBlog']);
Route::post('/create-blog',[BlogApiController::class,'createBlog']);
Route::delete('/delete-blog/{id}',[BlogApiController::class,'deleteBlog']);

// auth_user with jwt
Route::post('/login',[AuthApiController::class, 'login']);
Route::post('/registration',[AuthApiController::class, 'registration']);
