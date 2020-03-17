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

Route::get('/','FrontPagesController@index');
Route::any('/properties_search','FrontPagesController@search');
Route::get('/properties/merdekanda-evlerin-alqi-satqisi-kiraye-evler-merdekanda-bag-evleri','FrontPagesController@properties')->name('properties.index');
Route::get('/properties/{id}/{slug}','FrontPagesController@properties_single')->name('properties.single');
Route::get('/contact','FrontPagesController@contact');
Route::post('/contact','FrontPagesController@contact_submit')->name('contact.submit');
Route::get('/about','FrontPagesController@about')->name('properties.about');
Route::get('/blog','FrontPagesController@blog');
Route::get('/blog/{id}','FrontPagesController@blog_single')->name('blog.single');
Route::get('/services','FrontPagesController@services')->name('services');
Route::get('/add/merdekanda-evlerin-alqi-satqisi-kiraye-evler','FrontPagesController@add')->name('properties.add');
Route::post('/add','FrontPagesController@add_submit')->name('add.submit');




Route::group(['prefix' => 'admin'], function () {

    Voyager::routes();
});
