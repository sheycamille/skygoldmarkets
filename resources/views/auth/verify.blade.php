@extends('layouts.auth')

@section('content')
<main id="main" class="crypto-page">

    <div class="uk-section in-liquid-6 in-offset-top-10">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-5-1@m uk-background-contain uk-background-center-center">

                            <div class="card">
                                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                                <div class="card-body">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif

                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }},
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <div class="form-group" style="justify-content:center">
                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline uk-button uk-button-primary uk-border-rounded">{{ __('click here to request another') }}</button>.
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
