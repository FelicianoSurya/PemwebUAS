<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;

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
    Route::get('listingFasilitas' , [FacilitiesController::class, 'index'])->name('listFasilitas');
    Route::get('listingBooking' , [BookingController::class, 'index'])->name('listBooking');
    
    
    Route::group(['middleware' => 'user'],function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('booking', BookingController::class);
    });

    Route::group(['middleware' => 'admin'],function(){
        Route::get('/adminHome',[HomeController::class, 'indexAdmin'])->name('homeAdmin');
        Route::resource('management', UserController::class);
        Route::delete('booking/{id}', [BookingController::class, 'destroy']);
    });

    Route::group(['middleware' => 'management'],function(){
        Route::get('/managementHome',[HomeController::class, 'indexManagement'])->name('homeManagement');
        Route::resource('fasilitas', FacilitiesController::class);
        Route::put('booking/approved/{id}', [BookingController::class, 'approved']);
        Route::put('booking/rejected/{id}', [BookingController::class, 'rejected']);
    });
});