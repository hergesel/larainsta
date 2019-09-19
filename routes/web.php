<?php


Auth::routes();


Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home');


Route::get('/posts','PostsController@index')->name('publications');

Route::get('/posts/create','PostsController@create');

Route::post('/posts','PostsController@store');


Route::resource('notifications', 'NotificationController');

Route::post('/comment/{id}', 'CommentsController@comment');

Route::get('/comment/delete/{id}', 'CommentsController@delete');

Route::get('/like/{id}','PostsController@like')->name('like');
Route::get('/deslike/{id}','PostsController@deslike')->name('deslike');
