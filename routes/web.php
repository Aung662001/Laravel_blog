<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
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

Route::get('/', function () {
  // DB::listen(function ($query){
  //   logger($query->sql);
  // });
  $blogs = Blog::all();
  // $blogs = Blog::with('category','author')->get();
  return view('blogs', ['blogs' => $blogs,'categories'=>Category::all()]);
});
// Route::get('/blogs/{id}', function ($id) {
//   return view('blog', ['blog' => Blog::findOrFail($id)]);
// })->where('slug', '[A-z\d\-_]+');

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
  return view(
    'blog',
    [
      'blog' => $blog,
      'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
    ]
  );
  // return view('blog', ['blog' => $blog->load('author','category')]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
  return view('blogs',
   [
    'blogs' => $category->blogs,
    'categories'=>Category::all(),
    'currentCategory' => $category
  ]);
  // return view('blogs',['blogs'=> $category->blogs->load('author','category')]);
});

Route::get('/blogs/user/{user:username}', function (User $user) {
  return view('blogs', ['blogs' => $user->blogs,'categories'=>Category::all()]);
  // return view('blogs',['blogs'=> $user->blogs->load('author','category')]);
});
