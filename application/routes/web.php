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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/cv','CurriculumVitaeController');

Route::get('/print','PrintController');




/* 3rd Party Vendor Routes */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    
 
    Route::get('mailings/create/{template_id}','BatchMailController@create');

});
