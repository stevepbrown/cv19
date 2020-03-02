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

Route::get('/', 'GenericPageController@show');
Route::get('/contact','contactController@show')->name('contact.show');
Route::get('/faq','GenericPageController@show');
Route::get('/bio','GenericPageController@show');
Route::get('/aboutapp','GenericPageController@show');
Route::get('/ethics','GenericPageController@show');
Route::get('/cv','CVController');
Route::get('/print','PrintController');


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
