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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cv','CurriculumVitaeController');

Route::get('/print','PrintController');


Route::get('/mail/create/{template_id}', 'MailController@create');


Route::get('/mail/send/{batch_id}', 'MailController@mailBatch');





/* 3rd Party Vendor Routes */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


