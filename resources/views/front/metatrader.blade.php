@extends('layouts.front')

@section('title', 'MetaTrader 5')

@section('metatrader-menu-item', 'uk-active')

@section('content')
<main id="main" class="metatrader-page">
        <div class="uk-section in-liquid-6 in-offset-top-10">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-8@m uk-background-contain uk-background-center-center">
                        <div class="uk-text-center">
                            <h1 class="uk-margin-remove">@lang('message.metatrader.metatrader_title1') <br> @lang('message.metatrader.metatrader_title2')</h1>
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top">
                            @lang('message.metatrader.fx_mt5')
                            </p>
                            <img src="{{ asset('front/img/mt5.jpg') }}" />
                            <br><br>
                            <div class="uk-width-auto">
                                <a class="uk-button uk-button-primary uk-border-rounded" href="{{ route('register') }}">@lang('message.metatrader.btn_3')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-flex uk-flex-center">
                        <div class="uk-width-3-4@m uk-margin-medium-bottom">
                            <h2 class="uk-margin-small-bottom uk-text-center">@lang('message.metatrader.metatrader_five')</h2>
                            <h4 class="uk-text-center uk-margin-small-top uk-text-muted">@lang('message.metatrader.desktop_platform')</h4>
                            <p class="uk-text-center uk-text-muted uk-margin-remove" style="text-align: center; font-size: 1rem;">@lang('message.metatrader.ea_trading').</p>
                        </div>
                    </div>
                    <div class="uk-width-1-1 in-timeline-1">

                        <div class="uk-grid-medium uk-child-width-1-1 uk-child-width-1-2@m uk-grid" data-uk-grid="">
                            <div class="uk-first-column">
                                <div class="in-timeline-branch">
                                    <div class="uk-flex">

                                    </div>
                                </div>
                                <div class="uk-box-shadow-small uk-width-expand">
                                    <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
                                        <ul class="uk-list uk-list-bullet in-list-check">
                                            <li>@lang('message.metatrader.tech_indicators')</li>
                                            <li>@lang('message.metatrader.charting_tools')</li>
                                            <li>@lang('message.metatrader.frames')</li>
                                            <li>@lang('message.metatrader.order')</li>
                                            <li>@lang('message.metatrader.detachable')</li>
                                            <li>@lang('message.metatrader.from_charts')</li>
                                            <li>@lang('message.metatrader.trailing_stops')</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="uk-box-shadow-small uk-width-expand">
                                    <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
                                        <ul class="uk-list uk-list-bullet in-list-check">
                                            <li>@lang('message.metatrader.easy_to_use')</li>
                                            <li>@lang('message.metatrader.verification')</li>
                                            <li>@lang('message.metatrader.fully_cus')</li>
                                            <li>@lang('message.metatrader.custom_eas')</li>
                                            <li>@lang('message.metatrader.intergrated_calender')</li>
                                            <li>@lang('message.metatrader.dom')</li>
                                            <li>@lang('message.metatrader.win_mac')</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-section in-liquid-13">
            <div class="uk-container">
                <div class="uk-grid-large uk-child-width-1-2@m uk-grid" data-uk-grid="">
                    <div>
                        <div class="uk-card uk-card-default uk-border-rounded uk-box-shadow-medium">
                            <div class="uk-card-body">
                               <img src="{{ asset('front/img/mt5_tab.jpeg') }}" alt="mt5 trader">
                            </div>
                        </div>
                    </div>
                    <div class="uk-first-column">
                        <h4 class="uk-margin-remove">@lang('message.metatrader.download').</h4>
                        <br>
                        <div class="uk-width-auto">
                            <a class="uk-button uk-button-primary uk-border-rounded" href="#">@lang('message.metatrader.for_win')</a>
                        </div>
                        <br>
                        <div class="uk-width-auto">
                            <a class="uk-button uk-button-primary uk-border-rounded" href="#">@lang('message.metatrader.for_mac')</a>
                        </div>
                        <div class="uk-subnav uk-subnav-divider uk-margin-medium-top uk-text-small" data-uk-margin="">
                            <div class="uk-first-column uk-text-muted">@lang('message.metatrader.system_req'):</div>
                            <div class="uk-text-muted uk-margin-small-top">@lang('message.metatrader.compatible').</div>
                            <div class="uk-first-column uk-text-muted">Note:</div>
                            <div class="uk-text-muted uk-margin-small-top">@lang('message.metatrader.netting'),<br> @lang('message.metatrader.hedging').</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="uk-section in-liquid-7 in-offset-top-10">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m uk-background-contain uk-background-center-center">
                        <div class="uk-text-center">
                            <h2 class="uk-margin-remove">@lang('message.metatrader.meta_for_mobile')</h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top">@lang('message.metatrader.with_fxpro').</p>
                            <br>
                        </div>
                        <div class="uk-grid-medium uk-child-width-1-3@s uk-child-width-1-3@m uk-text-center uk-margin-top uk-grid" data-uk-grid="">
                            <div class="uk-first-column">
                                <img src="{{ asset('front/img/play-market-icon.svg') }}" data-src="{{ asset('front/img/play-market-icon.svg') }}" alt="wave-award" style="margin-top: 45%;">
                            </div>
                            <div>
                                <img src="{{ asset('front/img/mt5_mobile.jpeg') }}" data-src="{{ asset('front/img/mt5_mobile.jpeg') }}" alt="wave-award" width="500">
                            </div>
                            <div>
                                <img src="{{ asset('front/img/ios-store-icon.svg') }}" data-src="{{ asset('front/img/ios-store-icon.svg') }}" alt="wave-award" style="margin-top: 45%;">
                            </div>
                        </div>
                        <br>

                        <div class="uk-text-center uk-margin-medium-top">
                            <a class="uk-button uk-button-primary uk-border-rounded uk-margin-small-right" href="#">@lang('message.creat_account')<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                            <a class="uk-button uk-button-secondary uk-border-rounded" href="#">@lang('message.discover')<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- section stats begin -->
        <div class="uk-section in-liquid-16">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-1-2@m uk-text-center">
                        <h2>@lang('message.trade_with') <span class="in-highlight">@lang('message.world_leading')</span> @lang('message.broker').</h2>
                    </div>
                </div>
                <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-4@m uk-text-center" data-uk-grid>
                    <div>
                        <div class="in-liquid-16-counter">
                            <img class="uk-margin-remove" src="{{ asset('front/img/in-lazy.gif') }}" data-src="{{ asset('front/img/in-liquid-icon-22.svg') }}" alt="sample-icon" width="92" height="92" data-uk-img>
                            <h3 class="uk-text-muted uk-margin-top uk-margin-remove-bottom">
                                <span class="count" data-counter-end="1000" data-counter-append=" clients">1k+ clients</span>
                            </h3>
                        </div>
                    </div>
                    <div>
                        <div class="in-liquid-16-counter">
                            <img class="uk-margin-remove" src="{{ asset('front/img/in-lazy.gif') }}" data-src="{{ asset('front/img/in-liquid-icon-24.svg') }}" alt="sample-icon" width="92" height="92" data-uk-img>
                            <h3 class="uk-text-muted uk-margin-top uk-margin-remove-bottom">
                                <span class="count" data-counter-end="90" data-counter-append=" awards">@lang('message.awards')</span>
                            </h3>
                        </div>
                    </div>
                    <div>
                        <div class="in-liquid-16-counter">
                            <img class="uk-margin-remove" src="{{ asset('front/img/in-lazy.gif') }}" data-src="{{ asset('front/img/in-liquid-icon-25.svg') }}" alt="sample-icon" width="92" height="92" data-uk-img>
                            <h3 class="uk-text-muted uk-margin-top uk-margin-remove-bottom">
                                <span class="count" data-counter-end="5" data-counter-append=" customer service">@lang('message.five_star')</span>
                            </h3>
                        </div>
                    </div>
                    <div>
                        <div class="in-liquid-16-counter">
                            <img class="uk-margin-remove" src="{{ asset('front/img/in-lazy.gif') }}" data-src="{{ asset('front/img/in-liquid-icon-23.svg') }}" alt="sample-icon" width="92" height="92" data-uk-img>
                            <h3 class="uk-text-muted uk-margin-top uk-margin-remove-bottom">
                                <span class="count" data-counter-end="4" data-counter-append=" industry regulations">@lang('message.industry_regulations')<span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 in-card-16">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                            <div class="uk-grid uk-flex-middle" data-uk-grid="">
                                <div class="uk-width-1-1 uk-width-expand@m uk-first-column">
                                    <h3>@lang('message.trade_like_a_pro')</h3>
                                    <p>@lang('message.trade_cdfs').</p>
                                </div>
                                <div class="uk-width-auto">
                                    <a class="uk-button uk-button-primary uk-border-rounded" href="{{ route('register') }}">@lang('message.open_acount')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>
@endsection
