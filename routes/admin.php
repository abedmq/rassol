<?php


Route::middleware("guest:admin")->group(function () {
    Auth::routes();
});

Route::middleware("auth:admin")->group(function () {
    Route::get('/', "HomeController@index")->name('home');

    Route::resource('users', 'UserController');
    Route::resource('tags', 'TagsController');
    Route::resource('fields', 'FieldsController');
    Route::resource('groups', 'GroupController');
    Route::resource('contacts', 'ContactsController');

});

Route::post('test', function () {

})->name('test');