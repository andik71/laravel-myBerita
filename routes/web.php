<?php

use App\Http\Controllers\Article;
use App\Http\Controllers\Author;
use App\Http\Controllers\Category;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Default Laravel Routing
// Route::get('/', function () { return view('welcome'); });


// ===== Public Page Route =====
Route::get('/', [Home::class, 'index']);


// ------------ myBerita Routes ------------
Route::get('/about', function () {
    return view('landingpage.about');
});

Route::get('/category', function () {
    return view('landingpage.category');
});

Route::get('/detail', function () {
    return view('landingpage.detail');
});

Route::get('/result', function () {
    return view('landingpage.result');
});

Route::get('/contact', function () {
    return view('landingpage.contact');
});


// ===== Admin Route =====
Route::get('/administrator', function () {
    return view('admin.home');
})->middleware('auth');

// ------------ Category Routes ------------
Route::get('/administrator/category', [Category::class, 'index'])->middleware('auth');
Route::get('/administrator/category/add', [Category::class, 'create'])->middleware('auth');
Route::post('/administrator/category/store', [Category::class, 'store'])->middleware('auth');
Route::get('/administrator/category/{id}/edit', [Category::class, 'edit'])->middleware('auth');
Route::put('/administrator/category/{id}/update', [Category::class, 'update'])->middleware('auth');
Route::delete('/administrator/category/{id}/delete', [Category::class, 'destroy'])->middleware('auth');
Route::get('/administrator/category/report', [Category::class, 'generatePDF'])->middleware('auth');

// ------------ Author Routes ------------
Route::get('/administrator/author', [Author::class, 'index'])->middleware('auth');
Route::get('/administrator/author/add', [Author::class, 'create'])->middleware('auth');
Route::post('/administrator/author/store', [Author::class, 'store'])->middleware('auth');
Route::get('/administrator/author/{id}/edit', [Author::class, 'edit'])->middleware('auth');
Route::put('/administrator/author/{id}/update', [Author::class, 'update'])->middleware('auth');
Route::delete('/administrator/author/{id}/delete', [Author::class, 'destroy'])->middleware('auth');
Route::put('/administrator/author/{id}/detail', [Author::class, 'show'])->middleware('auth');
Route::get('/administrator/author/report', [Author::class, 'generatePDF'])->middleware('auth');

// ------------ Article Routes ------------
Route::get('/administrator/article', [Article::class, 'index'])->middleware('auth');
Route::get('/administrator/article/add', [Article::class, 'create'])->middleware('auth');
Route::post('/administrator/article/store', [Article::class, 'store'])->middleware('auth');
Route::get('/administrator/article/{id}/edit', [Article::class, 'edit'])->middleware('auth');
Route::put('/administrator/article/{id}/update', [Article::class, 'update'])->middleware('auth');
Route::delete('/administrator/article/{id}/delete', [Article::class, 'destroy'])->middleware('auth');
Route::get('/administrator/article/{id}/detail', [Article::class, 'show'])->middleware('auth');
Route::get('/administrator/article/report', [Article::class, 'generatePDF'])->middleware('auth');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
