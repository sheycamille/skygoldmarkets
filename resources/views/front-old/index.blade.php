@extends('layouts.front')

@section('title', trans(\App\Models\Setting::getValue('site_title')))

@section('home-menu-item', 'uk-active')

@section('content')
    <main>

        <!-- top content begin -->
        <div class="uk-section uk-padding-remove-vertical">
            <div class="uk-light in-slideshow uk-background-cover uk-background-top-center" style="background-image: url({{ asset('front/img/in-liquid-slide-bg.png') }});">
                <div class="uk-container">
                    <div class="uk-grid-medium" data-uk-grid>
                        <div class="uk-width-1-2@s">
                            <div class="uk-overlay">
                                <h1>@lang('message.home.title_pt1')<br>@lang('message.home.title_pt2').</h1>
                                <p class="uk-text-lead uk-visible@m">@lang('message.home.subtitle')</p>
                                    <a href="#" class="uk-button uk-button-default uk-border-rounded uk-visible@s">@lang('message.home.button_1')</a>
                            </div>
                        </div>
                        <div class="uk-width-1-2@s">
                            <img class="in-slide-img" src="{{ asset('front/img/in-liquid-slide-1.svg') }}" data-src="{{ asset('front/img/in-liquid-slide-1.svg') }}" alt="image-slide" width="500" height="400" data-uk-img>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-section in-liquid-14">
                <div class="uk-section uk-padding-remove-vertical in-slideshow-features uk-visible@m">
                    <div class="uk-container">
                        <div class="uk-grid-large uk-child-width-1-3@m slide-icons-2" data-uk-grid>
                            <div class="uk-flex uk-flex-left">
                                <div class="uk-margin-right">
                                    <img src="{{ asset('front/img/in-lazy.gif') }}" data-src="{{ asset('front/img/in-liquid-icon-19.svg') }}" alt="sample-icon" width="124" height="124" data-uk-img>
                                </div>
                                <div>
                                    <h5 class="uk-margin-remove">@lang('message.home.icon')</h5>
                                    <p class="uk-margin-small-top">@lang('message.home.icon_txt')</p>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-left">
                                <div class="uk-margin-right">
                                    <img src="{{ asset('front/img/in-lazy.gif') }}" data-src="{{ asset('front/img/in-liquid-icon-20.svg') }}" alt="sample-icon" width="124" height="124" data-uk-img>
                                </div>
                                <div>
                                    <h5 class="uk-margin-remove">@lang('message.home.icon_2')</h5>
                                    <p class="uk-margin-small-top">@lang('message.home.icon_2txt')</p>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-left">
                                <div class="uk-margin-right">
                                    <img src="{{ asset('front/img/in-lazy.gif') }}" data-src="{{ asset('front/img/in-liquid-icon-21.svg') }}" alt="sample-icon" width="124" height="124" data-uk-img>
                                </div>
                                <div>
                                    <h5 class="uk-margin-remove">@lang('message.home.icon_3')</h5>
                                    <p class="uk-margin-small-top">@lang('message.home.icon_3txt')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- top content end -->

        <!-- section features begin -->
        <div class="uk-section in-liquid-14">
            <div class="uk-container">
                <div class="uk-grid-large uk-flex uk-flex-middle" data-uk-grid>
                    <div class="uk-width-expand@m">
                        <h2>@lang('message.home.Trade_On_Mobile')</span>.</h2>
                        <p>@lang('message.home.txt_1')</p>
                        <div class="uk-grid uk-grid-collapse uk-child-width-1-3@m uk-child-width-1-2@s uk-text-center uk-margin-medium-top">
                            <div class="uk-tile uk-tile-default">
                                <p class="uk-text-lead uk-margin-remove-bottom">50+</p>
                                <p class="uk-text-small uk-text-muted uk-margin-remove-top">@lang('message.home.Trade_world_markets')</p>
                            </div>
                            <div class="uk-tile uk-tile-default">
                                <p class="uk-text-lead uk-margin-remove-bottom">1k+</p>
                                <p class="uk-text-small uk-text-muted uk-margin-remove-top">@lang('message.home.Manage_trading_accounts')</p>
                            </div>
                            <div class="uk-tile uk-tile-default">
                                <p class="uk-text-lead uk-margin-remove-bottom">10+</p>
                                <p class="uk-text-small uk-text-muted uk-margin-remove-top">@lang('message.home.payment_method')</p>
                            </div>
                            <div class="uk-tile uk-tile-default">
                                <p class="uk-text-lead uk-margin-remove-bottom">10k+</p>
                                <p class="uk-text-small uk-text-muted uk-margin-remove-top">@lang('message.home.latest_events')</p>
                            </div>
                            <div class="uk-tile uk-tile-default uk-visible@m">
                                <p class="uk-text-lead uk-margin-remove-bottom">500k</p>
                                <p class="uk-text-small uk-text-muted uk-margin-remove-top">@lang('message.home.client_acount')</p>
                            </div>
                            <div class="uk-tile uk-tile-default uk-visible@m">
                                <p class="uk-text-lead uk-margin-remove-bottom">2.1M</p>
                                <p class="uk-text-small uk-text-muted uk-margin-remove-top">@lang('message.home.daily_rev')</p>
                            </div>
                        </div>
                        <!-- <a class="uk-button uk-button-text uk-border-rounded uk-margin-medium-top" href="#">Asset protection<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                        <p class="uk-text-small">For additional information view our Investors Relations - <a href="#">clicking here.</a></p> -->
                    </div>
                    <div class="uk-width-1-2@m">
                        <img class="uk-width-1-1" src="{{ asset('front/img/in-lazy.gif') }}" data-src="{{ asset('front/img/phone_desktop.png') }}" alt="sample-image" data-width data-height data-uk-img>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->

        <!-- section instruments begin -->
        <div class="uk-section in-liquid-15 in-offset-top-20 uk-background-contain uk-background-bottom-center" data-src="{{ asset('front/img/in-liquid-15-bg.png') }}" data-uk-img>
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m">
                        <div class="uk-text-center">
                            <h2 class="uk-margin-remove">@lang('message.worlds_num1')</h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top">@lang('message.years_of_exl')</p>
                        </div>
                        <div class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m uk-margin-medium-top" data-uk-grid>
                            <div>
                                <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="in-icon-wrap circle small green">FX</i>
                                        </div>
                                        <div>
                                            <h6 class="uk-margin-remove">Forex</h6>
                                        </div>
                                    </div>
                                    <p>@lang('message.trade_70_major')</p>
                                    <a href="#" class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="in-icon-wrap circle small red">MX</i>
                                        </div>
                                        <div>
                                            <h6 class="uk-margin-remove">@lang('message.metls')</h6>
                                        </div>
                                    </div>
                                    <p>@lang('message.trade_metal_comodities').</p>
                                    <a href="#" class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="in-icon-wrap circle small blue">IX</i>
                                        </div>
                                        <div>
                                            <h6 class="uk-margin-remove">Indices</h6>
                                        </div>
                                    </div>
                                    <p>@lang('message.trade_major_and_minor')</p>
                                    <a href="#" class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="in-icoMutliple Instrumentsn-wrap circle small grey">SX</i>
                                        </div>
                                        <div>
                                            <h6 class="uk-margin-remove">@lang('message.shres')</h6>
                                        </div>
                                    </div>
                                    <p>@lang('message.hundreds_of_companies').</p>
                                    <a href="#" class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="in-icon-wrap circle small grey">CX</i>
                                        </div>
                                        <div>
                                            <h6 class="uk-margin-remove">@lang('message.Cryptocurrencies')</h6>
                                        </div>
                                    </div>
                                    <p>@lang('message.trde_bitcn')</p>
                                    <a href="#" class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="in-icon-wrap circle small grey">EX</i>
                                        </div>
                                        <div>
                                            <h6 class="uk-margin-remove">Energies</h6>
                                        </div>
                                    </div>
                                    <p>@lang('message.discover_opportunities').</p>
                                    <a href="#" class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->

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
        <!-- section content end -->

        <!-- section cta begin -->
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 in-card-16">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                            <div class="uk-grid uk-flex-middle" data-uk-grid>
                                <div class="uk-width-1-1 uk-width-expand@m">
                                    <h3>@lang('message.trade_like_a_pro')</h3>
                                    <p>@lang('message.trade_cdfs')</p>
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
        <!-- section content end -->

        <!-- section compliment begin -->
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-flex uk-flex-center">
                        <div class="uk-width-3-4@m uk-text-center">
                            <h2 class="uk-margin-small-bottom">@lang('message.compliment_trading')</h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-remove">@lang('message.skygoldmarkets_clients')</p>
                        </div>
                    </div>
                    <div class="uk-grid uk-grid-large uk-child-width-1-4@m uk-margin-medium-top" data-uk-grid>
                        <div class="uk-flex">
                            <div>
                                <h3>@lang('message.calender')</h3>
                                <p>@lang('message.econs_earnings')</p>
                            </div>
                        </div>
                        <div class="uk-flex">
                            <div>
                                <h3>@lang('message.analysis')</h3>
                                <p>@lang('message.trading_central')</p>
                            </div>
                        </div>
                        <div class="uk-flex">
                            <div>
                                <h3>@lang('message.reviews')</h3>
                                <p>@lang('message.daily_market_reviews')</p>
                            </div>
                        </div>
                        <div class="uk-flex">
                            <div>
                                <h3>@lang('message.knowledge')</h3>
                                <p>@lang('message.education')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->

    </main>
@endsection
