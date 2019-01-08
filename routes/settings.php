<?php

/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('system_settings', 'SettingsController@system')->name('system.settings');
    Route::patch('system_update', 'SettingsController@system_update')->name('system.update');
    Route::post('logo_update', 'SettingsController@logo_update')->name('logo.update');
    Route::get('sms_settings', 'SettingsController@sms')->name('sms.settings');
    Route::get('payment_settings', 'SettingsController@payment')->name('payment.settings');
    Route::get('language_settings', 'SettingsController@language')->name('language.settings');
