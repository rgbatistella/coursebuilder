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

Route::get('/', function()
{
    return View::make('home');
});

Route::get('/courses', ['as'=>'course.index','uses'=>'CourseController@index']);
Route::get('/courses/create', ['as'=>'course.create', 'uses'=>'CourseController@create']);
Route::post('/courses', ['as'=>'course.store', 'uses'=>'CourseController@store']);
Route::get('/course/{id}', ['as'=>'course', 'uses'=>'CourseController@show']);
Route::get('/course/edit/{id}', ['as'=>'course.edit', 'uses'=>'CourseController@edit']);
Route::patch('/course/update/{id}', ['as'=>'course.update', 'uses'=>'CourseController@update']);
Route::get('/course/del/{id}', ['as'=>'course.destroy', 'uses'=>'CourseController@destroy']);

Route::get('/chapters/create/{course_id}', ['as'=>'chapter.create', 'uses'=>'ChaptersController@create']);
Route::post('/chapters/{course_id}', ['as'=>'chapter.store', 'uses'=>'ChaptersController@store']);
Route::get('/chapters/del/{id}', ['as'=>'chapter.destroy', 'uses'=>'ChaptersController@destroy']);
Route::get('/chapter/edit/{id}', ['as'=>'chapter.edit', 'uses'=>'ChaptersController@edit']);
Route::patch('/chapter/update/{id}', ['as'=>'chapter.update', 'uses'=>'ChaptersController@update']);
Route::get('/chapter/{id}', ['as'=>'chapter', 'uses'=>'ChaptersController@show']);
Route::get('/chapter/reorder/{id}/{from}/{to}', ['as'=>'chapter.reorder', 'uses'=>'ChaptersController@reorder']);

Route::get('/contents/create/{chapter_id}', ['as'=>'contents.create', 'uses'=>'ContentsController@create']);
Route::post('/contents/{chapter_id}', ['as'=>'content.store', 'uses'=>'ContentsController@store']);
Route::get('/contents/del/{id}', ['as'=>'content.destroy', 'uses'=>'ContentsController@destroy']);
Route::get('/contents/sel/{id}', ['as'=>'content.select', 'uses'=>'ContentsController@select']);
Route::get('/contents/sel_next/{id}', ['as'=>'content.select_next', 'uses'=>'ContentsController@select_next']);
Route::get('/contents/edit/{id}', ['as'=>'content.edit', 'uses'=>'ContentsController@edit']);
Route::patch('/contents/update/{id}', ['as'=>'content.update', 'uses'=>'ContentsController@update']);
Route::get('/content/reorder/{id}/{from}/{to}', ['as'=>'content.reorder', 'uses'=>'ContentsController@reorder']);

Route::get('/myassets', ['as'=>'myassets.index','uses'=>'AssetController@index']);
Route::get('/myassets/create', ['as'=>'myassets.create', 'uses'=>'AssetController@create']);
Route::post('/myassets', ['as'=>'myassets.store', 'uses'=>'AssetController@store']);
Route::get('/myassets/edit/{id}', ['as'=>'myassets.edit', 'uses'=>'AssetController@edit']);
Route::patch('/myassets/update/{id}', ['as'=>'myassets.update', 'uses'=>'AssetController@update']);
Route::get('/myassets/del/{id}', ['as'=>'myassets.destroy', 'uses'=>'AssetController@destroy']);

Route::get('/login', function()
{
    return View::make('login');
});
