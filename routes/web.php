<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    MapelController,
    KelasController,
    TahunAjaranController,
};

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
    return view('welcome');
});

Route::group([
    'middleware' => ['auth','role:admin,siswa']
], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group([
    'middleware' => ['auth','role:admin']
], function() {
    Route::resource('/mapel', MapelController::class);
    Route::resource('/kelas', KelasController::class);
    Route::resource('/tahunAjaran', TahunAjaranController::class);
});

Route::group([
    'middleware' => 'role:user'
], function() {
    //
});