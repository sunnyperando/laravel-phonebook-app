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
     return redirect()->route('contacts.index');
});


Route::resource('/contacts', 'ContactController');

Route::get('create', function () {
    return view('/contacts/index');
});
Route::get('create', function () {
    return view('/contacts/create');
});

Route::get('edit', function () {
    return view('/contacts/edit');
});

Route::get('show', function () {
    return view('/contacts/show');
});

