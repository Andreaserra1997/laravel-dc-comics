<?php

use App\Http\Controllers\Guest\ComicController;
use App\Http\Controllers\Guest\PageController;
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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/comics/trashed',                   [ComicController::class, 'trashed'])->name('comics.trashed');
Route::post('/comics/{comic}/restore',          [ComicController::class, 'restore'])->name('comics.restore');
Route::delete('/comics/{comic}/harddelete',     [ComicController::class, 'harddelete'])->name('comics.harddelete');
Route::resource('comics', ComicController::class);