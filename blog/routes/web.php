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

Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes([
    'reset' => false,
    'confirm' => false,
]);
Route::group(['middleware' => ['auth']], function () {
    Route::get('home','HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('members', 'MemberController');
    Route::resource('ledgers', 'LedgerController');
    Route::resource('catalogs', 'CatalogController');
    Route::resource('borrows', 'BorrowController');
    // Route::get('borrows/query', 'BorrowController@query')->name('borrows.query');
    // Route::get('borrows', 'BorrowController@index')->name('borrows.index');
    // Route::post('borrows', 'BorrowController@store')->name('borrows.store');
    // Route::delete('borrows/{id}', 'BorrowController@destroy')->name('borrows.destroy');

});
