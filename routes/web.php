<?php

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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });


    //Route::get('/dashboard', function () {
    //    return view('dashboard');
    //})->middleware(['auth'])->name('dashboard');
});


//both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});




//superadministrator
Route::group(['middleware' => ['auth', 'role:superadministrator']], function() { 
    
});

//seller
Route::group(['middleware' => ['auth', 'role:seller']], function() { 
    
});

//customer
Route::group(['middleware' => ['auth', 'role:customer']], function() { 
    
});




require __DIR__.'/auth.php';
