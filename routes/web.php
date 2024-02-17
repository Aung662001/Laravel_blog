<?php

use App\Models\Blogs;
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

Route::get('/blogs', function () {
  $blogs = Blogs::all();
  return view('blogs', ['blogs' => $blogs]);
});
Route::get('/blogs/{slug}', function ($slug) {
  if (!file_exists(resource_path("blogs/{$slug}.html"))) {
    abort(404);
  }
  return view('blog', ['blog' => Blogs::findAndFail($slug)]);
})->where('slug', '[A-z\d\-_]+');


