@extends('master')

@section('content')

    <div class="row">
        <div class="col-xs-10 col-xs-offset-2">
            <h3>Add New Movie</h3>

            <hr class="separator"/>
        </div>
    </div>

    <form class="form-horizontal" method="post" action="{{ URL::to('movie/save')  }}" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="{{ csrf_token()  }}"/>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Movie Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Ada apa dengan cinta" required>
            </div>
        </div>

        <div class="form-group">
            <label for="poster" class="col-sm-2 control-label">Poster URL</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="poster" placeholder="movie_xxx.jpg" name="poster" required>
            </div>
        </div>

        <div class="form-group">
            <label for="overview" class="col-sm-2 control-label">Overview</label>
            <div class="col-sm-10">
                <textarea name="overview" id="overview" cols="10" rows="4" class="form-control" required></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="imdb" class="col-sm-2 control-label">IMDB ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="imdb" placeholder="ex. tt0816692" name="imdb">
            </div>
        </div>

        <div class="form-group">
            <label for="youtube" class="col-sm-2 control-label">Youtube URL</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="youtube" id="youtube" placeholder="https://www.youtube.com/watch?v=XXXXXXXXXX">
            </div>
        </div>

        <div class="form-group">
            <label for="release" class="col-sm-2 control-label">Release Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="release" name="release" required>
            </div>
        </div>

        <div class="form-group">
            <label for="director" class="col-sm-2 control-label">Director</label>
            <div class="col-sm-10">
                <select name="director" id="director" class="form-control" required>
                    <option value="">- Select Director -</option>
                    @foreach ($directors as $director)
                        <option value="{{$director->id}}">{{$director->fullname}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="writer" class="col-sm-2 control-label">Writer</label>
            <div class="col-sm-10">
                <select name="writer" id="writer" class="form-control" required>
                    <option value="">- Select Writer -</option>
                    @foreach ($writers as $writer)
                        <option value="{{$writer->id}}">{{$writer->fullname}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
                    <label for="genre" class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-10">
                        <select name="genre[]" id="genre" class="form-control" multiple="multiple" required>
                            @foreach ($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Save Movie !</button>
            </div>
        </div>
    </form>

@stop