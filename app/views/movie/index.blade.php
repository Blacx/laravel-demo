@extends('master')

@section('content')
<div class="movies">
    @foreach ($movies as $movie)
        <li>
            <span>
                <a href="{{ URL::to('movie', $movie->id)  }}">{{ $movie->title  }}</a>
                ({{ date( 'Y', strtotime($movie->release_date) )  }})
            </span>
        </li>
    @endforeach

    <p class="separator"></p>

    <span><a class="btn btn-primary" href="{{ URL::to('movie/new')  }}">Add New Movie</a></span>
</div>
@stop