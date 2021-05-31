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
Route::prefix('admin')
->middleware(['auth:sanctum', 'role:admin'])
->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.home');
});
Route::prefix('aluno')
->middleware(['auth:sanctum', 'role:aluno'])
->group(function () {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('aluno.home');
});
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Auth::routes();