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
Route::get('movie/{id}', 'HomeController@movie_single');

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
