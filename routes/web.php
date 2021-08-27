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
//    dd(bcrypt('Sws7k8VpOt'));
    return view('login.index');
})->name('login');

Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/cert', 'Web\CertController@index')->middleware('auth');
Route::post('/cert', 'Web\CertController@create')->middleware('auth');
Route::get('/test', 'Web\CertController@test')->middleware('auth');

Route::get('/area', 'Web\AreaController@index');
