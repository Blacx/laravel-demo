@extends('master')

@section('content')
<div class="movie row">
    <div class="col-xs-3">
        <img src="{{ $movie->poster }}" alt=""/>
    </div>

    <div class="col-xs-9">
        <div class="movie-meta">
            <p>
                <strong>Director :</strong> {{ $movie->director->fullname }}
            </p>
            <p>
                <strong>Writer :</strong> {{ $movie->writer->fullname }}
            </p>
            <p>
                <strong>Overview :</strong> {{ $movie->overview  }}
            </p>
            <p>
                <strong>Genre :</strong>
                @foreach ($movie->genre as $genre)
                   <span class="label label-primary"> {{ $genre  }}</span>
                @endforeach
            </p>
        </div>

        <div class="row">
            <div class="col-xs-12 trailer">
                @if ($trailer)
                    <iframe width="855" height="500" src="https://www.youtube.com/embed/{{$trailer}}" frameborder="0" allowfullscreen></iframe>
                @else
                    <img src="http://placehold.it/855x500&text=No+Trailer+Available" alt=""/>
                @endif
            </div>
        </div>
    </div>
</div>
@stop