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

Route::get('/', 'GenericPageController@show');


Route::get('/contact','GenericPageController@show');

Route::get('/faq','GenericPageController@show');

Route::get('/bio','GenericPageController@show');

Route::get('/aboutapp','GenericPageController@show');

Route::get('/cv','CVController');

Route::get('/print','PrintController');




/* 3rd Party Vendor Routes */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    // Route::get('mailings','BatchMailController@index');
    Route::get('mailings/create/{templateId}','BatchMailController@create');
    Route::get('mailngs/send/{batchId}','BatchMailController@send');
    
    
   

});
