@extends('layouts.front')

@section('title', 'Our Products')

@section('accounts-types-menu-item', 'uk-active')

@section('content')
    <main id="main" class="about-us-page">

        <!--========================== Heading Section ============================-->
        <section id="about" class="section-bg wow fadeInUp">
            <div class="container">
                <div class="section-header">
                    <h1 class="text-center">Trading Accounts</h1>
                </div>
            </div>
        </section>


        <!--========================== Account types Section ============================-->
        <section id="pricing" class="wow fadeInUp section-bg">

            <div class="container special-cont">

                <header class="section-header">
                    <h3>Our Account Types</h3>
                    <p>Trade like a pro with any account type</p>
                </header>

                <div class="row flex-items-xs-middle flex-items-xs-center">

                    <!-- List Account Types  -->
                    @foreach ($account_types as $accType)
                        <div class="col-lg-3 col-md-6">
                            <div class="pricing-box">
                                <h3>{{ $accType->name }}</h3>
                                <div class="cur">
                                    <span>$</span>
                                    <h2>{{ $accType->cost }}</h2>
                                    <h6>USD</h6>
                                </div>
                                <div class="price-list">
                                    <ul class="list-unstyled">
                                        <li class="list-item"><i class="bx bx-check"></i>Forex:
                                            {{ $accType->num_fx_pairs }}pairs</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Indices:
                                            {{ $accType->num_indices_pairs }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Commodities:
                                            {{ $accType->num_commodities_pairs }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Trading Platforms:
                                            {{ $accType->trading_platforms }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Trading Model:
                                            {{ $accType->trading_model }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Account Manager:
                                            {{ $accType->account_managr }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Max. Leverage:
                                            {{ $accType->max_leverage }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Min. Trade Size:
                                            {{ $accType->min_trade_size }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Max. Trade Size:
                                            {{ $accType->max_trade_size }} lots</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Typical Spread:
                                            {{ $accType->typical_spread }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Swaps: @if ($accType->swaps) Yes @else No @endif
                                        </li>
                                        <li class="list-item"><i class="bx bx-check"></i>Requotes:
                                            {{ $accType->requotes }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Commission on FX:
                                            {{ $accType->fx_commission }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Min. Possible deposit:
                                            ${{ $accType->cost }} USD</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Execution Type:
                                            {{ $accType->execution_type }}</li>
                                        <li class="list-item"><i class="bx bx-check"></i>Available Instruments:
                                            {{ $accType->available_instruments }}</li>
                                    </ul>
                                </div>
                                <div class="pricing-button">
                                    <a href="/register?account_type={{ $accType->id }}" class="btn btn-primary">Get
                                        Started</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </section>

    </main>
@endsection
