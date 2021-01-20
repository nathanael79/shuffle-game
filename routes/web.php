<?php

use App\Http\Controllers\AuthController;
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
    return view('auth.login');
});

Route::group(['prefix' => '/'], function (){
    Route::group(['prefix' => 'admin'], function (){
        Route::get('login',[AuthController::class, 'login_index'])->name('admin_login_page');
        Route::post('auth',[AuthController::class, 'login'])->name('admin_auth_check');
    });
});
