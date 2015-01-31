<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get( '/', 'HomeController@movie_index' );

Route::get('movie/new', 'HomeController@movie_new');
Route::post('movie/save', 'HomeController@movie_save');
Route::post('movie/update', 'HomeController@movie_update');
Route::post('movie/{id}/destroy', 'HomeController@movie_update');
Route::get('movie/{id}', 'HomeController@movie_single');
Route::get('movie/{id}/edit', 'HomeController@movie_edit');
Route::get('movie/{id}/delete', 'HomeController@movie_delete');

Route::group(array('prefix' => 'api'), function() {

	Route::group(array('prefix' => 'v1'), function() {

		/*
		 * Movies API
		 */
		Route::group(array('prefix' => 'movies'), function() {
			Route::get( '/', 'APIMovieController@showMovies' );
		});

	});

});
