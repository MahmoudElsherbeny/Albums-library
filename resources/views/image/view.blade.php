@extends('layout.app')

@section('content')

    <div class="albums_header m-b-sm p-x-sm">
        <div class="row">
            <div class="col-md-8">
                <span class="p-r-sm">
                    <a href="{{ route('albums.info', ['id' => $img->album->id]) }}" style="color: #333">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </span>
                <h4 class="text-capitalize m-a-0 m-t-xs" style="display: inline-block"> 
                    {{ $img->album->name }}<span>/{{ $img->image }}</span>
                </h4>
            </div>
            <div class="links col-md-4 text-right">
                <button data-toggle="modal" data-target="#MoveToAlbum{{ $img->id }}">Move To Album</button>
                <span class="p-x-sm">|</span>
                <button data-toggle="modal" data-target="#ImgDelete{{ $img->id }}">Delete</button>
            </div>

            <!-- Move To album Modal -->
            <div class="modal fade" id="MoveToAlbum{{ $img->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-card-header">
                            <div class="row">
                                <h4 class="col-md-11 text-left">Move To Another Album</h4>
                                <ul class="card-actions col-md-1 p-t-md">
                                    <li>
                                        <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {!! Form::Open(['url' => route('images.moveTo', ['id' => $img->id, 'album' => $img->album->id])]) !!}
                        <div class="card-block text-left">
                            <div class="form-group">
                                <label>Move To Album:</label>
                                <select class="form-control" name="new_album">
                                    <option value="0">choose album</option>
                                    @foreach ($albums as $new_album)
                                        <option value="{{ $new_album->id }}">{{ $new_album->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Or Move To New Album:</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="new album name" />
                                @error('name')
                                    <div class="msg-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                                <button class="btn btn-success" type="submit"> Move</button>
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>
            <!-- End Modal -->
            <!-- delete Modal -->
            <div class="modal fade" id="ImgDelete{{ $img->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-card-header">
                            <div class="row">
                                <h4 class="col-md-11 text-left">Delete Image</h4>
                                <ul class="card-actions col-md-1 p-t-md">
                                    <li>
                                        <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block text-left">
                            <p>Are you sure, you want to delete this image ?</p>
                        </div>
                        <div class="modal-footer">
                            {!! Form::Open(['url' => route('images.delete', ['id' => $img->id, 'album' => $img->album->id])]) !!}
                                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                                <button class="btn btn-app" type="submit"> Delete</button>
                            {!! Form::Close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
        </div>
    </div>
    <div class="albums_content">
        <div class="m-y-md">
            <img src="{{ asset('storage/'.$img->image) }}" width="100%" height="100%" />
        </div>
    </div>

@endsection