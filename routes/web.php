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

Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/organisers', 'App\Http\Controllers\OrganisersController@index');
Route::get('/organisers/{id}', 'App\Http\Controllers\OrganisersController@show');
Route::put('/events/{id}/interested', 'App\Http\Controllers\EventsController@interested');
Route::put('/dashboard/{id}/update', 'App\Http\Controllers\DashboardController@update');

Route::resource('events', '\App\Http\Controllers\EventsController');


Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
