@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<main id="main" class="crypto-page">
    <div class="uk-section in-liquid-6 in-offset-top-10">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-5-1@m uk-background-contain uk-background-center-center">
                    <div class="uk-text-center">
                        <div class="text-center">
                            @if(Session::has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <p class="alert-message">{!! Session::get('message') !!}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            @endif

                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            @endif
                        </div>

                        <div class="card ">
                            <h1 class="mt-3 text-center">Create new password</h1>
                            <form method="POST" action="{{ route('password.update') }}" class="mt-5 card__form">
                                {{csrf_field()}}
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} ">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <br>
                                    <label for="email">Email address</label>

                                    <input type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ $email or old('email') }}" id="email" placeholder="name@example.com" required>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <br>
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                                </div>

                                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                    <br>
                                    <label for="password-confirm">Password Confirmation</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Enter Password" required>
                                </div>
                                <br>

                                <div class="form-group" style="justify-content:center">
                                    <button class="uk-button uk-button-primary uk-border-rounded" type="submit">Reset Password</button>
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
