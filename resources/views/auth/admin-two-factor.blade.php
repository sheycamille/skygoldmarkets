@extends('layouts.auth')

@section('title', 'Admin Login')

@section('content')

<main id="main" class="adminlogin-page">
    <div class="uk-section in-liquid-6 in-offset-top-10">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-5-1@m uk-background-contain uk-background-center-center">
                    <div class="uk-text-center">

                        <div class="uk-grid uk-flex">
                            <a href="{{ url('/') }}" style="margin: auto;">
                                <img src="{{ asset('front/img/group-logo.png') }}"
                                    alt="{{ \App\Models\Setting::getValue('site_name') }}" title=""
                                    class="img-fluid auth__logo" />
                            </a>
                        </div>

                        <div class="uk-grid uk-flex">
                            @if(Session::has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: auto;">
                                <p class="alert-message">{!! Session::get('message') !!}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>

                        <form method="POST" action="{{ route('verify.store') }}">
                            {{ csrf_field() }}
                            <h1>Two Factor Verification</h1>
                            <p class="text-muted">
                                You have received an email which contains two factor login code.
                                If you haven't received it, press <a href="{{ route('admin.verify.resend') }}">here</a>.
                            </p>


                            @if ($errors->has('two_factor_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('two_factor_code') }}</strong>
                            </span>
                            @endif
                            <br>
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Two Factor Code<i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input name="two_factor_code" type="text"
                                    class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}"
                                    required autofocus placeholder="Two Factor Code" required>
                            </div>
                            <br>

                            <div class="form-group" style="justify-content:center">
                                <button class="uk-button uk-button-primary uk-border-rounded"
                                    type="submit">Verify</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection
