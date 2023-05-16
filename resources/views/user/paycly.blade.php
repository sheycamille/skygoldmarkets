@extends('layouts.app')

@section('title', 'Paycly Payment')

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
                                                    <div id="numpay" class="d-flex justify-content-center col-xs-12">
                                                        <form id='paymentForm' method='post'
                                                            action=https://portal.online-epayment.com/checkout.do target=>

                                                            <!--Your Website API Token -->
                                                            <input type='hidden' name='api_token'
                                                                value='{{ config('paycly.api_key') }}' />

                                                            <!--Your Website Id -->
                                                            <input type='hidden' name='website_id'
                                                                value='{{ config('paycly.website_id') }}' />

                                                            <!--Optional -->
                                                            <input type='hidden' name='acquirer_id' value='' />

                                                            <!--This default (fixed) value can not to be changed -->
                                                            <input type='hidden' name='action' value='product' />

                                                            <!--client_ip - Internet Protocol. This represents the current IP address of the customer carrying out the transaction -->
                                                            <input type='hidden' name='client_ip'
                                                                value='{{ request()->ip() }}' />

                                                            <!--source_url - Url of Product Page -->
                                                            <input type='hidden' name='source_url'
                                                                value='{{ request()->url() }}' />

                                                            <!--product price,curr and product name * by cart total amount -->

                                                            <!--This is the amount to be charged from card -->
                                                            <input type='hidden' name='price'
                                                                value='{{ $amount }}' />

                                                            <!--This is the specified currency to charge the card. -->
                                                            <input type='hidden' name='curr' value='USD' />

                                                            <!--This is the specified Product Name to purchased. -->
                                                            <input type='hidden' name='product_name'
                                                                value='Training Pack AF-{{ Auth::user()->id }}' />

                                                            <h3 class=" text-center pt-5 pb-3">
                                                                Personal Details:
                                                            </h3>
                                                            <div class="form-group d-flex justify-content-center col-xs-12">
                                                                <div class="col-md-5" style="display: inline-block;">
                                                                    <h5 class="">First Name*</h5>
                                                                    <input type="text" name="fullname"
                                                                        class="form-control"
                                                                        value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}"
                                                                        required>
                                                                </div>

                                                                <div class="col-md-5" style="display: inline-block;">
                                                                    <h5 class="">Email*</h5>
                                                                    <input type="text" name="email"
                                                                        class="form-control"
                                                                        value="{{ Auth::user()->email }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-center col-xs-12">
                                                                <div class="col-md-4" style="display: inline-block;">
                                                                    <h5 class="">Address*</h5>
                                                                    <input type="text" name="bill_street_1"
                                                                        class="form-control"
                                                                        value="{{ Auth::user()->address }}" required>
                                                                </div>

                                                                <div class="col-md-3" style="display: inline-block;">
                                                                    <h5 class="">City*</h5>
                                                                    <input type="text" name="bill_city"
                                                                        class="form-control"
                                                                        value="{{ Auth::user()->town }}" required>
                                                                </div>

                                                                <div class="col-md-3" style="display: inline-block;">
                                                                    <h5 class="">Phone No*</h5>
                                                                    <input type="text" name="bill_phone"
                                                                        class="form-control"
                                                                        value="{{ Auth::user()->phone }}" required
                                                                        placeholder="+1...">
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="form-group d-flex justify-content-center col-xs-12">
                                                                <div class="col-md-4" style="display: inline-block;">
                                                                    <h5 class="">State*</h5>
                                                                    <input type="text" name="bill_state"
                                                                        class="form-control"
                                                                        value="{{ Auth::user()->state }}" required>
                                                                </div>
                                                                <div class="col-md-3" style="display: inline-block;">
                                                                    <h5 class="">Zip Code*</h5>
                                                                    <input type="text" name="bill_zip"
                                                                        class="form-control"
                                                                        value="{{ Auth::user()->zip_code }}" required>
                                                                </div>
                                                                <div class="col-md-3" style="display: inline-block;">
                                                                    <h5 class="">Country*</h5>
                                                                    <select name="bill_country" id="country"
                                                                        class="form-control country-select" required>
                                                                        <option>@lang('message.register.chs')</option>
                                                                        @foreach ($countries as $country)
                                                                            <option
                                                                                @if (Auth::user()->country_id == $country->id || Auth::user()->country_id == $country->name) selected @endif
                                                                                value="{{ strtoupper($country->code) }}">
                                                                                {{ ucfirst($country->name) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <br>
                                                                </div>
                                                            </div>

                                                            <input type='hidden' name='id_order'
                                                                value='{{ $id_order }}' />

                                                            <input type='hidden' name='notify_url'
                                                                value='{{ route('handlepayclycharge') }}' />

                                                            <input type='hidden' name='success_url'
                                                                value='{{ route('handlepayclycharge') }}' />

                                                            <input type='hidden' name='error_url'
                                                                value='{{ route('handlepayclycharge') }}' />

                                                            <input type='hidden' name='checkout_url'
                                                                value='{{ route('handlepayclycharge') }}' />


                                                            <h3 class=" text-center pt-5 pb-3">
                                                                Card Details:
                                                            </h3>

                                                            <div
                                                                class="form-group d-flex justify-content-center col-xs-12">
                                                                <div class="col-md-4" style="display: inline-block;">
                                                                    <h5 class="">Card No*</h5>
                                                                    <input type="text" name="ccno"
                                                                        class="form-control" value="4242424242424242"
                                                                        required>
                                                                </div>
                                                                <div class="col-md-3" style="display: inline-block;">
                                                                    <h5 class="">Expiry Month*</h5>
                                                                    <input type="text" name="month" placeholder="01"
                                                                        class="form-control" value="01" required>
                                                                </div>
                                                                <div class="col-md-2" style="display: inline-block;">
                                                                    <h5 class="">Expiry Year*</h5>
                                                                    <input type="text" name="year" placeholder="23"
                                                                        class="form-control" value="30" required>
                                                                </div>
                                                                <div class="col-md-3" style="display: inline-block;">
                                                                    <h5 class="">CVV Number*</h5>
                                                                    <input type="text" name="ccvv"
                                                                        class="form-control" value="123" required>
                                                                </div>
                                                            </div>

                                                            <!--This comment from customer. -->
                                                            <input type='hidden' name='notes'
                                                                value='Funding for service/product' />

                                                            <!--default value for source and cardsend  -->
                                                            <input type='hidden' name='cardsend' value='CHECKOUT' />
                                                            <input type='hidden' name='source'
                                                                value='Host-Redirect-Card-Payment (Core PHP)' />
                                                            <div
                                                                class="form-group d-flex justify-content-center col-xs-12 d-flex justify-content-center col-xs-12">
                                                                <button class="btn btn-primary" id='paymentsubmit'
                                                                    type='submit'>PAY NOW</button>
                                                            </div>
                                                        </form>
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

@section('javascript')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer>
    </script>
    <script type="text/javascript">
        $(function() {
            $('.country-select').select2({
                placeholder: 'Select a country',
                allowClear: true
            })
        })
    </script>
@endsection
