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

                        <div class="text-left card">
                            <h1 class="mt-3 text-center"> Admin Login</h1>
                            <form method="POST" action="{{ route('adminlogin') }}" class="mt-5 card__form">
                                {{csrf_field()}}
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <br>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                        id="email" placeholder="name@example.com" required>
                                </div>


                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                <br>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Enter Password" required>
                                </div>
                                <br>

                                <div class="form-group" style="justify-content:center">
                                    <button class="uk-button uk-button-primary uk-border-rounded"
                                        type="submit">Login</button>
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
