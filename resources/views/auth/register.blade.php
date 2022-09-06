@extends('auth.layouts.app')

@section('content')

<div class="text-capitalize text-center" style="font-size: 28px;">
    welcome to album library
</div>

<!-- Start Login Area -->
<div class="card w-40 m-y-lg m-x-auto">
    <div class="card-header">
        <h2 class="text-center" style="font-weight: 400; font-size: 36px;">Register</h2>
    </div>

    @if(Session::has('error'))
        <div class="alert alert-danger text-capitalize w-75 m-x-auto" role="alert">
            {{Session::get('error')}}
        </div>
    @elseif(Session::has('success'))
        <div class="alert alert-success text-capitalize w-75 m-x-auto" role="alert">
            {{Session::get('success')}}
        </div>
    @endif

    <div class="card-block">
        {!! Form::Open() !!}
            <div class="form-group">
                <label>Name</label>
                <input class="form-control @error('name') input-error @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name..." autofocus />
                @error('name')
                    <div class="msg-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control @error('email') input-error @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email..." autocomplete="email" />
                @error('email')
                    <div class="msg-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control @error('password') input-error @enderror" type="password" name="password" placeholder="Enter Password.." autocomplete="current-password" />
                @error('password')
                    <div class="msg-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input class="form-control @error('password_confirmation') input-error @enderror" type="password" name="password_confirmation" placeholder="Confirm Password.." autocomplete="new-password" />
                @error('password_confirmation')
                    <div class="msg-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group m-b-0 text-center">
                <button class="btn btn-app p-x-md" type="submit">Register</button>
            </div>
            {!! Form::Close() !!}
    </div>
</div>
<!-- End Login Register Area -->

<div class="text-center">
    <a href="{{ route('register') }}">login</a> if you have account ?
</div>

@endsection