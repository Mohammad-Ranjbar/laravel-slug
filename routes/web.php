<?php


use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@page');



Route::resource('posts','PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
