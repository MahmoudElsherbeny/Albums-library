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
        {!! Form::Open(['url' => route('password.email')]) !!}
            <div class="form-group m-b-md">
                <label>Email</label>
                <input class="form-control @error('email') input-error @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email..." autocomplete="email" autofocus />
                @error('email')
                    <div class="msg-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group m-b-0 text-center">
                <button class="btn btn-app p-x-md" type="submit">Send Password Reset Link</button>
            </div>
            {!! Form::Close() !!}
    </div>
</div>
<!-- End Login Register Area -->
                    
@endsection
