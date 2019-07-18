<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Courses
 */
Route::namespace('Courses')->group(function () {
    Route::get('/courses', 'CourseController@index')->name('courses.index');
});