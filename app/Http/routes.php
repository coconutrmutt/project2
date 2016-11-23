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
Route::get('/', 'UploadImageController@getShowImage');

Route::get('viewimagebar','UploadImageController@getviewImagebar');

Route::get('viewimageicon','UploadImageController@getviewImageicon');

Route::get('admin', 'UploadImageController@getAdminpage');

Route::get('formadd', function() {
  return View::make('upload.add');
});

Route::post('add', 'UploadImageController@getmultiple_upload');	

Route::get('formupdate/{id}', 'UploadImageController@getFormUpdate');

Route::post('update', 'UploadImageController@getUpdateImage');

Route::get('uploads/logo/delete/{id}', 'UploadImageController@getDeleteImage');