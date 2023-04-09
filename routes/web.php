<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/{id}', [AdminController::class, "detail"]);

Route::get('/', [HalamanController::class, 'index'])->middleware('isLogin');
Route::get('/index', [HalamanController::class, 'index'])->middleware('isLogin');
Route::get('index/{id}', [HalamanController::class, "detail"]);
Route::get('/login', [HalamanController::class, 'login']);

Route::resource('beli_game', HalamanController::class)->middleware('isLogin');

Route::get('/sesi', [SessionController::class, 'index'])->middleware('isUser');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isUser');
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isUser');
Route::post('/sesi/create', [SessionController::class, 'create']);

