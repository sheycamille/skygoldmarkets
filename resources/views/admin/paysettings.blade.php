@extends('layouts.app')

@section('title', 'Payments Settings')

@section("settings", 'c-show')
@section("payssettings", 'c-active')

@section('content')

@include('admin.topmenu')
@include('admin.sidebar')

<div class="container-fluid">
    <div class="fade-in">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header fw-bolder">
                    Payment Settings
                </div>
                <div class="card-body">

                    @if(Session::has('message'))
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

                    @if(count($errors) > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                @foreach ($errors->all() as $error)
                                <i class="fa fa-warning"></i> {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row mb-5">
                        <div class="col-md-4">
                            <h2 class="">Withdrawal Methods</h2>

                            <a class="mb-3 btn btn-primary" href="#" data-toggle="modal" data-target="#wmethodModal"><i
                                    class="fa fa-plus"></i>
                                Add new</a> <br>

                            @foreach ($wmethods as $method)
                            <div class="panel panel-default">
                                <!-- Panel Heading Starts -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" href="#method{{ $method->id }}">
                                            {{ $method->name }} <i class="fa fa-arrow-down"></i> </a>
                                    </h4>
                                </div>

                                <div id="method{{ $method->id }}" class="panel-collapse collapse">
                                    <div class="sign-u">
                                        <br />
                                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal"
                                            data-target="#wmethodModal{{ $method->id }}"><i class="fa fa-pencil"></i>
                                            Edit</a> &nbsp;
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('deletewdmethod', $method->id) }}">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Withdrawal method Modal -->
                            <div id="wmethodModal{{ $method->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-center">Edit withdrawal method</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="post" action="{{ route('updatewdmethod') }}"
                                                enctype="multipart/form-data">

                                                <h5 class="">Enter Method Name</h5>
                                                <input class="form-control" placeholder="Enter method name" type="text"
                                                    name="name" value="{{ $method->name }}" required>
                                                <br>
                                                <h5 class="">Enter Method Exchange Symbol</h5>
                                                <input class="form-control" placeholder="Enter method exchange symbol"
                                                    type="text" name="exchange_symbol"
                                                    value="{{ $method->exchange_symbol }}">
                                                <br>
                                                <h5 class="">Enter Method Setting Key</h5>
                                                <input class="form-control" placeholder="Enter method setting key"
                                                    type="text" name="setting_key" value="{{ $method->setting_key }}">
                                                <br>
                                                <h5 class="">Minimum Amount $</h5>
                                                <input class="form-control" placeholder="Minimum amount $" type="text"
                                                    name="minimum" value="{{ $method->minimum }}" required>
                                                <br>
                                                <h5 class="">Maximum amount $</h5>
                                                <input class="form-control" placeholder="Maximum amount $" type="text"
                                                    name="maximum" value="{{ $method->maximum }}" required>
                                                <br>
                                                <h5 class="">Charges (Fixed amount $)</h5>
                                                <input class="form-control" placeholder="Charges (Fixed amount $)"
                                                    type="text" name="charges_fixed"
                                                    value="{{ $method->charges_fixed }}" required>
                                                <br>
                                                <h5 class="">Charges (Percentage %)</h5>
                                                <input class="form-control" placeholder="Charges (Percentage %)"
                                                    type="text" name="charges_percentage"
                                                    value="{{ $method->charges_percentage }}" required>
                                                <br>
                                                <h5 class="">Duration</h5>
                                                <input class="form-control" placeholder="Payout duration" type="text"
                                                    name="duration" value="{{ $method->duration }}" required>
                                                <br>
                                                <h5 class="">Details</h5>
                                                <textarea class="form-control" name="details" row="3"
                                                    placeholder="Method details" rows="10"
                                                    cols="20">{!! $method->details !!}</textarea>
                                                <br />
                                                <h5 class="">Countries</h5>
                                                <select style="padding:5px;" class="form-control"
                                                    placeholder="Permitted Countries" type="text" name="countries[]"
                                                    required style="max-width: 150px" multiple>
                                                    <option disabled>@lang('message.register.chs')</option>
                                                    @foreach ($countries as $country)
                                                    @php
                                                    $country_ids = explode(',', $method->country_ids);
                                                    @endphp
                                                    <option @if (in_array($country->id.'', $country_ids)) selected
                                                        @endif value="{{ $country->id
                                                        }}">
                                                        {{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <h5 class="">Method status</h5>
                                                <select name="status" class="form-control">
                                                    <option>{{ $method->status }}</option>
                                                    <option value="enabled">Enable</option>
                                                    <option value="disabled">Disable</option>
                                                </select><br />
                                                <div class="form-group">
                                                    <h5 class="">Logo </h5>
                                                    <input name="logo" class="form-control" type="file">
                                                    @if($method->logo)
                                                    <img width="150px"
                                                        src="{{ asset('storage/logos/' . $method->logo) }}">
                                                    @endif
                                                </div><br />
                                                <input type="hidden" name="type" value="withdrawal">
                                                <input type="hidden" name="id" value="{{ $method->id }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="px-5 btn btn-primary btn-lg"
                                                    value="Continue">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <!-- /edit withdrawal method Modal -->
                            @endforeach
                            <br><br>
                        </div>
                        <br>

                        <div class="col-md-4">
                            <h2 class="">Deposit Methods</h2>

                            <a class="mb-3 btn btn-primary" href="#" data-toggle="modal" data-target="#dmethodModal"><i
                                    class="fa fa-plus"></i>
                                Add new</a> <br>

                            @foreach ($dmethods as $method)
                            <div class="panel panel-default">
                                <!-- Panel Heading Starts -->
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" href="#method{{ $method->id }}">
                                            {{ $method->name }} <i class="fa fa-arrow-down"></i> </a>
                                    </h4>
                                </div>

                                <div id="method{{ $method->id }}" class="panel-collapse collapse">
                                    <div class="sign-u">
                                        <br />
                                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal"
                                            data-target="#dmethodModal{{ $method->id }}"><i class="fa fa-pencil"></i>
                                            Edit</a> &nbsp;
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('deletewdmethod', $method->id) }}">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Deposit method Modal -->
                            <div id="dmethodModal{{ $method->id }}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-center">Edit deposit method</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="post" action="{{ route('updatewdmethod') }}"
                                                enctype="multipart/form-data">

                                                <h5 class="">Enter Method Name</h5>
                                                <input class="form-control" placeholder="Enter method name" type="text"
                                                    name="name" value="{{ $method->name }}" required>
                                                <br>
                                                <h5 class="">Enter Method Exchange Symbol</h5>
                                                <input class="form-control" placeholder="Enter method exchange symbol"
                                                    type="text" name="exchange_symbol"
                                                    value="{{ $method->exchange_symbol }}">
                                                <br>
                                                <h5 class="">Enter Method Setting Key</h5>
                                                <input class="form-control" placeholder="Enter method setting key"
                                                    type="text" name="setting_key" value="{{ $method->setting_key }}">
                                                <br>
                                                <h5 class="">Minimum Amount $</h5>
                                                <input class="form-control" placeholder="Minimum amount $" type="text"
                                                    name="minimum" value="{{ $method->minimum }}" required>
                                                <br>
                                                <h5 class="">Maximum amount $</h5>
                                                <input class="form-control" placeholder="Maximum amount $" type="text"
                                                    name="maximum" value="{{ $method->maximum }}" required>
                                                <h5 class="">Charges (Fixed amount $)</h5>
                                                <input class="form-control" placeholder="Charges (Fixed amount $)"
                                                    type="text" name="charges_fixed"
                                                    value="{{ $method->charges_fixed }}" required>
                                                <br>
                                                <h5 class="">Charges (Percentage %)</h5>
                                                <input class="form-control" placeholder="Charges (Percentage %)"
                                                    type="text" name="charges_percentage"
                                                    value="{{ $method->charges_percentage }}" required>
                                                <br>
                                                <h5 class="">Duration</h5>
                                                <input class="form-control" placeholder="Payout duration" type="text"
                                                    name="duration" value="{{ $method->duration }}" required>
                                                <br>
                                                <h5 class="">Details</h5>
                                                <textarea class="form-control" name="details" row="3"
                                                    placeholder="Method details" rows="10"
                                                    cols="20">{!! $method->details !!}</textarea>
                                                <br />
                                                <h5 class="">Countries</h5>
                                                <select style="padding:5px;" class="form-control"
                                                    placeholder="Permitted Countries" type="text" name="countries[]"
                                                    required style="max-width: 150px" multiple>
                                                    <option disabled>@lang('message.register.chs')</option>
                                                    @foreach ($countries as $country)
                                                    @php
                                                    $country_ids = explode(',', $method->country_ids);
                                                    @endphp
                                                    <option @if (in_array($country->id.'', $country_ids)) selected
                                                        @endif value="{{ $country->id
                                                        }}">
                                                        {{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <h5 class="">Method status</h5>
                                                <select name="status" class="form-control">
                                                    <option>{{ $method->status }}</option>
                                                    <option value="enabled">Enable</option>
                                                    <option value="disabled">Disable</option>
                                                </select><br />
                                                <div class="form-group">
                                                    <h5 class="">Logo</h5>
                                                    <input name="logo" class="form-control" type="file">
                                                    @if($method->logo)
                                                    <img width="150px"
                                                        src="{{ asset('storage/logos/' . $method->logo) }}">
                                                    @endif
                                                </div><br />
                                                <input type="hidden" name="type" value="deposit">
                                                <input type="hidden" name="id" value="{{ $method->id }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="px-5 btn btn-primary btn-lg"
                                                    value="Continue">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <!-- /edit Deposit method Modal -->
                            @endforeach
                            <br><br>
                        </div>

                        <div class="col-md-4">
                            <form method="post" action="{{ route('updatesettings') }}" enctype="multipart/form-data">
                                <!-- Payment info and methods -->
                                <h3 class="">Deposit Methods Config</h3>

                                {{-- Bitcoin Settings --}}
                                <div class="panel panel-default" style="border:0px solid #fff;">
                                    <!-- Panel Heading Starts -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" href="#btc">
                                                Bitcoin <i class="fa fa-arrow-down"></i> </a>
                                        </h4>
                                    </div>

                                    <div id="btc" class="panel-collapse collapse">
                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">BTC address :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="btc_address" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('btc_address') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div><br>


                                {{-- Bitcoin Cash Settings --}}
                                <div class="panel panel-default" style="border:0px solid #fff;">
                                    <!-- Panel Heading Starts -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" href="#bch">
                                                Bitcoin Cash<i class="fa fa-arrow-down"></i> </a>
                                        </h4>
                                    </div>

                                    <div id="bch" class="panel-collapse collapse">
                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">BCH address :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="bch_address" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('bch_address') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div><br>


                                {{-- Ethereum Settings --}}
                                <div class="panel panel-default" style="border:0px solid #fff;">
                                    <!-- Panel Heading Starts -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" href="#eth">
                                                Ethereum <i class="fa fa-arrow-down"></i> </a>
                                        </h4>
                                    </div>

                                    <div id="eth" class="panel-collapse collapse">
                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">ETH address :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="eth_address" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('eth_address') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div><br>


                                {{-- LiteCoin Settings --}}
                                <div class="panel panel-default" style="border:0px solid #fff;">
                                    <!-- Panel Heading Starts -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" href="#ltc">
                                                Litecoin <i class="fa fa-arrow-down"></i> </a>
                                        </h4>
                                    </div>

                                    <div id="ltc" class="panel-collapse collapse">
                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">LTC address :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="ltc_address" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('ltc_address') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div><br>


                                {{-- XRP Settings --}}
                                <div class="panel panel-default" style="border:0px solid #fff;">
                                    <!-- Panel Heading Starts -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" href="#xrp">
                                                XRP <i class="fa fa-arrow-down"></i> </a>
                                        </h4>
                                    </div>

                                    <div id="xrp" class="panel-collapse collapse">
                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">XRP address :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="xrp_address" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('xrp_address') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div><br>


                                {{-- USDT Settings --}}
                                <div class="panel panel-default" style="border:0px solid #fff;">
                                    <!-- Panel Heading Starts -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" href="#usdt">
                                                USDT <i class="fa fa-arrow-down"></i> </a>
                                        </h4>
                                    </div>

                                    <div id="usdt" class="panel-collapse collapse">
                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">USDT address :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="usdt_address" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('usdt_address') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div><br>


                                {{-- BNB Settings --}}
                                <div class="panel panel-default" style="border:0px solid #fff;">
                                    <!-- Panel Heading Starts -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" href="#bnb">
                                                BNB <i class="fa fa-arrow-down"></i> </a>
                                        </h4>
                                    </div>

                                    <div id="bnb" class="panel-collapse collapse">
                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">BNB address :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="bnb_address" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('bnb_address') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div><br>


                                {{-- PayPal Settings --}}
                                <div class="panel panel-default" style="border:0px solid #fff;">
                                    <!-- Panel Heading Starts -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" href="#pp">
                                                PayPal <i class="fa fa-arrow-down"></i> </a>
                                        </h4>
                                    </div>

                                    <div id="pp" class="panel-collapse collapse">
                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">Paypal client ID :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="pp_ci" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('pp_ci') }}">
                                            </div>
                                        </div>

                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">Paypal client secret :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="pp_cs" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('pp_cs') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>


                                {{-- Interac Settings --}}
                                <div class="panel panel-default" style="border:0px solid #fff;">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" href="#interac">
                                                Interac <i class="fa fa-arrow-down"></i> </a>
                                        </h4>
                                    </div>

                                    <div id="interac" class="panel-collapse collapse">
                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">Interac Name :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="interac_name" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('interac_name') }}">
                                            </div>
                                        </div>

                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">Interac Email :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="interac_email" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('interac_email') }}">
                                            </div>
                                        </div>

                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">Interac Phone :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="interac_phone" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('interac_phone') }}">
                                            </div>
                                        </div>

                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">Interac Message :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="interac_message" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('interac_message') }}">
                                            </div>
                                        </div>

                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">Interac Queston :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="interac_question" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('interac_question') }}">
                                            </div>
                                        </div>

                                        <div class="sign-u">
                                            <div class="sign-up1">
                                                <h4 class="">Interac Answer :</h4>
                                            </div>
                                            <div class="sign-up2">
                                                <input type="text" name="interac_answer" class="form-control"
                                                    value="{{ \App\Models\Setting::getValue('interac_answer') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="sign-up1">
                                        <h3 class=""> Minimum Deposit/Withdrawal Amount:</h3>
                                    </div>
                                    <div class="form-group">
                                        <input name="min_dw" class="form-control"
                                            value="{{ \App\Models\Setting::getValue('min_dw') }}" />
                                    </div> <br>

                                </div>

                                <input type="submit" class="px-5 btn btn-primary btn-lg" value="Save">
                                <input type="hidden" name="id" value="1">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"><br />
                                <br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.modals')
@endsection
