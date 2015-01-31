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


class SomethingRepository{
	protected $bubur;
	protected $kacang;
	public function __construct(Bubur $bubur,Kacang $kacang){
		$this->bubur = $bubur;
		$this->kacang = $kacang;
	}
}

class Bubur{}
class Kacang{}

// Bind contoh  1
App::bind('bubur',function(){
	return new SomethingRepository(new Bubur(),new Kacang());
});

// Bind contoh  2
//$sesuatu = new Something();
//App::instance('bubur',$sesuatu);


class Computer{
	protected $processor;
	public function __construct(ProcessorInterface $processor){
		$this->processor = $processor;
	}
}

interface ProcessorInterface{}

class ProcessorIntelI7 implements ProcessorInterface{}
class ProcessorIntelI60 implements ProcessorInterface{}

App::bind('ProcessorInterface','ProcessorIntelI60');

$computer = App::make('Computer');

/*
Route::get('/',function() use($computer){
	//var_dump(App::make('bubur'));
	var_dump(App::make('Computer'));
	var_dump(App::make('Computer'));
	var_dump(App::make('Computer'));
	var_dump(App::make('Computer'));
});
*/









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
