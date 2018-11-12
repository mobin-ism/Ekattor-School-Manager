<?php
/*
|--------------------------------------------------------------------------
| Install Routes
|--------------------------------------------------------------------------
|
| This route is responsible for handling the intallation process
|
|
|
*/
Route::get('/', 'Installation@step0');
Route::get('/step1', 'Installation@step1')->name('step1');
Route::get('/step2', 'Installation@step2')->name('step2');
Route::get('/step3/{error?}', 'Installation@step3')->name('step3');
Route::get('/step4', 'Installation@step4')->name('step4');
Route::get('/step5', 'Installation@step5')->name('step5');
Route::get('/step6', 'Installation@step6')->name('step6');

Route::post('/database_installation', 'Installation@database_installation')->name('install.db');
Route::get('import_sql', 'Installation@import_sql')->name('import_sql');