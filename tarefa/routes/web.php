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
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/','AdminController@index')->name('admin.home');
    Route::get('balance','AdminBalanceController@index')->name('admin.balance');
    
    Route::get('deposit', 'AdminBalanceController@deposit')->name('balance.deposit');
    Route::post('deposit/insert', 'AdminBalanceController@depositInsert')->name('deposit.insert');
    
    Route::get('draw', 'AdminBalanceController@draw')->name('balance.draw');
    Route::post('draw/store','AdminBalanceController@drawStore')->name('draw.store');

    Route::get('transfer', 'AdminBalanceController@transfer')->name('balance.transfer');
    Route::post('transfer/store','AdminBalanceController@transferStore')->name('transfer.store');
    Route::post('transfer/confirm','AdminBalanceController@transferConfirm')->name('transfer.confirm');

    Route::get('extract','AdminHistoricController@historic')->name('admin.historic');
    Route::any('extract/search','AdminHistoricController@searchExtract')->name('historic.search');

    Route::get('profile','UserController@profile')->name('profile');
    Route::post('profile-update','UserController@profileUpdate')->name('profile.update');
    Route::get('changepwd','UserController@changePassword')->name('profile.changepwd');
    Route::post('changepwd','UserController@passwordConfirm')->name('changepwd.confirm');
    Route::any('changepwd/store','UserController@passwordStore')->name('changepwd.store');

    Route::get('profile/delete','UserController@deleteAccount')->name('profile.delete');

    
});



Route::get('/','SiteController@index')->name('site.home');


Auth::routes();
