<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'signin']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/', function () {
      return view('welcome');
});

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {

      Route::get('/', 'index')->name('index');
      Route::get('/new', 'create')->name('create');
      Route::post('/new', 'store');
      Route::get('/{post}/edit', 'edit')->name('edit');
      Route::patch('/{post}/edit', 'update');

      Route::get('/{slug}-{post}',  'show')->where([
            'post' => '[0-9]+',
            'slug' => '[a-z0-9\-]+',
      ])->name('show');
});
