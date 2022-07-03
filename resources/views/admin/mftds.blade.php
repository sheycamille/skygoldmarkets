@extends('layouts.app')

@section('title', 'Manage FTDs')

@section('maccounts', 'c-show')
@section('ftds', 'c-active')

@section('content')

@include('admin.topmenu')
@include('admin.sidebar')

<div class="container-fluid">
    <div class="fade-in">
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

                    <div class="mb-5 row">
                        <div class="col p-4">
                            <div class="bs-example table-responsive" data-example-id="hoverable-table">

                                <table id="ShipTable" class="table table-bordered table-striped table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>First Deposit</th>
                                            <th>Date of Deposit </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            @php
                                            $dp = $user
                                            ->dp()
                                            ->where('status', 'Processed')
                                            ->first();
                                            @endphp
                                            <td>{{ $dp->amount }}</td>
                                            <td> {{ \Carbon\Carbon::parse($dp->date_created)->toDayDateTimeString() }}
                                            </td>
                                        </tr>
                                        @include('admin.users_actions', $user)
                                        @empty
                                        <tr>
                                            <td colspan="10">No data available</td>
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
    </div>
</div>

@include('admin.includes.modals')
@endsection
