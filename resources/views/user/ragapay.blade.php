@extends('layouts.app')

@section('title', 'RagaPay Payment')

@section('dw-li', 'c-show')
@section('deposits', 'c-active')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <style>
        span.select2.select2-container.select2-container--default {
            max-width: 100%;
            width: 100%;
            border: 0 none;
            border-radius: 5px;
            padding: 3px 0;
            background: white;
            color: #768192;
            font-size: .941rem;
            border: 1px solid #ddd;
            transition: .2s ease-in-out;
            transition-property: color, background-color, border;
        }

        .select2-selection {
            border: 0 none !important;
            border-radius: none !important;
            background-color: white !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #768192;
            line-height: 28px;
        }
    </style>
@endsection

@section('content')

    @include('user.topmenu')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header fw-bolder">
                            {{ $title }}
                        </div>
                        <div class="card-body">

                            @if (Session::has('message'))
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert alert-info alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            <i class="fa fa-info-circle"></i>
                                            <p class="alert-message">{!! Session::get('message') !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            @foreach ($errors->all() as $error)
                                                <i class="fa fa-warning"></i> {{ $error }}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col p-2 d-flex justify-content-center">
                                    <div class="d-flex justify-content-center">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h3 class="">Pay
                                                    <strong>{{ \App\Models\Setting::getValue('currency') }}{{ $amount }}
                                                        USD</strong>
                                                </h3>
                                            </div>

                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <div id="ragapay" class="d-flex justify-content-center col-xs-12">
                                                        <iframe src="{{ $url }}" height="400"
                                                            width="1000"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
