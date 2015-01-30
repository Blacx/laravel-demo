@extends('master')

@section('content')

<div class="container">
	<div class="page-header">
      <h1>Movie List</h1>
    </div>
    <div class="movies">
        @foreach ($movies as $movie)
            <li>
                <span>
                    <a href="{{ URL::to('movie', $movie->id)  }}">{{ $movie->title  }}</a>
                    ({{ date( 'Y', strtotime($movie->release_date) )  }})
                </span>
            </li>
        @endforeach
    </div>
</div>

@stop