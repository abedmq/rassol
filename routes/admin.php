<?php


Auth::routes();

Route::middleware("auth:admin")->group(function () {
    Route::get('profiles', 'ProfileController@index')->name('profiles.index');
    Route::post('profiles/update', 'ProfileController@update')->name('profiles.update');
    Route::get('/', "HomeController@index")->name('home');

    Route::resource('users', 'UserController');
    Route::resource('tags', 'TagsController');
    Route::resource('fields', 'FieldsController');
    Route::resource('groups', 'GroupController');
    Route::resource('contacts', 'ContactsController');
    Route::resource('packages', 'PackagesController');

});

Route::post('test', function () {

})->name('test');