<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lista_Controller;
use App\Http\Controllers\Login_Controller;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::fallback(function(){
    return 'Error, Pagina não encontrada.';
});

Route::prefix('')->group(function(){
    Route::get('/lista', [Lista_Controller::class, 'index'])->name('front-index');
    Route::get('/create', [Lista_Controller::class, 'create'])->name('front-create');
    Route::get("/{id}/edit", [Lista_Controller::class, 'edit'])->name('front-edit');
    Route::put("/{id}", [Lista_Controller::class, 'update'])->name('front-update');
    Route::delete("/{id}", [Lista_Controller::class, 'destroy'])->name('front-destroy');
    Route::get('/', [Login_Controller::class, 'login'])->name('front-login');
    Route::post('/authen', [Login_Controller::class, 'authen'])->name('front-authen');
    Route::post('/', [Lista_Controller::class, 'store'])->name('front-store');
});