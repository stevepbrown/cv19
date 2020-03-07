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

// DEBUGONLY(SPB): 
Route::view('/font-test','font-samples');
Route::get('/', 'GenericPageController@index');
Route::get('/faq','GenericPageController@index');
Route::get('/bio','GenericPageController@index');
Route::get('/aboutapp','GenericPageController@index');
Route::get('/ethics','GenericPageController@index');
Route::get('/cv','CVController');
Route::get('/print','PrintController');

Route::get('/contact/{contact?}','ContactController@show')->name('contact.show');

Route::post('/contact/create','ContactController@store')->name('contact.store');

/* 3rd Party Vendor Routes */
Route::group(['prefix' => 'admin'], function()
    {
    Voyager::routes();     
    Route::get('mailings','BatchMailController@index')->name('voyager.mailings.index');
    Route::get('mailings/create/{templateId}','BatchMailController@create')->name('create.mailings');
    Route::get('mailings/send/{batchId}','BatchMailController@send')->name('send.mailings');
     
});   
?>
