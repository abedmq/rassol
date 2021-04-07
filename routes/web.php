<?php

use App\Jobs\ImportContacts;
use Illuminate\Support\Facades\Http;
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
Route::get('images/{id}/{size?}', ['as' => 'image', 'uses' => 'ImageController@get']);


Auth::routes();

Route::middleware("auth")->group(function () {
    Route::post('multifileupload', 'ImageController@store')->name('multifileupload');
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('whatsapp')->group(function () {
        Route::get('/login', 'WhatsappController@login')->name('whatsapp.login');
        Route::get('/whatsapp-link', 'WhatsappController@linkWhatsapp')->middleware('user:admin')->name('whatsapp.link');
        Route::get('get-user-info', "WhatsappController@getUserInfo");
        Route::get('login-success', "WhatsappController@loginSuccess");
        Route::get('get-groups', "WhatsappController@getInitGroup");

        Route::name('whatsapp.')->group(function () {
            Route::get('refresh', "WhatsappController@refresh")->name('refresh');
            Route::get('refresh-my-group', "WhatsappController@refreshMyGroup")->name('refresh-my-group');
            Route::resource('groups', 'GroupsController');

            Route::resource('contacts', 'ContactsController');
            Route::post('groups/create-new-groups', 'GroupsController@createNewGroups')->name('groups.create_new_groups');
            Route::post('groups/select', 'GroupsController@select')->name('groups.select');
            Route::get('{id?}', "ChatsController@index")->where('id', '[0-9].*')->name('chats');
            Route::post('send', "ChatsController@send")->name('send');
            Route::get('revoke/{id}', "ChatsController@revokeMsg")->name('revoke');
            Route::get('messages/{id?}', "ChatsController@messages")->where('id', '[0-9].*')->name('messages');

//            Route::get('info', "WhatsappController@getInfo");
            Route::get('chats', "WhatsappController@getChats");
            Route::post('set-info', "WhatsappController@setInfo")->middleware('user:admin');
            Route::post('add-groups', "WhatsappController@addGroup")->middleware('user:admin');
            Route::get('test-create-group', function () {
                $data = whatsapp()->createGroup("🙂", ["972598700543@c.us", "970597229844@s.whatsapp.net", "972592471020@s.whatsapp.net"]);
                dd($data);
//                "970598700543-1614245868@g.us";
            });

        });

    });


    Route::middleware("user:admin")->group(function () {
        Route::resource("users", 'UserController');

    });
});

// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');
Route::get('terms', 'PagesController@terms');
Route::get('policy', 'PagesController@policy');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Route::get('test', function () {
    ImportContacts::dispatch(auth()->user());

});
Route::get('test2', function () {
//    session()->put('test',3);

    $msg = \App\Models\Message::latest()->first();
    dd($msg->getText());
});

Route::get('artisan', function () {
    Artisan::call('storage:link');
});

Route::view('private', "front.private");