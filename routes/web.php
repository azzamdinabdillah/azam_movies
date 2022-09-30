<?php

use App\Http\Controllers\MainController;
use App\Http\Livewire\DetailsMovie;
use Illuminate\Support\Facades\Http;
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

Route::get('/', function () {
    return view('movies.index');
})->name('movie.home');
Route::get('/movie/details/{id}', [MainController::class, 'details']);
Route::get('/movie/pencarian', [MainController::class, 'search']);
