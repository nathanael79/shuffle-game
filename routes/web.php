<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\DashboardController;
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

Route::group(['prefix' => '/'], function (){

    Route::get('/', [AuthController::class, 'register_index'])->name('user_register_page');
    Route::post('register',[AuthController::class, 'register'])->name('user_register_action');
    Route::get('/board',[BoardController::class, 'index'])->name('user_board_page');
    Route::post('/submit',[BoardController::class, 'submit'])->name('user_submit');


    Route::group(['prefix' => 'admin'], function (){
        Route::get('/',[AuthController::class, 'login_index'])->name('admin_login_page');
        Route::post('login',[AuthController::class, 'login'])->name('admin_auth_check');
        Route::get('logout',[AuthController::class,'adminLogout'])->name('admin_logout');

        Route::get('/dashboard',[DashboardController::class,'index'])->name('admin_dashboard_page');
        Route::get('/dashboard/datatable',[DashboardController::class, 'datatable'])->name('admin_dashboard_datatable');
    });
});
