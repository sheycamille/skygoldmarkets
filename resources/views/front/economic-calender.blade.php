@extends('layouts.front')

@section('title', 'Economic Calender')

@section('calender-menu-item', 'uk-active')

@section('content')

    <!-- breadcrumb content begin -->
    <div class="uk-section uk-padding-remove-vertical">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1 in-breadcrumb">
                    <ul class="uk-breadcrumb uk-float-right">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#">Tools</a></li>
                        <li><span>Economic Calender</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb content end -->

    <main id="main" class="about-us-page">

        <div class="uk-section in-liquid-6 in-offset-top-10">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m uk-background-contain uk-background-center-center" data-uk-img="">
                        <div class="uk-text-center">
                            <h1 class="uk-margin-remove">@lang('message.economic_calender.calender')</h1>
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top">@lang('message.economic_calender.become')

                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <section id="getstarted" class="section-bg wow fadeInUp">
            <div class="container" style="margin: 0 5rem ;">
                <div class="row">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container" style="width: 100%; height: 1000px;">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0"
                            src="https://www.tradingview-widget.com/embed-widget/events/?locale=en#%7B%22width%22%3A%22100%25%22%2C%22height%22%3A%221000%22%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Afalse%2C%22importanceFilter%22%3A%22-1%2C0%2C1%22%2C%22utm_source%22%3A%25skygoldmarkets.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22events%22%7D"
                            style="box-sizing: border-box; height: 1000px; width: 100%;"></iframe>
                        <style>
                            .tradingview-widget-copyright {
                                font-size: 13px !important;
                                line-height: 32px !important;
                                text-align: center !important;
                                vertical-align: middle !important;
                                font-family: 'Trebuchet MS', Arial, sans-serif !important;
                                color: #9db2bd !important;
                            }

                            .tradingview-widget-copyright .blue-text {
                                color: #2962FF !important;
                            }

                            .tradingview-widget-copyright a {
                                text-decoration: none !important;
                                color: #9db2bd !important;
                            }

                            .tradingview-widget-copyright a:visited {
                                color: #9db2bd !important;
                            }

                            .tradingview-widget-copyright a:hover .blue-text {
                                color: #1E53E5 !important;
                            }

                            .tradingview-widget-copyright a:active .blue-text {
                                color: #1848CC !important;
                            }

                            .tradingview-widget-copyright a:visited .blue-text {
                                color: #2962FF !important;
                            }
                        </style>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </section>

        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid-large uk-grid" data-uk-grid="">
                    <div class="uk-width-1-1@m uk-first-column">
                        <h3 class="uk-margin-small-bottom">@lang('message.economic_calender.how_to_use_calender')</h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove-top uk-margin-medium-bottom"
                            style="font-size: 1rem;">@lang('message.economic_calender.assist').</p>

                    </div>

                </div>
            </div>
        </div>

        <div class="uk-section in-liquid-7 in-offset-top-10">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m uk-background-contain uk-background-center-center"
                        style="background-image: url({{ asset('front/img/in-liquid-7-bg.png') }});" data-uk-img="">
                        <div class="uk-text-center">
                            <h2 class="uk-margin-remove">@lang('message.why_trade')</h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top">@lang('message.improve_result')</p>
                        </div>
                        <div class="uk-grid-medium uk-child-width-1-3@s uk-child-width-1-3@m uk-text-center uk-margin-top uk-grid"
                            data-uk-grid="">
                            <div class="uk-first-column">
                                <img src="{{ asset('front/img/in-liquid-award.svg') }}"
                                    data-src="{{ asset('front/img//in-liquid-award.svg') }}" alt="wave-award"
                                    width="71" height="58" data-uk-img="">
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">@lang('message.best_cdf')</h6>
                                <p class="uk-text-small uk-margin-remove-top">@lang('message.summit')</p>
                            </div>
                            <div>
                                <img src="{{ asset('front/img/in-liquid-award.svg') }}"
                                    data-src="{{ asset('front/img//in-liquid-award.svg') }}" alt="wave-award"
                                    width="71" height="58" data-uk-img="">
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">@lang('message.execution')</h6>
                                <p class="uk-text-small uk-margin-remove-top">@lang('message.expo')</p>
                            </div>
                            <div>
                                <img src="{{ asset('front/img/in-liquid-award.svg') }}"
                                    data-src="{{ asset('front/img//in-liquid-award.svg') }}" alt="wave-award"
                                    width="71" height="58" data-uk-img="">
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">@lang('message.best_platform')</h6>
                                <p class="uk-text-small uk-margin-remove-top">@lang('message.london_summit')</p>
                            </div>
                        </div>
                        <img class="uk-align-center" src="{{ asset('front/img//in-liquid-7-mockup.png') }}"
                            data-src="{{ asset('front/img//in-liquid-7-mockup.png') }}" alt="sample-images" width="691"
                            height="420">
                        <div class="uk-grid-divider uk-child-width-1-2@s
uk-child-width-1-4@m uk-text-center in-offset-top-10 uk-grid"
                            data-uk-grid="">
                            <div class="uk-first-column">
                                <h2 class="uk-margin-small-bottom">~30ms</h2>
                                <p class="uk-text-small uk-text-uppercase uk-margin-remove-top">@lang('message.speed')*</p>
                            </div>
                            <div>
                                <h2 class="uk-margin-small-bottom">24/5</h2>
                                <p class="uk-text-small uk-text-uppercase uk-margin-remove-top">@lang('message.support')</p>
                            </div>
                            <div>
                                <h2 class="uk-margin-small-bottom">0.0</h2>
                                <p class="uk-text-small uk-text-uppercase uk-margin-remove-top">@lang('message.spread')</p>
                            </div>
                            <div>
                                <h2 class="uk-margin-small-bottom">150+</h2>
                                <p class="uk-text-small uk-text-uppercase uk-margin-remove-top">@lang('message.instruments')</p>
                            </div>
                        </div>
                        <div class="uk-text-center uk-margin-medium-top">
                            <a class="uk-button uk-button-primary uk-border-rounded uk-margin-small-right"
                                href="#">@lang('message.creat_account')<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                            <a class="uk-button uk-button-secondary uk-border-rounded" href="#">@lang('message.discover')<i
                                    class="fas fa-angle-right uk-margin-small-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
