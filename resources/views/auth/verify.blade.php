@extends('auth.layouts.app')
@section('title') Verify Email @endsection


@section('content')

<!-- Start Login Register Area -->
<div class="verify_after_register text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="register_success_icon">
                    <i class="fa fa-check-circle"></i>
                </div>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="register_success_content">
                    <p>Your account created successfully !</p>
                    <p>Please check your email to verify, enjoy with us .</p>
                </div>
                <div class="register_success_links">
                        <div class="link text-center">
                            {!! Form::open(['url' => route('verification.resend')]) !!}
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to resend another') }}</button>.
                            {!! Form::close() !!}
                        </div>
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
</div>
<!-- End Login Register Area -->

@endsection