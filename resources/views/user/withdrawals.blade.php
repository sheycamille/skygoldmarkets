@extends('layouts.app')

@section('title', 'My Withdrawals')

@section('deposits-and-withdrawals', 'c-show')
@section('withdrawals', 'c-active')

@section('content')

@include('user.topmenu')
@include('user.sidebar')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header fw-bolder">
                    @lang('message.body.my_with')
                    </div>
                    <div class="card-body">

                        @if (Session::has('message'))
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success alert-dismissable">
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
                        <div class="row py-3 mb-4">
                            <div class="col">
                                {{-- <a class="btn btn-primary" href="{{ route('account.mt5deposit') }}"><i
                                        class="fa fa-plus"></i> @lang('message.body.new_depo')</a> --}}
                                <a class="btn btn-primary" href="{{ route('mwithdrawal') }}">
                                    <i class="fa fa-plus"></i>
                                    @lang('message.body.new_with')
                                </a>
                            </div>
                        </div>

                        <table class="table table-bordered table-striped table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>@lang('message.body.account')</th>
                                    <th>@lang('message.body.amount')</th>
                                    <th>@lang('message.body.pay_method')</th>
                                    <th>@lang('message.body.status')</th>
                                    <th>@lang('message.body.date_created')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($withdrawals as $withdrawal)
                                <tr>
                                    <th scope="row">{{ $withdrawal->id }}</th>
                                    <td>{{ $withdrawal->mt5->login }}</td>
                                    <td>
                                        {{ \App\Models\Setting::getValue('currency') }}{{ $withdrawal->amount }}
                                    </td>
                                    <td>{{ $withdrawal->payment_mode }}</td>
                                    <td>{{ $withdrawal->status }}</td>
                                    <td>{{ \Carbon\Carbon::parse($withdrawal->created_at)->toDayDateTimeString() }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">@lang('message.body.no_data')</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user.modals')
@endsection
