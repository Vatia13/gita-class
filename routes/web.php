<?php

use App\Http\Middleware\DumpData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NumbersController;
use App\Http\Controllers\CountriesController;

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

Route::get('/test', [NumbersController::class, 'test']);

/**
 * Middleware example route
 */
Route::get('protected-page', function(){
    return "This is protected by password page";
})->middleware('password_protected:1234');

Route::group(['middleware' => ['custom']], function() {
    Route::get('home', function(){
        return "This is a home page";
    })->withoutMiddleware([DumpData::class])->name('home');
});

/**
 * Routes for group: users
 */
Route::name('users.')->controller(UsersController::class)->prefix('users')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show');
});



