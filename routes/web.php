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
    return view('welcome');
});

//Remember that if you don't use pretty URLs; The URL is case sentitive. TODO is uppercase e.g. localhost/TODO/public/{{route}}
Route::get('/new', 'PagesController@new');

Route::get('/todo', 'TodosController@index')->name('todos');

Route::post('/todo/create', 'TodosController@store')->name('todo.create');

Route::get('/todo/delete/{id}', 'TodosController@destroy')->name('todo.delete');

Route::get('/todo/edit/{id}', 'TodosController@edit')->name('todo.edit');

Route::put('/todo/update/{id}', 'TodosController@update')->name('todo.update');

Route::get('/todo/completed/{id}', 'TodosController@completed')->name('todo.completed');

Route::get('/pdf', function () {
    return response()->file('C:\Users\Gil\Downloads\dev-env.mp4');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
