@extends('auth.layouts.app')
@section('title') Reset Password @endsection

@section('content')

<!-- Start Login Area -->
<div class="card login-register-form m-y-lg m-x-auto">
    <div class="card-header">
        <h2 class="text-center" style="font-weight: 400; font-size: 36px;">Reset Password</h2>
    </div>

    @if(Session::has('status'))
        <div class="alert alert-success text-capitalize w-75 m-x-auto" role="alert">
            {{Session::get('status')}}
        </div>
    @endif

    <div class="card-block">
        {!! Form::Open(['url' => route('password.update')]) !!}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-7">
                    <input class="form-control @error('email') input-error @enderror" type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Enter email..." autocomplete="email" autofocus />
                    @error('email')
                        <div class="msg-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-7">
                    <input class="form-control @error('password') input-error @enderror" type="password" name="password" autocomplete="new-password" />
                    @error('password')
                        <div class="msg-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row m-b-md">
                <label class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                <div class="col-md-7">
                    <input class="form-control" type="password" name="password_confirmation" autocomplete="new-password" />
                </div>
            </div>

            <div class="form-group m-b-0 text-center">
                <button class="btn btn-app p-x-md" type="submit">Reset Password</button>
            </div>
            {!! Form::Close() !!}
    </div>
</div>
<!-- End Login Register Area -->
                
@endsection