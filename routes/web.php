<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarOptionsController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\User\UserController;
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

//Route::middleware('guest')->group(function () {
//    Route::get('/', function () {
//        return view('welcome');
//   });


    //Route::get('/dashboard', function () {
    //    return view('dashboard');
    //})->middleware(['auth'])->name('dashboard');
//});

//Visitors Route ---------------Start Line--------------------------------
Route::get('/', [FrontEndController::class, 'index'])->name('index');
Route::get('/about', [FrontEndController::class, 'about'])->name('about');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');
//Visitors Route ---------------End Line--------------------------------


//both---------------Start Line--------------------------------
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('/profile', UserController::class);
});
//both---------------End Line--------------------------------


//superadministrator ---------------Start Line--------------------------------
Route::group(['middleware' => ['auth', 'role:superadministrator']], function() {
    Route::get('/CarOptions', 'App\Http\Controllers\CarOptionsController@index')->name('CarOptions');
    Route::post('CarOptions', [CarOptionsController::class, 'store']);
});
//superadministrator ---------------End Line--------------------------------


//seller ---------------Start Line--------------------------------
Route::group(['middleware' => ['auth', 'role:seller']], function() {

});
//seller ---------------End Line--------------------------------


//customer ---------------Start Line--------------------------------
Route::group(['middleware' => ['auth', 'role:customer']], function() {

});
//customer ---------------End Line--------------------------------

require __DIR__.'/auth.php';
