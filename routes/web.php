<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelController;
use App\Imports\UsersImport;
use Facade\Ignition\Http\Controllers\ExecuteSolutionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return view('home', [
        "title" => "home",  
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "active" => "about",
        "title" => "about",
        "name" => "Yoga Aditya",
        "absen" => "34",
        "kelas" => "11 TKJ 1",
    ]);
});

Route::get('/daus', function () {        
    return view('daus', [
        "active" => "daus",
        "title" => "daus",
    ]);
});

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'title' => "Post by Category : $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'author'),        
    ]);
});

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/authors/{author:username}', function(User $author) {
    return view('posts', [
        'active' => 'posts',
        'title' => "Post by Author : $author->username",
        'posts' => $author->posts->load('category', 'author')       
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/cekSlug', [DashboardController::class, 'cekSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardController::class)->middleware('auth');

Route::post('/importexcel', [ExcelController::class, 'importexcel'])->name('importexcel');

Route::get('/exportexcel', [ExcelController::class, 'exportexcel'])->name('exportexcel');