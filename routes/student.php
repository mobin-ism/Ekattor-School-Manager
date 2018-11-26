<?php
/*
|--------------------------------------------------------------------------
| Addon Routes
|--------------------------------------------------------------------------
|
| This route is responsible for handling the all the Student process
|
|
|
*/
    Route::resource('student', 'StudentController');
    Route::get('student/add/bulk', 'StudentController@bulk_student_create')->name('student.bulk');
    Route::get('student/add/excel', 'StudentController@excel_student_create')->name('student.excel');
    Route::post('student/store/bulk', 'StudentController@bulk_student_store')->name('student.store.bulk');
    Route::post('student/store/excel', 'StudentController@excel_student_store')->name('student.store.excel');
    Route::get('student_profile/{student}', 'StudentController@profile')->name('student.profile');
    Route::get('generate_csv_file', 'StudentController@generate_csv_file')->name('student.generate.csv');
