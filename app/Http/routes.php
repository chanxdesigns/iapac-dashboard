<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "HomeController@hello");
Route::get('completes', "ProjectStatusController@showCompletes");
Route::get('complete/{projectid}', "ShowResultsController@showCompleteResults");
Route::get('incompletes', "ProjectStatusController@showTerminates");
Route::get('incomplete/{projectid}', "ShowResultsController@showTerminateResults");
Route::get('quotafull', "ProjectStatusController@showQuotafull");
Route::get('quotafull/{projectid}', "ShowResultsController@showQuotafullResults");