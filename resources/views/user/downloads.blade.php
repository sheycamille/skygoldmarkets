@extends('layouts.app')

@section('title', 'My Downloads')

@section('downloads', 'c-active')

@section('content')

    @include('user.topmenu')
    @include('user.sidebar')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card text-center">
                        <div class="card-header">
                            <h1>METATRADER 5</h1>
                            <p class="text-center">@lang('message.body.metatrader5')</p>
                        </div>
                        <div class="card-body">
                            <a href="{{ asset('downloads/skygoldmarkets.exe') }}"
                                class="btn btn-primary">@lang('message.body.windows')</a>
                            <a href="https://download.mql5.com/cdn/mobile/mt5/android?server=AxesPrimeLtd-Demo,AxesPrimeLtd-Live"
                                class="btn btn-primary" target="_blank">@lang('message.body.android') </a>
                            <a href="https://download.mql5.com/cdn/mobile/mt5/ios?server=AxesPrimeLtd-Demo,AxesPrimeLtd-Live"
                                class="btn btn-primary" target="_blank">@lang('message.body.iphone')</a>
                        </div>
                    </div>
                    <div class="card text-center">
                        <div class="card-header">
                            <h1>METATRADER 4</h1>
                            <p class="text-center">@lang('message.body.metatrader4')</p>
                        </div>
                        <div class="card-body">
                            <a href="{{ asset('downloads/skygoldmarkets.exe') }}"
                                class="btn btn-primary">@lang('message.body.windows')</a>
                            {{-- <a href="https://download.mql5.com/cdn/mobile/mt4/android?server=AxesPrimeLtd-Demo,AxesPrimeLtd-Live"
                            class="btn btn-primary" target="_blank">@lang('message.body.android') </a>
                        <a href="https://download.mql5.com/cdn/mobile/mt4/ios?server=AxesPrimeLtd-Demo,AxesPrimeLtd-Live"
                            class="btn btn-primary" target="_blank">@lang('message.body.iphone')</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
