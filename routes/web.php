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
Route::get('/discussion/{slug}',[
    'uses' => 'DiscussionController@show',
    'as' => 'discussion'
]);
Route::get('/channel/{slug}',[
    'uses'=>'ForumsController@channel',
    'as' => 'channel'
]);
Route::group(['middleware'=>'auth'],function(){
    Route::resource('channels','ChannelController');

    Route::get('/discussions/create/new',[
        'uses'=>'DiscussionController@create',
        'as'=>'discussions.create'
    ]);
    Route::post('/discussions/store',[
        'uses'=>'DiscussionController@store',
        'as'=>'discussions.store'
    ]);
 
    Route::post('/discussion/reply/{id}',[
        'uses'=>'DiscussionController@reply',
        'as'=>'discussion.reply'
    ]);
    Route::get('/discussion/edit/{slug}',[
        'uses'=>'DiscussionController@edit',
        'as' =>'discussion.edit'
    ]);
     Route::get('/discussion/update/{id}',[
        'uses'=>'DiscussionController@update',
        'as' =>'discussion.update'
    ]);

    Route::get('/reply/like/{id}',[
        'uses' =>'RepliesController@like',
        'as' => 'reply.like'
    ]);
    Route::get('/reply/unlike/{id}',[
        'uses' =>'RepliesController@unlike',
        'as' => 'reply.unlike'
    ]);
    Route::get('/discussion/watch/{id}',[
        'uses'=>'WatchersController@watch',
        'as' =>'discussion.watch'
    ]);
    Route::get('/discussion/unwatch/{id}',[
        'uses'=>'WatchersController@unwatch',
        'as' =>'discussion.unwatch'
    ]);
    Route::get('/discussion/best/reply/{id}',[
        'uses'=>'RepliesController@best_answer',
        'as' =>'discussion.best.answer'
    ]);
    Route::get('/reply/edit/{id}',[
        'uses'=>'RepliesController@edit',
        'as' =>'reply.edit'
    ]);
     Route::get('/reply/update/{id}',[
        'uses'=>'RepliesController@update',
        'as' =>'reply.update'
    ]);
    
});