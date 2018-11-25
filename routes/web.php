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

    Route::resource('student', 'StudentController');
    Route::get('student/add/bulk', 'StudentController@bulk_student_create')->name('student.bulk');
    Route::get('student/add/excel', 'StudentController@excel_student_create')->name('student.excel');
    Route::post('student/store/bulk', 'StudentController@bulk_student_store')->name('student.store.bulk');
    Route::post('student/store/excel', 'StudentController@excel_student_store')->name('student.store.excel');
    Route::get('student_profile/{student}', 'StudentController@profile')->name('student.profile');
    Route::get('generate_csv_file', 'StudentController@generate_csv_file')->name('student.generate.csv');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
