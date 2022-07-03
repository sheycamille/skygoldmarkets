@extends('layouts.front')

@section('title', 'Order Execution')

@section('order-execution-menu-item', 'active')

@section('content')

<main id="main" class="security-page">
    <div class="uk-section in-liquid-6 in-offset-top-10">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-5-6@m uk-background-contain uk-background-center-center">
                    <div class="uk-text-center">
                        <h1 class="uk-margin-remove">@lang('message.order_execution.order') </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1 uk-flex uk-flex-center">
                    <div class="uk-width-3-4@m uk-margin-medium-bottom ">
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.order_pol')
                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b1')
                            <br><br>@lang('message.order_execution.b2')

                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.scope')</h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b3')
                            <br><br>@lang('message.order_execution.b4')

                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.exe')
                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b5')
                            <br><br>@lang('message.order_execution.b6')

                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">a)
                            @lang('message.order_execution.quotes')

                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b7')
                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">b)
                            @lang('message.order_execution.charges')
                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b8')
                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">c)
                            @lang('message.order_execution.all')

                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b9')

                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">d)
                            @lang('message.order_execution.frequency')

                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b10')

                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.instruments')

                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b11')
                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.b12')
                        </h3>
                        <ul class="uk-list uk-list-bullet ">
                            <li> @lang('message.order_execution.l1') </li>
                            <li>@lang('message.order_execution.l2')
                            </li>
                            <li> @lang('message.order_execution.l3')</li>
                            <li> @lang('message.order_execution.l4') </li>
                        </ul>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.l5')
                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.l6')

                        </p>
                        <ul class="uk-list uk-list-bullet ">
                            <li> @lang('message.order_execution.l7')
                            </li>
                            <li> @lang('message.order_execution.l8')
                            </li>
                            <li> @lang('message.order_execution.l9') </li>
                            <li> @lang('message.order_execution.l10').</li>
                        </ul>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.instructions')
                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b13').
                            <br><br>@lang('message.order_execution.b14') .

                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.entities')
                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b15')

                            <br><br>@lang('message.order_execution.b16')

                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.review')
                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b21')

                            <br><br>@lang('message.order_execution.b17')

                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.permissions')
                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.b18')
                            <br><br>@lang('message.order_execution.b19') <br><br>@lang('message.order_execution.b20')
                        </p>
                        <h3 class="uk-margin-small-bottom" style="text-align: start;">
                            @lang('message.order_execution.contact')
                        </h3>
                        <p class="uk-text-lead uk-text-muted uk-margin-remove "
                            style="text-align: start; font-size: 1rem;">@lang('message.order_execution.cus')
                            <br><br>@lang('message.order_execution.email')
                        </p>
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
                                <h3>@lang('message.trade_like_a_pro')!</h3>
                                <p>@lang('message.trade_cdfs').</p>
                            </div>
                            <div class="uk-width-auto">
                                <a class="uk-button uk-button-primary uk-border-rounded"
                                    href="{{ route('register') }}">@lang('message.open_acount')t</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
