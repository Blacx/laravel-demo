@extends('master')

@section('content')

<div class="container">
	<div class="page-header movie-title">
      <h1>{{ $movie->title  }}</h1>
    </div>
    <div class="movie">
        <img src="{{ $movie->poster }}" alt=""/>
    </div>
</div>

@stop