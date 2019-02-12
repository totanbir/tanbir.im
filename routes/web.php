<?php
Auth::routes();

/*
|--------------------------------------------------------------------------
| Frontend Route
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Frontend'], function(){
	Route::get('/','BlogController@index')->name('homes');
	Route::get('/diary/read/{id}/{slug}', 'BlogController@show')->name('singlepost');
	Route::get('/diary/category/{category}', 'BlogController@getCategory')->name('categorypost');
	Route::get('diary/tag/{tag}', 'BlogController@getTag')->name('tagpost');
	Route::get('diary/search', 'BlogController@search')->name('search');
	Route::get('/contact', 'BlogController@contact')->name('contact');
	Route::post('/contact/message', 'BlogController@messageStore')->name('message');
	Route::post('/subscribe', 'BlogController@subscribe')->name('subscribe');
	Route::get('/about', 'BlogController@about')->name('about');
});




/*
|--------------------------------------------------------------------------
| Backend Route
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Backend'], function(){
	Route::get('/','HomeController@index')->name('home');
	Route::get('/category', 'CategoryController@index')->name('category');
	Route::post('/category', 'CategoryController@store')->name('categorys');
	Route::get('/tags', 'TagController@index')->name('tag');
	Route::post('/tags', 'TagController@store')->name('tags');
	Route::get('/posts/create', 'BlogController@create')->name('addpost');
	Route::post('/post/create', 'BlogController@store')->name('blogpost');
	Route::get('/posts', 'BlogController@index')->name('allpost');
	Route::get('/posts/{id}', 'BlogController@show')->name('singles');
	Route::get('/post/{id}', 'BlogController@destroy')->name('deletes');
	Route::get('/edit/{id}', 'BlogController@edit')->name('edit');
	Route::post('/edit/{id}', 'BlogController@update')->name('editpost');
	Route::get('/message', 'BlogController@message')->name('messages');
	Route::get('/message/{id}', 'BlogController@viewsms')->name('viewsms');
	Route::get('/subscribe', 'BlogController@subscribe')->name('subscribe');
});
