<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();
Route::group(['middleware' => 'auth'],function(){ 
    Route::group(['middleware' => 'user'],function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });
    Route::group(['middleware' => 'admin'],function(){
        Route::get('/adminHome',[HomeController::class, 'indexAdmin'])->name('homeAdmin');
    });
    Route::group(['middleware' => 'management'],function(){
        Route::get('/managementHome',[HomeController::class, 'indexManagement'])->name('homeManagement');
    });
});