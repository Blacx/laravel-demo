<?php

class Movie extends Eloquent {

	protected $table = 'movies';

    public $timestamps = false;

    public function Director()
    {
        return $this->belongsTo('Director');
    }

    public function Genre()
    {
        return $this->belongsToMany('Genre', 'movies_genres_pivot', 'movie_id', 'genre_id');
    }

    public function getDirectorAttribute()
    {
        return $this->director()->first();
    }

    public function Writer()
    {
        return $this->belongsTo('Writer');
    }

    public function getWriterAttribute()
    {
        return $this->writer()->first();
    }

    public function getGenreAttribute()
    {
        return $this->genre()->lists('name');
    }

}