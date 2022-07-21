@extends('layouts.app')

@section('title', 'My Downloads')

@section('downloads', 'c-active')

@section('content')

    @include('user.topmenu')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card text-center">
                        <div class="card-header">
                            <h1>TRADER</h1>
                            <p class="text-center">Download our Trader</p>
                        </div>
                        <div class="card-body">
                            <a href="https://web.skygoldmarkets.com" class="btn btn-primary"
                                target="_blank">@lang('message.launch_webtrader')</a>
                            <a href="https://mobius-trader.s3.eu-north-1.amazonaws.com/MobiusTrader/MobiusTrader-Mobius.win.exe"
                                class="btn btn-primary">@lang('message.body.windows')</a>
                            <a href="https://play.google.com/store/apps/details?id=com.mtrader7.terminal&hl=en"
                                class="btn btn-primary" target="_blank">@lang('message.body.android') </a>
                            {{-- <a href=""
                                class="btn btn-primary" target="_blank">@lang('message.body.iphone')</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
