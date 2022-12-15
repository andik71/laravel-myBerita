<?php

use App\Http\Controllers\Article;
use App\Http\Controllers\Author;
use App\Http\Controllers\Category;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;

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
});

// ------------ Category Routes ------------
Route::get('/administrator/category', [Category::class, 'index']);
Route::get('/administrator/category/add', [Category::class, 'create']);
Route::post('/administrator/category/store', [Category::class, 'store']);
Route::get('/administrator/category/{id}/edit', [Category::class, 'edit']);
Route::put('/administrator/category/{id}/update', [Category::class, 'update']);
Route::delete('/administrator/category/{id}/delete', [Category::class, 'destroy']);
Route::get('/administrator/category/report', [Category::class, 'generatePDF']);

// ------------ Author Routes ------------
Route::get('/administrator/author', [Author::class, 'index']);
Route::get('/administrator/author/add', [Author::class, 'create']);
Route::post('/administrator/author/store', [Author::class, 'store']);
Route::get('/administrator/author/{id}/edit', [Author::class, 'edit']);
Route::put('/administrator/author/{id}/update', [Author::class, 'update']);
Route::delete('/administrator/author/{id}/delete', [Author::class, 'destroy']);
Route::put('/administrator/author/{id}/detail', [Author::class, 'show']);
Route::get('/administrator/author/report', [Author::class, 'generatePDF']);

// ------------ Article Routes ------------
Route::get('/administrator/article', [Article::class, 'index']);
Route::get('/administrator/article/add', [Article::class, 'create']);
Route::post('/administrator/article/store', [Article::class, 'store']);
Route::get('/administrator/article/{id}/edit', [Article::class, 'edit']);
Route::put('/administrator/article/{id}/update', [Article::class, 'update']);
Route::delete('/administrator/article/{id}/delete', [Article::class, 'destroy']);
Route::get('/administrator/article/report', [Article::class, 'generatePDF']);

