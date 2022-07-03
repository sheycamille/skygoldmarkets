@extends('layouts.auth')

@section('title', 'Verify Email')

@section('content')
<main id="main" class="crypto-page">
    <div class="uk-section in-liquid-6 in-offset-top-10">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-5-1@m uk-background-contain uk-background-center-center">

                    <div class="text-center">
                        <div class="text-center">
                            @if(Session::has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <p class="alert-message">{!! Session::get('message') !!}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>

                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            A new verification link has been sent to the email address you provided during registration.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>

                    <div class="card text-center col-12">
                        <form method="POST" action="{{ route('verification.send') }}" class="mt-5 card__form">
                            @csrf
                            <div>
                                <button type="submit" class="mt-4 btn btn-primary uk-button uk-button-primary uk-border-rounded">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}" class="mt-5 card__form">
                            @csrf
                            <div class="form-group">
                                <button type="submit" class="mt-4 btn btn-primary uk-button uk-button-primary uk-border-rounded" style="justify-content:center">
                                    {{ __('Log Out') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
