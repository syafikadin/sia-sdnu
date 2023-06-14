<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;

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
    return view('home', [
        "title" => 'Home'
    ]);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin', function () {
    return view('admin.index');
})->middleware('admin');

Route::get('/guru', function () {
    return view('guru.index');
})->middleware('guru');

Route::get('/siswa', function () {
    return view('siswa.index');
})->middleware('siswa');


Route::resource('/admin/guru', GuruController::class);
Route::resource('/admin/siswa', SiswaController::class);
Route::resource('/admin/kelas', KelasController::class);
