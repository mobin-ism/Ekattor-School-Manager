<?php

/*
|--------------------------------------------------------------------------
| Multi School Routes
|--------------------------------------------------------------------------
|
| This route is responsible for managing multi school
|
*/

Route::resource('school', 'SchoolController');
Route::delete('school_switch/{id}', 'SchoolController@switch')->name('school.switch');

