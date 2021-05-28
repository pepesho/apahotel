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
    Route::resource('overdues', 'OverdueController');
    Route::get('/member/confirm', "MemberController@confirm")->name("member.confirm");
    Route::get('/borrow/confirm', "BorrowController@confirm")->name("borrow.confirm");
    Route::get('/ledger/confirm', "LedgerController@confirm")->name("ledger.confirm");
    Route::get('/catalog/confirm', "CatalogController@confirm")->name("catalog.confirm");
    Route::get('isbn', 'CatalogController@isbn')->name('catalogs.isbn');
    Route::post('check', 'CatalogController@check')->name('catalogs.check');
});
