@extends('layouts.front')

@section('title', 'About Us')

@section('about-menu-item', 'uk-active')

@section('content')

    <!-- breadcrumb content begin -->
    <div class="uk-section uk-padding-remove-vertical">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1 in-breadcrumb">
                    <ul class="uk-breadcrumb uk-float-right">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#">Company</a></li>
                        <li><span>About</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb content end -->


    <main>
        <!-- section content begin -->
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-flex uk-flex-center">
                        <div class="uk-width-3-5@m uk-text-center">
                            <h1 class="uk-margin-small-bottom">Putting our clients first<br /><span class="in-highlight">since 2016</span></h1>
                            <p class="uk-text-lead uk-text-muted uk-margin-remove-top">For more than 6 years, we’ve been empowering clients by helping them take control of their financial lives.</p>
                        </div>
                    </div>
                    <div class="uk-grid uk-grid-large uk-child-width-1-3@m uk-margin-medium-top" data-uk-grid>
                        <div class="uk-flex uk-flex-left">
                            <div class="uk-margin-right">
                                <i class="fas fa-leaf fa-lg in-icon-wrap circle primary-color"></i>
                            </div>
                            <div>
                                <h3>Philosophy</h3>
                                <p>At vero eos etme accusamus iusto odio ent dignissimos deleniti atque corrupti quos ducimus moll quilla blanditiis expedita est distinctio.</p>
                            </div>
                        </div>
                        <div class="uk-flex uk-flex-left">
                            <div class="uk-margin-right">
                                <i class="fas fa-hourglass-end fa-lg in-icon-wrap circle primary-color"></i>
                            </div>
                            <div>
                                <h3>History</h3>
                                <p>At vero eos etme accusamus iusto odio ent dignissimos deleniti atque corrupti quos ducimus moll quilla blanditiis expedita est distinctio.</p>
                            </div>
                        </div>
                        <div class="uk-flex uk-flex-left">
                            <div class="uk-margin-right">
                                <i class="fas fa-flag fa-lg in-icon-wrap circle primary-color"></i>
                            </div>
                            <div>
                                <h3>Culture</h3>
                                <p>At vero eos etme accusamus iusto odio ent dignissimos deleniti atque corrupti quos ducimus moll quilla blanditiis expedita est distinctio.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->

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

                                <li>@lang('message.about.business_model') </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- section instruments begin -->
        <div class="uk-section in-liquid-15 in-offset-top-20 uk-background-contain uk-background-bottom-center"
            data-src="{{ asset('front/img/in-liquid-15-bg.png') }}" data-uk-img>
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m">
                        <div class="uk-text-center">
                            <h2 class="uk-margin-remove">@lang('message.worlds_num1')!</h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-small-top">@lang('message.years_of_exl').</p>
                        </div>
                        <div class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m uk-margin-medium-top"
                            data-uk-grid>
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
                                    <a href="#"
                                        class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i
                                            class="fas fa-angle-right uk-margin-small-left"></i></a>
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
                                    <a href="#"
                                        class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i
                                            class="fas fa-angle-right uk-margin-small-left"></i></a>
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
                                    <a href="#"
                                        class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i
                                            class="fas fa-angle-right uk-margin-small-left"></i></a>
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
                                    <a href="#"
                                        class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i
                                            class="fas fa-angle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded">
                                    <div class="uk-flex uk-flex-middle">
                                        <div class="uk-margin-small-right">
                                            <i class="in-icon-wrap circle small grey">CX</i>
                                        </div>
                                        <div>
                                            <h6 class="uk-margin-remove">@lang('message.crypto_title')</h6>
                                        </div>
                                    </div>
                                    <p>@lang('message.trade_bitcoin')</p>
                                    <a href="#"
                                        class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i
                                            class="fas fa-angle-right uk-margin-small-left"></i></a>
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
                                    <a href="#"
                                        class="uk-button uk-button-text uk-margin-small-top">@lang('message.read_more')<i
                                            class="fas fa-angle-right uk-margin-small-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->

        <!-- section content begin -->
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-3-4@m">
                        <div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
                            <div class="uk-width-1-2@m">
                                <h4 class="uk-text-muted in-offset-bottom-10">Number speaks</h4>
                                <h1 class="uk-margin-medium-bottom">We always ready<br>for a <span class="in-highlight">challenge.</span></h1>
                                <a href="#" class="uk-button uk-button-primary uk-border-rounded">Learn more<i class="fas fa-chevron-circle-right fa-xs uk-margin-small-left"></i></a>
                            </div>
                            <div class="uk-width-1-2@m">
                                <div class="uk-margin-large" data-uk-grid>
                                    <div class="uk-width-1-3@m">
                                        <h1 class="uk-text-primary uk-text-right@m">
                                            <span class="count" data-counter-end="213">0</span>
                                        </h1>
                                        <hr class="uk-divider-small uk-text-right@m">
                                    </div>
                                    <div class="uk-width-expand@m">
                                        <h3>Trading instruments</h3>
                                        <p>Reprehenderit qui in svoluptate velit esse quam molestiae vel illum qui dolorem eum fugiat quo.</p>
                                    </div>
                                </div>
                                <div class="uk-margin-large" data-uk-grid>
                                    <div class="uk-width-1-3@m">
                                        <h1 class="uk-text-primary uk-text-right@m">
                                            <span class="count" data-counter-end="27">0</span>
                                        </h1>
                                        <hr class="uk-divider-small uk-text-right@m">
                                    </div>
                                    <div class="uk-width-expand@m">
                                        <h3>Countries covered</h3>
                                        <p>At vero eos et accusamus iusto dignissimos ducimus qui blanditiis praesentium voluta deleniti.</p>
                                    </div>
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
