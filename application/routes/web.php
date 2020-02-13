<?php

use App\Http\Controllers\BatchMailController;


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

/* <<GET>> */

Route::get('/', 'GenericPageController@show');

Route::get('/contact','ContactController@show');

Route::get('/faq','GenericPageController@show');

Route::get('/bio','GenericPageController@show');

Route::get('/aboutapp','GenericPageController@show');

Route::get('/cv','CVController');

Route::get('/print','PrintController');




/* 3rd Party Vendor Routes */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('mailings','BatchMailController@index')->name('browse.mailings');
    Route::get('mailings/create/{templateId}','BatchMailController@create')->name('create.mailings');
    Route::get('mailings/send/{batchId}','BatchMailController@send')->name('send.mailings');
    
   
/* <<POST>>*/    

Route::post('contact','ContactController@store')->name('contact.store');

});
