<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\GuruController;

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

Route::get('/', function () {
    return view('welcome');

});
Route::prefix('/datsis')->name('siswa.')->group(function () {
    Route::get('/index', [DataSiswaController::class, 'index'])->name('index');
    Route::get('/create', [DataSiswaController::class, 'create'])->name('create');
    Route::post('/store', [DataSiswaController::class, 'store'])->name('store');
    Route::get('/show/{id}', [DataSiswaController::class, 'show'])->name('show');
    Route::patch('/update/{id}', [DataSiswaController::class, 'update'])->name('update');
    Route::get('/edit/{id}', [DataSiswaController::class, 'edit'])->name('edit');
    Route::delete('/destroy/{id}', [DataSiswaController::class, 'destroy'])->name('destroy');
});
Route::prefix('/guru')->name('guru.')->group(function () {
    Route::get('/index', [GuruController::class, 'index'])->name('index');
    Route::get('/create', [GuruController::class, 'create'])->name('create');
    Route::post('/store', [GuruController::class, 'store'])->name('store');
    Route::get('/show/{id}', [GuruController::class, 'show'])->name('show');
    Route::patch('/update/{id}', [GuruController::class, 'update'])->name('update');
    Route::get('/edit/{id}', [GuruController::class, 'edit'])->name('edit');
    Route::delete('/destroy/{id}', [GuruController::class, 'destroy'])->name('destroy');

});
