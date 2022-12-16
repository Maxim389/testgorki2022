<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/register', [UserController::class, 'RegistrView'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/auth', [UserController::class, 'AuthView'])->name('auth');
Route::post('/auth', [UserController::class, 'auth']);

Route::middleware('auth')->group(function(){
    Route::get('/lk', [UserController::class, 'lk'])->name('lk');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/addbooking', [BookingController::class, 'addBookingView'])->name('addBooking');
    Route::post('/addbooking', [BookingController::class, 'addBooking']);
    Route::get('/deleteBooking/{id}', [BookingController::class, 'deleteShow'])->name('delete');
    Route::post('/deleteBooking/{id}', [BookingController::class, 'delete']);
    Route::get('/updateBooking/{id}', [BookingController::class, 'updateShow'])->name('update');
    Route::post('/updateBooking/{id}', [BookingController::class, 'update']);

    Route::middleware('isAdmin')->group(function(){
        Route::get('/admin', [UserController::class, 'admin'])->name('admin');
        Route::get('/searchId', [BookingController::class, 'searchId'])->name('searchId');
        Route::get('/searchUser', [BookingController::class, 'searchUser'])->name('searchUser');
    });
});
