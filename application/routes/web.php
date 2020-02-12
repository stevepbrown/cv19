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

// /*
// Implicit Binding -Laravel automatically resolves Eloquent models defined in routes or controller actions whose type-hinted variable names match a route segment name
// */
// Route::get('/contact', function(App\PageProps $pageProps){

//     $pageProps = $pageProps->where('name','contact')->get(['name',
//     'meta_description',
//     'slug',
//     'title',
//     'page_id'])->toArray();

//     return view('contact')->with($pageProps);

// });


Route::get('/contact','GenericPageController@show');

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
    
    
   

});
