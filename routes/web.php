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

Auth::routes();

Route::get('/forum', 'ForumsController@index')->name('forum');
Route::get('/{provider}/auth',[
    'uses'=>'SocialsController@auth',
    'as'=>'social.auth'
]);
Route::get('/{provider}/redirect',[
    'uses'=>'SocialsController@auth_callback',
    'as'=>'social.callback'
]);
Route::group(['middleware'=>'auth'],function(){
    Route::resource('channels','ChannelController');

    Route::get('discussions/create',[
        'uses'=>'DiscussionController@create',
        'as'=>'discussions.create'
    ]);
    Route::post('discussions/store',[
        'uses'=>'DiscussionController@store',
        'as'=>'discussions.store'
    ]);
    Route::get('discussion/{slug}',[
        'uses' => 'DiscussionController@show',
        'as' => 'discussion'
    ]);
    Route::post('discussion/reply/{id}',[
        'uses'=>'DiscussionController@reply',
        'as'=>'discussion.reply'
    ]);
});