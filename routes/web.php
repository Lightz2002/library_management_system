<?php

use App\Models\Author;
use App\Models\Publisher;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardBookController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\RedirectIfAuthenticated;

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


Route::get('/', function () {
    return view('pages.user.index', [
        'title' => 'Home',
    ]);
});

/* Login */

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

/* Register */
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

/* Dashboard */
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.dashboard.index', [
            'title' => 'Dashboard',
        ]);
    });

    Route::get('/dashboard/books/createSlug', [DashboardBookController::class, 'createSlug']);

    Route::resource('/dashboard/books', DashboardBookController::class);
});

/* User */
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{book:slug}', [BookController::class, 'show']);

Route::get('/authors', function () {
    return view('pages.user.authors', [
        'title' => 'Authors',
        'authors' => Author::all()
    ]);
});

Route::get('/publishers', function () {
    return view('pages.user.publishers', [
        'title' => 'Publishers',
        'publishers' => Publisher::all()
    ]);
});
