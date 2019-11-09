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

Route::get('/','FrontController@index')->name('home2');
Route::get('details/{post_id}','FrontController@details')->name('details');
Route::get('category_post/{category_post}','FrontController@category_post')->name('category.post');
Route::get('search}','FrontController@search')->name('search');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('dashboard', function (){
   return view('admin/dashboard');
})->name('user.dashboard')->middleware('auth');



Route::resource('category', 'CategoryController');
Route::resource('post', 'PostController');
Route::resource('author', 'AuthorController');
