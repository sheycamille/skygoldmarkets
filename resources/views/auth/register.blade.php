@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<main id="main" class="crypto-page">
    <div class="uk-section in-liquid-6 in-offset-top-10">
        <div class="uk-container">

            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-5-1@m uk-background-contain uk-background-center-center">
                    <div class="uk-text-center">
                        <div class="mb-4 text-center">
                            <a href="{{url('/')}}">
                                <img src="{{ asset('front/img/group-logo.png') }}"
                                    alt="{{\App\Models\Setting::getValue('site_name')}}" title=""
                                    class="img-fluid auth__logo" style="width: 15%;" />
                            </a>
                        </div>

                        <div class="mb-4 text-center">
                            @if(Session::has('status'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="margin: auto;">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <h1 class="mt-3 uk-text-center" style="font-size: 32px; margin-top: 10px;">
                            @lang('message.register.crt')
                        </h1>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="text-white close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                        @endif
                        <br>

                        <form method="POST" action="{{ route('register') }}" class="mt-5 card__form">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                    <label for="first_name">@lang('message.first_name'):</label>
                                    <input type="text" class="mr-2 form-control" name="first_name" value="{{ old('first_name') }}"
                                        id="first_name" placeholder="@lang('message.first_name')">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                    <label for="last_name">@lang('message.last_name'):</label>
                                    <input type="text" class="mr-2 form-control" name="last_name" value="{{ old('last_name') }}"
                                        id="last_name" placeholder="@lang('message.last_name')">
                                </div>
                            </div>

                            <div class="form-group">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <label for="email">@lang('message.register.email'):</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    id="email" placeholder="@lang('message.register.example')">
                            </div>

                            <div class="d-flex">
                                <div class="form-group">
                                    @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                    <label for="phone">@lang('message.register.num'):</label>
                                    <input type="mumber" class="form-control" name="phone" value="{{ old('phone') }}"
                                        id="phone" placeholder="@lang('message.register.enter_num')">
                                </div>

                                <div class="form-group">
                                    @if ($errors->has('account_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_type') }}</strong>
                                    </span>
                                    @endif
                                    <label for="account_type">@lang('message.register.type'):</label>
                                    <select class="form_control" name="account_type" id="account_type" required>
                                        <option disabled>Choose Account Type</option>
                                        @foreach ($account_types as $accType)
                                        <option @if ($accType->id == request()->get('account_type')) selected @endif
                                            value="{{ $accType->id }}">
                                            {{ $accType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                                <label for="address">@lang('message.register.addrs'):</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                    id="address" placeholder="@lang('message.register.addrs')">
                            </div>

                            <div class="form-group">
                                @if ($errors->has('country'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                                <label for="country" name="country">@lang('message.register.country'):</label>
                                <select name="country" id="country" class="form-control" style="max-width: 150px"
                                    required>
                                    <option>@lang('message.register.chs')</option>
                                    @foreach ($countries as $country)
                                    <option @if ($country->id == old('country')) selected @endif value="{{ $country->id
                                        }}">
                                        {{ ucfirst($country->name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                                @endif
                                <label for="state">@lang('message.register.state'):</label>
                                <input type="text" class="form-control" name="state" value="{{ old('state') }}"
                                    id="state" placeholder="@lang('message.register.enter_stt')">
                            </div>

                            <div class="form-group">
                                @if ($errors->has('town'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('town') }}</strong>
                                </span>
                                @endif
                                <label for="town">@lang('message.register.town'):</label>
                                <input type="text" class="form-control" name="town" value="{{ old('town') }}"
                                    id="town" placeholder="@lang('message.register.town')">
                            </div>

                            <div class="form-group">
                                @if ($errors->has('zip_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('zip_code') }}</strong>
                                </span>
                                @endif
                                <label for="zip_code">@lang('message.register.zip'):</label>
                                <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}"
                                    id="zip_code" placeholder="@lang('message.register.enter_zip')">
                            </div>

                            <div class="form-row">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                <div class="form-group">
                                    <label for="password">@lang('message.register.pass'):</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="@lang('message.register.enter_pass')">
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password">@lang('message.register.confrm'):</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" id="confirm-password"
                                        placeholder="@lang('message.register.confirm')">
                                </div>
                            </div>

                            {{-- <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Captcha:</label>
                                <div class="col-md-6">
                                    {!! NoCaptcha::display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div> --}}
                            <br>

                            <div class="form-group" style="justify-content:center">
                                <button class="mt-4 btn btn-primary uk-button uk-button-primary uk-border-rounded"
                                    type="submit">@lang('message.register.reg')</button>
                            </div>
                            <br>

                            <div class="mb-3 text-center">
                                <small class="mb-2 text-center ">@lang('message.register.already') <a
                                        href="{{ route('login') }}">@lang('message.register.log').</a> </small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
