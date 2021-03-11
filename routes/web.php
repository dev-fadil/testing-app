<?php

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

use App\Http\Controllers\HomeController;


Route::view('tentang', 'tentang');
Route::view('welcome', 'welcome');
Route::view('fadil', 'fadil');


Route::view('admin', 'admin');

Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/{id_siswa}', [HomeController::class, 'show']);
Route::post('/add/save', [HomeController::class, 'store']);
Route::post('/update/{id_siswa}', [HomeController::class, 'update']);
Route::get('/hapus/{id_siswa}', [HomeController::class, 'destroy']);

