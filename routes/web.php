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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// rotte dashboard e modifica status
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/status/{id}', 'HomeController@status')->name('status');
Route::patch('/status/{id}', 'HomeController@statusUpdate')->name('status.update');

// rotte CRUD works
Route::resource('works', 'WorkController');

// rotte CRUD steps
Route::prefix('works/{work}')->name('work.')->group(function () {
    Route::resource('steps', 'StepController');
});


