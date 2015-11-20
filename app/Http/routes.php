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
Route::get('/home', "HomeController@hello");
Route::get('completes', "ProjectStatusController@showCompletes");
Route::get('complete/{projectid}', "ShowResultsController@showCompleteResults");
Route::get('incompletes', "ProjectStatusController@showTerminates");
Route::get('incomplete/{projectid}', "ShowResultsController@showTerminateResults");
Route::get('quotafull', "ProjectStatusController@showQuotafull");
Route::get('quotafull/{projectid}', "ShowResultsController@showQuotafullResults");
Route::get('admin', 'Auth\AuthController@getLogin');
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('admin/logout', 'Auth\AuthController@getLogout');
Route::get('/adminpanel', ['middleware' => 'auth', 'uses' => 'AdminPanelController@showAdminPanel']);
Route::get('/adminpanel/projects/{id}/{status}/{country}', 'AdminPanelController@getData');
Route::post('/adminpanel/projects/delete', 'AdminPanelController@deleteData');
Route::post('/adminpanel/projects/create', 'CreateProjectController@createProject');