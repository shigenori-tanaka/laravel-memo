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
    return redirect('/index');
});

Route::get('/index', 'MemoController@index') ->name('memo_index');
Route::get('/new', 'MemoController@create') ->name('memo_new');
Route::post('/store', 'MemoController@store') ->name('memo_store');

Route::get('/edit/{id}', 'MemoController@edit')->name('memo_edit');
Route::post('/update/{id}', 'MemoController@update')->name('memo_update');

Route::get('/show/{id}', 'MemoController@show') ->name('memo_show');
Route::delete('/delete/{id}', 'MemoController@destroy')->name('memo_delete');


