@section('topbar')
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar"
            data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none"
            href="/"><img class="c-header-brand" src="{{ asset('front/favicon.png') }}" width="97" height="46"
                alt="Sky Gold Markets Logo"></a>
        <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar"
            data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>

        <ul class="c-header-nav ml-auto mr-4">
            <li class="c-header-nav-item dropdown">
                <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fas fa-recycle"></i>
                    <strong>KYC</strong>
                </a>
                <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                    <div class="quick-actions-header">
                        @if (Auth::user()->account_verify == 'yes')
                            <span class="subtitle op-8">
                                <a href="#" class="p-0 col-12">
                                    KYC Status: Account verified
                                </a>
                            </span>
                        @else
                            <span class="subtitle op-8"><a>KYC status:
                                    {{ Auth::user()->account_verify }}</a></span>
                        @endif
                    </div>
                    <div class="quick-actions-scroll scrollbar-outer">
                        <div class="quick-actions-items">
                            <div class="m-0 row">
                                @if (Auth::user()->account_verify != 'yes')
                                    <a href="{{ route('account.verify') }}" class="btn btn-success">Verify
                                        Account </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="c-header-nav-link">
                <a class="nav-link" href="{{ route('refreshaccounts') }}" aria-expanded="false">
                    <strong>@lang('message.topmenu.refresh') </strong>
                </a>
            </li>

            <li class="c-header-nav-item dropdown">
                <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="">
                        @lang('message.topmenu.hi') {{ Auth::user()->name }}
                        <svg class="c-icon mr-2">
                            <use xlink:href="{{ url('admin/icons/sprites/free.svg#cil-menu') }}"></use>
                        </svg>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right pt-0">
                    <a class="dropdown-item" href="{{ route('changepassword') }}">@lang('message.topmenu.chg_pss')</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('account.profile') }}">@lang('message.dashboard.my_pfl')</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        @lang('message.topmenu.log')
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>ˇ

        <div class="c-subheader px-3">
            <ol class="breadcrumb border-0 m-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <?php $segments = ''; ?>
                @for ($i = 1; $i <= count(Request::segments()); $i++)
                    <?php $segments .= '/' . Request::segment($i); ?>
                    @if ($i < count(Request::segments()))
                        <li class="breadcrumb-item">{{ ucfirst(Request::segment($i)) }}
                        </li>
                    @else
                        <li class="breadcrumb-item active">{{ ucfirst(Request::segment($i)) }}</li>
                    @endif
                @endfor
            </ol>
        </div>
    </header>
@endsection
