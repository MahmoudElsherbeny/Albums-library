@extends('layout.app')
@section('content')
    
    <!-- Create Alboum Form -->
    <div class="card">
        <div class="card-header">
            <h4>Update Album {{ $album->name }}</h4>
        </div>

        <div class="card-block">
            @if(Session::has('error'))
                <div class="alert alert-danger text-capitalize w-75 m-x-auto" role="alert">
                    {{Session::get('error')}}
                </div>
            @elseif(Session::has('success'))
                <div class="alert alert-success text-capitalize w-75 m-x-auto" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif

            <!--  create product form  -->
            {!! Form::Open() !!}
                <div class="form-group">
                    <label>Name:</label>
                    <input class="form-control @error('name') input-error @enderror" type="text" name="name" value="{{ old('name', $album->name) }}" placeholder="Enter album name..." />
                    @error('name')
                        <div class="msg-error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group m-b-0">
                    <button class="btn btn-success" type="submit">update</button>
                    <a href="{{ route('index') }}" class="btn btn-app">Back</a>
                </div>
            {!! Form::Close() !!}
        </div>
    </div>
    <!-- End Create Alboum Form -->

@endsection