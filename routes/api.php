<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\CountriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Routes for group: countries
 */
Route::name('countries.')->controller(CountriesController::class)->prefix('countries')->group(function () {
    Route::get('/all', 'all')->name('all');
    Route::get('/', 'countries')->name('index');
    Route::get('/{code}', 'country')->where(['code'=>'[a-z]{2}'])->name('code');
    Route::get('/{code}/edit', 'edit')->where(['code'=>'[a-z]{2}'])->name('edit');
    Route::post('/', 'store')->name('store');
    Route::put('/', 'update')->name('update');
});


/**
 * Routes for group: tasks
 */
Route::name('tasks.')->controller(TasksController::class)->prefix('tasks')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/finished', 'finished')->name('finished');
    Route::get('/active', 'active')->name('active');
    Route::post('create', 'create')->name('create');
    Route::get('{task}', 'show')->name('show');
    Route::delete('{task}', 'destroy')->name('delete');
    Route::patch('/{task}/update', 'update')->name('update');
    Route::patch('/{task}/finish', 'finish')->name('finish');
});