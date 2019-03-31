<?php

//SETTINGS
Route::get('settings', 'Common\Settings\SettingsController@index');
Route::post('settings', 'Common\Settings\SettingsController@persist');