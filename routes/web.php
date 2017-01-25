<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();


/*Backend*/
Route::group(['namespace' => 'backend','prefix' => 'admin'], function () {

    Route::resource('blog', 'BlogController');

});
/*Frontend*/
Route::group(['namespace' => 'frontend'], function () {

    Route::get('/', 'BlogController@index')->name('blog');
    Route::get('/blog/{link}', 'BlogController@show')->name('blog.show');

});
