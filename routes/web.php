<?php

use App\Http\Controllers\ControllerPosyandu01;
use App\Http\Controllers\ControllerPosyandu09;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputController;

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
Route::resource('admin/home', HomeController::class);
Route::resource('posyandu01', ControllerPosyandu01::class);
Route::resource('posyandu09', ControllerPosyandu09::class);
Route::get('/halamaninput', [App\Http\Controllers\InputController::class, 'index'])->name('halamaninput');
Route::post('/halamaninput', [App\Http\Controllers\InputController::class, 'store'])->name('halamaninput.store');
Route::get('/halamaninput/create', [App\Http\Controllers\InputController::class, 'create']);
Route::get('/halamaninput/{$id}', [App\Http\Controllers\InputController::class, 'show']);
Route::put('/halamaninput/{$id}', [App\Http\Controllers\InputController::class, 'update']);
Route::delete('/halamaninput/{$id}', [App\Http\Controllers\InputController::class, 'destroy']);
Route::get('/halamaninput/{$id}/edit', [App\Http\Controllers\InputController::class, 'edit']);
//Route::resource('/halamaninput', InputController::class);
Route::get('/halamanhasil', [App\Http\Controllers\HasilController::class, 'index']);
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::post('admin/home', [HomeController::class, 'store'])->name('admin.home.store');
Route::delete('admin/home/{id}', [HomeController::class, 'destroy'])->name('admin.home.destroy');
Route::get('admin/home/{id}/edit', [HomeController::class, 'edit'])->name('admin.home.edit');

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
