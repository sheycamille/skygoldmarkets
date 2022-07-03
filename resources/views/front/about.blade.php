@extends('layouts.front')

@section('title', 'About Us')

@section('about-menu-item', 'uk-active')

@section('content')
<main id="main" class="about-us-page">

        <!-- top content begin -->
        <div class="uk-section uk-padding-remove-vertical">
            <div class="about uk-light in-slideshow uk-background-cover uk-background-top-center" style="background-image: url({{ asset('front/img/in-liquid-slide-bg.png') }});" data-uk-slideshow>
                <ul class="uk-slideshow-items">
                    <li>
                        <div class="uk-container">
                            <div class="uk-grid-medium" data-uk-grid>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-overlay">
                                        <h1>@lang('message.about.about_pt1')<br>@lang('message.about.about_pt2')</h1>
                                        <p class="uk-text-lead uk-visible@m" style="font-size: 17px;" >
                                        @lang('message.about.fsa')
                                        </p>
                                    </div>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <img class="in-slide-img" src="{{ asset('front/img/in-liquid-slide-1.svg') }}" data-src="{{ asset('front/img/in-liquid-slide-1.svg') }}" alt="image-slide" width="500" height="400" data-uk-img="">
                                </div>

                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>

        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-flex uk-flex-center">
                        <div class="uk-width-3-4@m uk-text-center">
                            <h2 class="uk-margin-small-bottom">@lang('message.about.our_clients_first') <span class="in-highlight">@lang('message.about.since').</span></h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-remove">@lang('message.about.empowering_clients').</p>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <div class="uk-section uk-width-1-1 in-timeline-1">
            <hr>
            <div class="uk-grid-medium uk-child-width-1-1 uk-child-width-1-3@m" data-uk-grid>
                <div>
                    <div class="in-timeline-branch">
                        <div class="uk-flex">

                            <div class="in-timeline-title uk-flex uk-flex-middle">
                                <h4 class="uk-margin-remove-bottom">@lang('message.about.strategy')</h4>

                            </div>
                        </div>
                    </div>
                    <div class="uk-box-shadow-small uk-width-expand">
                     <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
                            <ul class="uk-list uk-list-bullet in-list-check">
                                <p>@lang('message.about.aim')</p>
                                <li>@lang('message.about.ultra_fast')</li>
                                <li>@lang('message.about.aggregation')</li>
                                <li>@lang('message.about.research')</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="in-timeline-branch">
                        <div class="uk-flex">
                         <div class="in-timeline-title uk-flex uk-flex-middle">
                                <h4 class="uk-margin-remove-bottom">@lang('message.about.vision')</h4>
                           </div>
                        </div>
                    </div>
                    <div class="uk-box-shadow-small uk-width-expand">
                        <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
                            <ul class="uk-list uk-list-bullet in-list-check">
                                <p _ngcontent-ng-cli-universal-c113="">@lang('message.about.approach').</p>
                                <li>@lang('message.about.accessible_trading')</li>
                                <li>@lang('message.about.constant_refinement')</li>
                                <li>@lang('message.about.ethical').</li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="in-timeline-branch">
                        <div class="uk-flex">

                            <div class="in-timeline-title uk-flex uk-flex-middle">
                                <h4 class="uk-margin-remove-bottom">@lang('message.about.values')</h4>

                            </div>
                        </div>
                    </div>
                    <div class="uk-box-shadow-small uk-width-expand">
                        <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">
                            <ul class="uk-list uk-list-bullet in-list-check uk">
                                <p _ngcontent-ng-cli-universal-c113="">@lang('message.about.commited').</p>
                                <li>@lang('message.about.unwavering')</li>
                                <li>@lang('message.about.investment_research')</li>

                                <li>@lang('message.about.business_model')  </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- section instruments begin -->
        <div class="uk-section in-liquid-15 in-offset-top-20 uk-background-contain uk-background-bottom-center" data-src="{{ asset('front/img/in-liquid-15-bg.png') }}" data-uk-img>
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m">
                        <div class="uk-text-center">
                            <h2 class="uk-margin-remove">@lang('message.worlds_num1')!</h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top">@lang('message.years_of_exl').</p>
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
                                    <p>@lang('message.trade_70_major').</p>
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
                                            <h6 class="uk-margin-remove">@lang('message.metals')</h6>
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
                                    <p>@lang('message.trade_major_and_minor').</p>
                                    <a href="#" class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="in-icon-wrap circle small grey">SX</i>
                                        </div>
                                        <div>
                                            <h6 class="uk-margin-remove">@lang('message.shares')</h6>
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
                                    <p>@lang('message.trade_bitcoin')</p>
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
                                <span class="count" data-counter-end="1000" data-counter-append=" clients">@lang('message.clients')</span>
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
                                    <h3>@lang('message.trade_like_a_pro')!</h3>
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
        <!-- section content end -->

</main>
@endsection
