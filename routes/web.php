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
    Route::get('/section/destroy/{sectionId}', 'SectionController@destroy')->name('section.destroy');

    Route::resource('teacher', 'TeacherController');
    Route::get('teacher_permission/{teacher_id}', 'TeacherController@assigned_permissions')->name('teacher.permission');

    Route::resource('department', 'DepartmentController');
    Route::resource('parent', 'ParentController');
    Route::resource('accountant', 'AccountantController');
    Route::resource('librarian', 'LibrarianController');
    Route::resource('permission', 'TeacherPermissionController');
    Route::post('assign_permission', 'TeacherPermissionController@assign_permission')->name('permission.assign');

});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
