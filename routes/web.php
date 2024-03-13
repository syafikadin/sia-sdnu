<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CetakRaportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KabarController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NilaiAkhirSemesterController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PembelajaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TapelController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index']);


Route::get('/fasilitas', function () {
    return view('fasilitas', [
        "title" => 'Fasilitas'
    ]);
});

Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{berita:id}', [BeritaController::class, 'selectedBerita']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route Group Admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::get('/admin', [DashboardController::class, 'index']);

    Route::resource('/admin/guru', GuruController::class);
    Route::resource('/admin/siswa', SiswaController::class);
    Route::resource('/admin/mapel', MapelController::class);
    Route::resource('/admin/kelas', KelasController::class);
    Route::resource('/admin/pembelajaran', PembelajaranController::class);
    Route::resource('/admin/tapel', TapelController::class);
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/raport', CetakRaportController::class, ['uses' => ['index', 'store', 'show']]);
    Route::resource('/admin/news', NewsController::class);
    Route::resource('/admin/pengumuman', PengumumanController::class);
});
// End Route Group Admin

// Route Group Guru
Route::group(['middleware' => 'guru'], function () {
    Route::get('/guru', function () {
        return view('guru.index');
    })->middleware('guru');
    Route::get('/guru', [DashboardController::class, 'index']);

    Route::resource('/guru/nilai', NilaiController::class);

    // Import Nilai
    // Route::get('nilai/exportnilai', 'NilaiController@format_import')->name('exportnilai');
    // Route::post('nilai/exportnilai', 'NilaiController@format_import')->name('exportnilai');
    Route::get('nilai/exportnilai', 'NilaiController@nilaiexport')->name('exportnilai');
});
// End Route Group Guru

// Route Group Siswa
Route::group(['middleware' => 'siswa'], function () {
    Route::get('/siswa', function () {
        return view('siswa.index');
    })->middleware('siswa');
    Route::get('/siswa', [DashboardController::class, 'index']);

    Route::resource('/siswa/nilaisemester', NilaiAkhirSemesterController::class);
});
// End Route Group Siswa