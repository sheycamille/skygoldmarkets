@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<main id="main" class="crypto-page">
    <div class="uk-section in-liquid-6 in-offset-top-10">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-5-1@m uk-background-contain uk-background-center-center">
                    <div class="uk-text-center">
                        <div class="col-12">
                            <div class="text-center">
                                @if(Session::has('message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <p class="alert-message">{!! Session::get('message') !!}</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="mb-4 text-center">

                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: auto;">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            @endif
                        </div>

                        <div class="card ">
                            <h1 class="mt-3 text-center">@lang('message.forgot_pass.pasreset')</h1>
                            <form method="POST" action="{{ route('password.email') }}" class="mt-5 card__form">
                                {{csrf_field()}}

                                <div class="form-row">
                                    <div class="form-group" style="display:block">
                                        @if ($errors->has('email'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                        @endif
                                        <br>
                                        <div>@lang('message.forgot_pass.forgot').</div>
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="@lang('message.register.example')" required>
                                    </div>
                                </div>
                                <br>

                                <div class="form-group" style="justify-content:center">
                                    <button class="uk-button uk-button-primary uk-border-rounded" type="submit">@lang('message.forgot_pass.link')</button>
                                </div>
                                <div class="mb-3 text-center">
                                    <small class="mb-2 text-center "> <a href="{{route('login')}}">@lang('message.forgot_pass.repeat').</a> </small>
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
