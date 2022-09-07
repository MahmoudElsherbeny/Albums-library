@extends('layout.app')

@section('content')

    <div class="albums_header m-b-sm">
        <div class="row">
            <div class="col-md-9 col-sm-6 col-xs-6">
                <h4 class="m-a-0">Albums (<span>{{count(Auth::user()->albums)}}</span>)</h4>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 text-right">
                <a href="{{ route('albums.create')}}" class="">Create New Album</a>
            </div>
        </div>
    </div>
    <div class="albums_content">
        <div class="row">
        @foreach (Auth::user()->albums as $album)        
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a class="album_link" href="{{ route('albums.info', ['id' => $album->id]) }}">
                    <div class="album_category album_category_off"></div>
                    <div class="album_category album_category_2">
                        <img src="{{ asset('storage/'.$album->album_images->last()->image) }}" width="100%" height="100%" />
                    </div>
                    <div class="album_category album_category_3">
                        <img src="{{ asset('storage/'.$album->album_images->first()->image) }}" width="100%" height="100%" />
                    </div>
                </a>

                <div class="album_name text-capitalize text-center">
                    <a href="{{ route('albums.info', ['id' => $album->id]) }}">{{ $album->name }}</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>

@endsection