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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('backend.admin.dashboard.dashboard');
    })->name('dashboard');
    Route::resource('session_manager', 'SessionManagerController');
    Route::resource('class', 'ClassController');
    Route::resource('section', 'SectionController');
    Route::resource('teacher', 'TeacherController');
    Route::get('/section/destroy/{sectionId}', 'SectionController@destroy')->name('section.destroy');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

