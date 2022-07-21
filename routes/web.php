<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarOptionsController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\AvatarController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\User\MoreSettingController;
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
Route::get('/contact', [EmailController::class, 'create'])->name('contact');
Route::get('/Car{key}', 'App\Http\Controllers\CarController@viewCar')->name('Car');
Route::get('/searchCar', [FrontEndController::class, 'searchCar'])->name('searchCar');
Route::get('/seller', 'App\Http\Controllers\User\SellerUserController@viewSellers')->name('sellers');
Route::get('/Forums', 'App\Http\Controllers\ForumController@index')->name('forums.index');
Route::get('/Forums{key}', 'App\Http\Controllers\ForumController@viewThread')->name('forums.thread');
Route::get('/Forums/category{key}', 'App\Http\Controllers\ForumController@showThreadsByCategory')->name('forums.category');
Route::post('/Forums/search', 'App\Http\Controllers\ForumController@searchThread')->name('forums.search');
//Visitors Route ---------------End Line--------------------------------


//both---------------Start Line--------------------------------
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('/profile', UserController::class);
    Route::post('/email', [EmailController::class, 'sendEmail'])->name('send.email');
    Route::get('/index', 'App\Http\Controllers\User\AvatarController@index')->name('upload.home');
    Route::post('/upload', 'App\Http\Controllers\User\AvatarController@upload')->name('upload.avatar');
    Route::get('/changePassword', 'App\Http\Controllers\User\MoreSettingController@changePassword')->name('changePassword');
    Route::post('/updatePassword', 'App\Http\Controllers\User\MoreSettingController@updatePassword')->name('updatePassword');
    Route::get('/changeAddress', 'App\Http\Controllers\User\MoreSettingController@changeAddress')->name('changeAddress');
    Route::post('/updateAddress', 'App\Http\Controllers\User\MoreSettingController@updateAddress')->name('updateAddress');
    Route::get('/dealer{key}', 'App\Http\Controllers\User\SellerUserController@viewSeller')->name('dealer');
    Route::post('/Forums/Comment/store', 'App\Http\Controllers\ForumController@postComment')->name('forums.store');
    Route::post('/Forums/thread/store', 'App\Http\Controllers\ForumController@postThread')->name('forums.thread.store');
    Route::post('/Forums/thread/update', 'App\Http\Controllers\ForumController@updateThread')->name('forums.thread.update');
});
//both---------------End Line--------------------------------


//superadministrator ---------------Start Line--------------------------------
Route::group(['middleware' => ['auth', 'role:superadministrator']], function() {
    Route::get('/Setting', 'App\Http\Controllers\CarOptionsController@carOptions')->name('Setting');
    Route::post('/Setting', [CarOptionsController::class, 'store']);
    Route::get('/Admin-Cars', 'App\Http\Controllers\DashboardController@adminCar')->name('admin.cars');
    Route::post('/Admin-Cars/Search', 'App\Http\Controllers\DashboardController@adminSearchCar')->name('admin.cars.search');
    Route::get('/Admin-Cars/ViewCar{key}', 'App\Http\Controllers\DashboardController@adminViewCar')->name('admin.view.car');
    Route::get('/Admin-Users', 'App\Http\Controllers\DashboardController@adminUsers')->name('admin.users');
    Route::post('/Admin-Users/Search', 'App\Http\Controllers\DashboardController@adminSearchUser')->name('admin.users.search');
    Route::get('/Admin-Users/ViewUser{key}', 'App\Http\Controllers\DashboardController@adminViewhUser')->name('admin.view.user');
});
//superadministrator ---------------End Line--------------------------------


//seller ---------------Start Line--------------------------------
Route::group(['middleware' => ['auth', 'role:seller']], function() {
    Route::get('/My-Cars', 'App\Http\Controllers\CarController@viewMyCar')->name('My-Cars');
    Route::get('/Post-Car', 'App\Http\Controllers\CarController@viewPostCar')->name('Post-Car');
    Route::post('/Post-Car', 'App\Http\Controllers\CarController@store')->name('Stor-Car');
    Route::get('/My-Car{key}', 'App\Http\Controllers\CarController@destroy')->name('Destroy-Car');
});
//seller ---------------End Line--------------------------------


//customer ---------------Start Line--------------------------------
Route::group(['middleware' => ['auth', 'role:customer']], function() {


});
//customer ---------------End Line--------------------------------

require __DIR__.'/auth.php';



