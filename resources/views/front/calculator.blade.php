@extends('layouts.front')

@section('title', 'Trading Calculator')

@section('calculator-menu-item', 'uk-active')

@section('content')
<main id="main" class="calculator-page">

        <div class="uk-section in-liquid-6 in-offset-top-10">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m uk-background-contain uk-background-center-center">
                        <div class="uk-text-center">
                            <h1 class="uk-margin-remove">@lang('message.fx_calc')</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="background-theme" style="padding: 80px 0!important;"><iframe width="100%" frameborder="0" scrolling="no" height="400px" src="https://widgets-m.techsubservices.com/en/calculators/all-in-one/9"></iframe></div>

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
                                    <a class="uk-button uk-button-primary uk-border-rounded" href="https://skygoldmarkets.com/register">@lang('message.open_acount')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>
@endsection
