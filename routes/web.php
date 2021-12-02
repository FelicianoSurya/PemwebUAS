<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::post('/regis',[RegisterController::class, 'register']);

Route::group(['middleware' => 'auth'],function(){ 
    
    Route::group(['middleware' => 'user'],function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/home/favorite', [UserController::class, 'favoriteList'])->name('favorite');
        Route::get('/home/booking', [UserController::class, 'bookingForm'])->name('bookingForm');
        Route::post('bookingAdd',[BookingController::class, 'store'])->name('bookingAdd');
        Route::post('getFavorite', [UserController::class, 'addFavorite'])->name('listFavorite');
        Route::get('/home/fasility/{id}', [FacilitiesController::class, 'show'])->name('facilityDetail');
        Route::delete('/home/favorite/{id}', [UserController::class, 'deleteFavorite']);
        Route::get('/home/requestLisiting', [UserController::class, 'userRequest'])->name('userRequest');
        Route::get('/home/historyRequest', [UserController::class, 'userHistory'])->name('userHistory');
    });
    
    Route::group(['middleware' => 'admin'],function(){
        Route::get('/adminHome',[HomeController::class, 'indexAdmin'])->name('homeAdmin');
        Route::resource('management', UserController::class);
        Route::get('management/form/{id}', [UserController::class, 'edit']);
        Route::post('management/edit', [UserController::class, 'update']);
        Route::get('management/delete/{id}', [UserController::class, 'destroy']);
        Route::resource('admin/facilities', FacilitiesController::class);
        Route::get('admin/facilities/form/{id}', [FacilitiesController::class, 'edit']);
        Route::post('admin/facilities/edit', [FacilitiesController::class, 'update']);
        Route::get('admin/facilities/delete/{id}', [FacilitiesController::class, 'destroy']);
        Route::get('admin/requestListing/delete/{id}', [BookingController::class, 'destroy']); 
        Route::get('admin/requestListing' , [BookingController::class, 'index'])->name('requestListingAdmin');
        Route::get('requestWaiting' , [BookingController::class, 'indexWaiting'])->name('requestListingWaiting');
    });
    
    Route::group(['middleware' => 'management'],function(){
        Route::get('/managementHome',[HomeController::class, 'indexManagement'])->name('homeManagement');
        Route::get('manager/requestListing' , [BookingController::class, 'index'])->name('requestListingManager');
        Route::get('manager/requestWaiting' , [BookingController::class, 'indexWaiting'])->name('requestListingWaitingManager');
        Route::resource('manager/facilities', FacilitiesController::class);
        Route::get('manager/facilities/form/{id}', [FacilitiesController::class, 'edit']);
        Route::post('manager/facilities/edit', [FacilitiesController::class, 'update']);
        Route::get('manager/facilities/delete/{id}', [FacilitiesController::class, 'destroy']);
        Route::resource('facilities', FacilitiesController::class);
        Route::get('manager/booking/approved/{id}', [BookingController::class, 'approved']);
        Route::get('manager/booking/rejected/{id}', [BookingController::class, 'rejected']);
    });
});