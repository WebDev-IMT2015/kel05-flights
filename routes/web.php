<?php

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
    return view('auth/login');
})->middleware('guest');

Route::get('/role', 'RoleController@index');
Route::post('/role', 'RoleController@store');

Auth::routes();

Route::get('/list', 'UserController@index');
Route::get('/list/{id}/edit', 'UserController@edit')->name('user.edit');
Route::post('list/edit', 'UserController@update')->name('user.update');
Route::delete('list/delete/{id}', 'UserController@destroy')->name('user.delete');

Route::get('/flight', function () {
    return view('flight.new');
});
Route::get('/flight/list', 'FlightController@index');
Route::post('/flight/store', 'FlightController@store')->name('flight.create');
Route::get('/flight/{id}/edit', 'FlightController@edit')->name('flight.edit');
Route::post('/flight/edit', 'FlightController@update')->name('flight.update');
Route::delete('flight/delete/{id}', 'FlightController@destroy')->name('flight.delete');

Route::get('/ticket', function () {
    return view('ticket.list');
});

Route::get('/home', 'HomeController@index')->name('home');

