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

Route::get('/', function(){
    return view('homepage');
})->name('homepage');

Auth::routes();

Route::group(['middleware' => 'auth'],function(){ 
    Route::get('listingFasilitas' , [FacilitiesController::class, 'index'])->name('listFasilitas');
    
    Route::group(['middleware' => 'user'],function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/home/favorite', [UserController::class, 'favoriteList'])->name('favorite');
        Route::post('bookingAdd',[BookingController::class, 'store'])->name('bookingAdd');
        Route::post('getFavorite', [UserController::class, 'addFavorite'])->name('listFavorite');
        Route::get('/home/fasility/{id}', [FacilitiesController::class, 'show'])->name('facilityDetail');
        Route::delete('/home/favorite/{id}', [UserController::class, 'deleteFavorite']);
    });
    
    Route::group(['middleware' => 'admin'],function(){
        Route::get('/adminHome',[HomeController::class, 'indexAdmin'])->name('homeAdmin');
        Route::resource('management', UserController::class);
        Route::delete('booking/{id}', [BookingController::class, 'destroy']);
        Route::get('/listFacility',[FacilitiesController::class, 'adminFacility'])->name('listFacility');
    });
    
    Route::group(['middleware' => 'management'],function(){
        Route::get('/managementHome',[HomeController::class, 'indexManagement'])->name('homeManagement');
        Route::resource('fasilitas', FacilitiesController::class);
        Route::get('requestListing' , [BookingController::class, 'index'])->name('requestListing');
        Route::put('booking/approved/{id}', [BookingController::class, 'approved']);
        Route::put('booking/rejected/{id}', [BookingController::class, 'rejected']);
    });
});