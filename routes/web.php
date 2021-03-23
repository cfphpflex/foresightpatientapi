<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|
*/
	

Auth::routes();


// PATIENT  data
Route::get('/getpatients', 					'PatientController@index');

Route::get('/getmodalpatientinfo', 			'PatientController@getmodalpatientinfo');

Route::get('/getmodalpatientsappointments', 			'PatientController@getmodalpatientsappointments');



