@extends('layouts.auth')

@section('title', 'Register')

@section('content')

    <!-- section content begin -->
    <div class="uk-section uk-padding-remove-vertical">
        <div class="uk-container uk-container-expand">
            <div class="uk-grid" data-uk-height-viewport="expand: true">
                <div class="uk-width-3-5@m uk-background-cover uk-background-center-right uk-visible@m uk-box-shadow-xlarge"
                    style="background-image: url({{ asset('front/img/in-signin-image.jpeg') }});">
                </div>
                <div class="uk-width-expand@m uk-flex uk-flex-middle">
                    <div class="uk-grid uk-flex-center">
                        <div class="uk-width-3-5@m">
                            <div class="in-padding-horizontal@s">
                                <!-- module logo begin -->
                                <a class="uk-logo" href="{{ route('home') }}">
                                    <img class="in-offset-top-10" src="{{ asset('front/img/group-logo.png') }}"
                                        data-src="{{ asset('front/img/group-logo.png') }}" alt="logo" width="130"
                                        height="36" data-uk-img>
                                </a>
                                <!-- module logo begin -->
                                <p class="uk-text-lead uk-margin-top uk-margin-remove-bottom">@lang('message.register.crt')</p>
                                <p class="uk-text-small uk-margin-remove-top uk-margin-medium-bottom">@lang('message.register.already')
                                    <a href="{{ route('login') }}">Login here</a>
                                </p>

                                <div class="mb-4 text-center">
                                    @if (Session::has('status'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                            style="margin: auto;">
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <button type="button" class="text-white close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                    </div>
                                @endif

                                <!-- login form begin -->
                                <form class="uk-grid uk-form" action="{{ route('register') }}" method="post">
                                    @csrf

                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                        <span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"
                                            for="first_name"></span>
                                        <input type="text" class="uk-input uk-border-rounded" name="first_name"
                                            value="{{ old('first_name') }}" id="first_name"
                                            placeholder="@lang('message.first_name')">
                                    </div>
                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                        <span class="uk-form-icon uk-form-icon-flip fas fa-user fa-sm"
                                            for="last_name"></span>
                                        <input type="text" class="uk-input uk-border-rounded" name="last_name"
                                            value="{{ old('last_name') }}" id="last_name"
                                            placeholder="@lang('message.last_name')">
                                    </div>

                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <span class="uk-form-icon uk-form-icon-flip fas fa-envelope fa-sm"
                                            for="email"></span>
                                        <input type="email" class="uk-input uk-border-rounded" name="email"
                                            value="{{ old('email') }}" id="email" placeholder="@lang('message.register.example')">
                                    </div>

                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                        <span class="uk-form-icon uk-form-icon-flip fas fa-phone fa-sm"
                                            for="phone"></span>
                                        <input type="mumber" class="uk-input uk-border-rounded" name="phone"
                                            value="{{ old('phone') }}" id="phone" placeholder="@lang('message.register.enter_num')">
                                    </div>

                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('account_type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('account_type') }}</strong>
                                            </span>
                                        @endif
                                        <span class="uk-form-icon uk-form-icon-flip fas fa-cog fa-sm"
                                            for="account_type"></span>
                                        <select class="uk-input uk-border-rounded" name="account_type" id="account_type"
                                            required>
                                            <option>Choose Account Type</option>
                                            @foreach ($account_types as $accType)
                                                <option @if ($accType->id == request()->get('account_type')) selected @endif
                                                    value="{{ $accType->id }}">
                                                    {{ $accType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                        <span class="uk-form-icon uk-form-icon-flip fas fa-address-card fa-sm"
                                            for="address"></span>
                                        <input type="text" class="uk-input uk-border-rounded" name="address"
                                            value="{{ old('address') }}" id="address" placeholder="@lang('message.register.addrs')">
                                    </div>

                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                        <span class="uk-form-icon uk-form-icon-flip fas fa-flag fa-sm" for="country"
                                            name="country"></span>
                                        <select name="country" id="country" class="uk-input uk-border-rounded"
                                            required>
                                            <option>@lang('message.register.chs')</option>
                                            @foreach ($countries as $country)
                                                <option @if ($country->id == old('country')) selected @endif
                                                    value="{{ $country->id }}">
                                                    {{ ucfirst($country->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('state'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                        <span class="uk-form-icon uk-form-icon-flip fas fa-file fa-sm"
                                            for="state"></span>
                                        <input type="text" class="uk-input uk-border-rounded" name="state"
                                            value="{{ old('state') }}" id="state" placeholder="@lang('message.register.enter_stt')">
                                    </div>

                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('town'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('town') }}</strong>
                                            </span>
                                        @endif
                                        <span class="uk-form-icon uk-form-icon-flip fas fa-city fa-sm"
                                            for="town"></span>
                                        <input type="text" class="uk-input uk-border-rounded" name="town"
                                            value="{{ old('town') }}" id="town" placeholder="@lang('message.register.town')">
                                    </div>

                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('zip_code'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('zip_code') }}</strong>
                                            </span>
                                        @endif
                                        <span class="uk-form-icon uk-form-icon-flip fas fa-map-marker fa-sm"
                                            for="zip_code"></span>
                                        <input type="text" class="uk-input uk-border-rounded" name="zip_code"
                                            value="{{ old('zip_code') }}" id="zip_code"
                                            placeholder="@lang('message.register.enter_zip')">
                                    </div>

                                    <div class="uk-margin-small uk-width-1-1 uk-inline">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"
                                                for="password"></span>
                                            <input type="password" class="uk-input uk-border-rounded" name="password"
                                                id="password" placeholder="@lang('message.register.enter_pass')">
                                        </div>
                                        <div class="uk-margin-small uk-width-1-1 uk-inline">
                                            <span class="uk-form-icon uk-form-icon-flip fas fa-lock fa-sm"
                                                for="confirm-password"></span>
                                            <input type="password" class="uk-input uk-border-rounded"
                                                name="password_confirmation" value="{{ old('password_confirmation') }}"
                                                id="confirm-password" placeholder="@lang('message.register.confirm')">
                                        </div>
                                    </div>

                                    <div class="uk-margin-small uk-width-1-1">
                                        <button
                                            class="uk-button uk-width-1-1 uk-button-primary uk-border-rounded uk-float-left"
                                            type="submit" name="submit">@lang('message.register.reg')</button>
                                    </div>
                                </form>
                                <!-- login form end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->

@endsection
