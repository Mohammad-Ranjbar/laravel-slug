<?php


use Illuminate\Support\Facades\Route;

Route::get('/',function (){
	return 'welcome';
});



Route::resource('posts','PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
