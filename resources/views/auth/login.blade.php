@extends('auth.layouts.app')
@section('title') Login @endsection

@section('content')

<div class="text-capitalize text-center" style="font-size: 28px;">
    welcome to album library
</div>

<!-- Start Login Area -->
<div class="card login-register-form m-y-lg m-x-auto">
    <div class="card-header">
        <h2 class="text-center" style="font-weight: 400; font-size: 36px;">Login</h2>
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
                <label>Email</label>
                <input class="form-control @error('email') input-error @enderror" type="text" name="email" value="{{ old('email') }}" placeholder="Enter email..." autocomplete="email" autofocus />
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
                <div class="row">
                    <div class="col-md-9 col-sm-6 col-xs-6">
                        <label for="login_remember" class="css-input switch switch-sm switch-app">
                            <input type="checkbox" name="remember" id="login_remember" {{ old('remember') ? 'checked' : ''}}><span></span> Remember me
                        </label>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 text-right">
                        <a href="{{ route('password.request') }}" style="font-size: 12px;">Forget Password?</a>
                    </div>
                </div>
            </div>
            <div class="form-group m-b-0 text-center">
                <button class="btn btn-app p-x-md" type="submit">Login</button>
            </div>
            {!! Form::Close() !!}
    </div>
</div>
<!-- End Login Register Area -->

<div class="text-center">
    <a href="{{ route('register') }}">create account</a> if you don't have one ?
</div>

@endsection