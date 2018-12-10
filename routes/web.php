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
        return view('backend.'.Auth::user()->role.'.dashboard.dashboard');
    })->name('dashboard');

    Route::resource('session_manager', 'SessionManagerController');
    Route::delete('session_activate/{id}', 'SessionManagerController@active')->name('session.active');

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

    Route::resource('role', 'RoleController');
    Route::get('accessibility/{role}', 'RoleController@editAccessibility')->name('accessibility.edit');
    Route::patch('accessibility/{role}', 'RoleController@updateAccessibility')->name('accessibility.update');

    Route::resource('daily_attendance', 'DailyAttendanceController');
    Route::post('show_attendance', 'DailyAttendanceController@show')->name('daily_attendance.show_attendance');
    Route::post('student_list', 'DailyAttendanceController@students')->name('daily_attendance.students');

    Route::resource('subject', 'SubjectController');

    Route::resource('routine', 'RoutineController');
    Route::get('get_subject/{class_id}', 'RoutineController@subject')->name('routine.subject');

    Route::resource('room', 'ClassRoomController');

    Route::resource('book', 'BookController');
    Route::resource('book_issue', 'BookIssueController');
    Route::get('student_list/{class_id}', 'BookIssueController@student')->name('book_issue.student');
    Route::delete('return_book/{book_id}', 'BookIssueController@return')->name('book_issue.return');

    Route::resource('exam', 'ExamController');
    Route::resource('grade', 'GradeController');

    Route::resource('expense_category', 'ExpenseCategoryController');
    Route::resource('expense', 'ExpenseController');

});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
