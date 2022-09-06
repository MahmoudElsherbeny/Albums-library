@extends('layout.app')

@section('content')

    <div class="albums_header m-b-sm p-x-md">
        <div class="row">
            <div class="col-md-8">
                <span class="p-r-sm">
                    <a href="{{ route('index') }}" style="color: #333">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </span>
                <h4 class="text-capitalize m-a-0 m-t-xs" style="display: inline-block"> 
                    {{ $album->name }} (<span>{{ count($album->album_images) }}</span>)
                </h4>
            </div>
            <div class="links col-md-4 text-right">
                <button data-toggle="modal" data-target="#AddToAlbum{{ $album->id }}">Add To Album</button>
                <span class="p-x-sm">|</span>
                <a href="{{ route('albums.edit', ['id' => $album->id])}}">Change Name</a>
                <span class="p-x-sm">|</span>
                <button data-toggle="modal" data-target="#AlbumDelete{{ $album->id }}">Delete Album</button>
            </div>

            <!-- Add To album Modal -->
            <div class="modal fade" id="AddToAlbum{{ $album->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-card-header">
                            <div class="row">
                                <h4 class="col-md-11 text-left">Add To Album {{ $album->name }}</h4>
                                <ul class="card-actions col-md-1 p-t-md">
                                    <li>
                                        <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {!! Form::Open(['url' => route('albums.addTo', ['id' => $album->id]), 'files' => 'true']) !!}
                        <div class="card-block text-left">
                            <div class="form-group">
                                <label>Images:</label>
                                <input class="images" type="file" name="images[]" multiple />
                                @error('images')
                                    <div class="msg-error">{{ $message }}</div>
                                @enderror
                                @error('images.*')
                                    <div class="msg-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                                <button class="btn btn-success" type="submit"> Add</button>
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>
            <!-- End Modal -->

            <!-- delete Modal -->
            <div class="modal fade" id="AlbumDelete{{ $album->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-card-header">
                            <div class="row">
                                <h4 class="col-md-11 text-left">Delete Album</h4>
                                <ul class="card-actions col-md-1 p-t-md">
                                    <li>
                                        <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {!! Form::Open(['url' => route('albums.delete', ['id' => $album->id])]) !!}
                        <div class="card-block text-left">
                            <p>Are you sure, you want to delete Alibum ({{ $album->name }}) ?</p>
                            <p> <b>Notice:</b> when you delete album you delete all album images, so if you want to move images to another album choose below. </p>
                            <div class="form-group">
                                <select class="form-control" name="new_album">
                                    <option value="0">choose album</option>
                                    @foreach ($albums as $new_album)
                                        <option value="{{ $new_album->id }}">{{ $new_album->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                                <button class="btn btn-app" type="submit"> Delete</button>
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>
            <!-- End Modal -->
        </div>
    </div>
    <div class="albums_content">
        <div class="row">
        @foreach ($album->album_images as $image)        
            <div class="col-md-3 col-sm-4 col-xs-6">
                <a href="{{ route('images.view', ['id' => $image->id, 'album' => $album->id]) }}" class="album_image_container">
                    <div class="album_image album_image_off"></div>
                    <div class="album_image">
                        <img src="{{ asset('storage/'.$image->image) }}" width="100%" height="100%" />
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>

@endsection