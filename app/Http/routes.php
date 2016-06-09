<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'BonusCardController@index');

Route::resource('bonus_cards', 'BonusCardController');
Route::post('bonus_cards/{bonus_cards}/update_status', 'BonusCardController@updateStatus')
    ->name('bonus_cards.update_status');
