@section('topbar')
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <div class="container d-flex">
            <div class="c-sidebar-brand" style="margin-left:2%;">
                <a href="/">
                    <img class="c-sidebar-brand-full" src="{{ asset('front/img/group-logo.png') }}" width="150"
                        alt="Sky Gold Markets Logo">
                    <img class="c-sidebar-brand-minimized" src="{{ asset('front/favicon.png') }}" width="100"
                        alt="Sky Gold Markets Logo">
                </a>
            </div>

            <a class="c-header-brand d-sm-none" href="/">
                <img class="c-header-brand" src="{{ asset('front/favicon.png') }}" width="97" alt="Sky Gold Markets Logo">
            </a>

            <ul class="c-header-nav ml-auto mr-4">

                <li class="c-header-nav-link">
                    <a class="nav-link" href="{{ route('refreshaccounts') }}" aria-expanded="false">
                        <strong>@lang('message.topmenu.refresh') </strong>
                    </a>
                </li>

                <li class="c-header-nav-item">
                    <a class="c-header-nav-link @yield('dashboard')" href="{{ route('dashboard') }}">
                        @lang('message.dashboard.dash')
                    </a>
                </li>

                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link @yield('accounts')" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        @lang('message.dashboard.trade')
                        <svg class="c-icon m-2">
                            <use xlink:href="{{ url('admin/icons/sprites/free.svg#cil-menu') }}"></use>
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link @yield('live-accounts')" href="{{ route('account.liveaccounts') }}">
                                <span class="sub-item">@lang('message.dashboard.live')</span>
                            </a>
                        </li>

                        <li class="dropdown-divider"></li>

                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link @yield('demo-accounts')" href="{{ route('account.demoaccounts') }}">
                                <span class="sub-item">@lang('message.dashboard.demo')</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link @yield('deposits-and-withdrawals')" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        @lang('message.dashboard.deposits')
                        <svg class="c-icon m-1">
                            <use xlink:href="{{ url('admin/icons/sprites/free.svg#cil-menu') }}"></use>
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="c-header-nav-link">
                            <a class="nav-link @yield('deposits')" href="{{ route('account.deposits') }}">
                                <span class="sub-item">@lang('message.dashboard.depo')</span>
                            </a>
                        </li>

                        <li class="dropdown-divider"></li>

                        <li class="c-header-nav-link">
                            <a class="nav-link @yield('withdrawals')" href="{{ route('account.withdrawals') }}">
                                <span class="sub-item">@lang('message.dashboard.with')</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="c-header-nav-item">
                    <a class="c-header-nav-link @yield('downloads')" href="{{ route('account.downloads') }}">
                        @lang('message.dashboard.down')
                    </a>
                </li>

                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link @yield('kyc')" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        KYC
                        <svg class="c-icon m-1">
                            <use xlink:href="{{ url('admin/icons/sprites/free.svg#cil-menu') }}"></use>
                        </svg>
                    </a>
                    <ul class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                        <li class="quick-actions-header m-2">
                            @if (Auth::user()->account_verify == 'yes')
                                <span class="subtitle op-8">
                                    <a href="#" class="p-0 col-12">
                                        KYC Status: Account verified
                                    </a>
                                </span>
                            @else
                                <span class="subtitle op-8"><a>KYC status: {{ Auth::user()->account_verify }}</a></span>
                            @endif
                        </li>

                        <li class="dropdown-divider"></li>

                        <li class="quick-actions-scroll scrollbar-outer m-2">
                            <div class="quick-actions-items">
                                <div class="m-0 row">
                                    @if (Auth::user()->account_verify != 'yes')
                                        <a href="{{ route('account.verify') }}" class="btn btn-success">Verify
                                            Account </a>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link @yield('my-profile')" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        @lang('message.topmenu.hi') {{ Auth::user()->name }}
                        <svg class="c-icon m-2">
                            <use xlink:href="{{ url('admin/icons/sprites/free.svg#cil-menu') }}"></use>
                        </svg>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="c-sidebar-nav-item">
                            <a class="dropdown-item" href="{{ route('account.profile') }}">@lang('message.dashboard.my_pfl')</a>
                        </li>

                        <div class="dropdown-divider"></div>

                        <li class="c-sidebar-nav-item">
                            <a class="dropdown-item" href="{{ route('changepassword') }}">@lang('message.topmenu.chg_pss')</a>
                        </li>

                        <div class="dropdown-divider"></div>

                        <li class="c-sidebar-nav-item">
                            <a class="dropdown-item @yield('support')" href="{{ route('account.support') }}">
                                @lang('message.dashboard.sup')
                            </a>
                        </li>

                        <div class="dropdown-divider"></div>

                        <li class="c-sidebar-nav-item">
                            <a class="dropdown-item @yield('security')" href="{{ route('account.security') }}">
                                <span class="sub-item">@lang('message.dashboard.sec')</span>
                            </a>
                        </li>

                        <div class="dropdown-divider"></div>

                        <li class="c-sidebar-nav-item">
                            <a class="dropdown-item @yield('withdrawal-info')" href="{{ route('withdrawaldetails') }}">
                                <span class="sub-item">@lang('message.dashboard.with_info')</span>
                            </a>
                        </li>

                        <div class="dropdown-divider"></div>

                        <li class="c-sidebar-nav-item">
                            <a class="dropdown-item @yield('notifications')" href="{{ route('notifications') }}">
                                <span class="sub-item">@lang('message.dashboard.notif')</span>
                            </a>
                        </li>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            @lang('message.topmenu.log')
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
@endsection
