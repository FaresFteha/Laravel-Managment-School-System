        <!--=================================
 header start-->
        <style>
            .admin-header .navbar-brand img {
                height: 60px;
            }
        </style>
        <nav class="admin-header header-dark navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="index.html"><img
                        src="{{ asset('assets/logo-new-gen/new-gen.png') }}" alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img
                        src="{{ asset('assets/images/logo-icon-dark.png') }}" alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search">
                            <button class="search-button" type="submit"> <i
                                    class="fa fa-search not-click"></i></button>
                        </div>
                    </div>
                </li>
            </ul>

            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">

                <div class="btn-group mb-1">
                    <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @if (App::getLocale() == 'ar')
                            {{ LaravelLocalization::getCurrentLocaleName() }}
                            <img src="{{ asset('assets/images/flags/SA.png') }}" alt="">
                        @else
                            {{ LaravelLocalization::getCurrentLocaleName() }}
                            <img src="{{ asset('assets/images/flags/US.png') }}" alt="">
                        @endif
                    </button>
                    <div class="dropdown-menu">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </div>



                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger notification-status"> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            <span class="badge badge-pill badge-warning">05</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">New registered user <small
                                class="float-right text-muted time">Just now</small> </a>

                        <a href="#" class="dropdown-item">New invoice received <small
                                class="float-right text-muted time">22 mins</small> </a>
                        <a href="#" class="dropdown-item">Server error report<small
                                class="float-right text-muted time">7 hrs</small> </a>
                        <a href="#" class="dropdown-item">Database report<small
                                class="float-right text-muted time">1
                                days</small> </a>
                        <a href="#" class="dropdown-item">Order confirmation<small
                                class="float-right text-muted time">2
                                days</small> </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big">
                        <div class="dropdown-header">
                            <strong>{{ trans('header_trans.QuickLinks') }}</strong>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="nav-grid">
                            <a href="{{ route('Sons.index') }}" class="nav-grid-item"><i
                                    class="fa fa-users text-danger"></i>
                                <h5>{{ trans('header_trans.Sons') }}</h5>
                            </a>

                            <a href="{{ route('Sons.Fees') }}" class="nav-grid-item"><i
                                    class="fa fa-money text-success"></i>
                                <h5>{{ trans('header_trans.Accounts') }}</h5>
                            </a>
                        </div>
                        <div class="nav-grid text-center">
                            <a href="{{ route('Sons.attendances') }}" class="nav-grid-item"><i
                                    class="ti-check-box text-warning"></i>
                                <h5>{{ trans('attendance_trans.Attendancereports') }}</h5>
                            </a>
                            {{-- <a href="#" class="nav-grid-item"><i class="fa fa-pencil text-danger "></i>
                                <h5>{{ trans('header_trans.Semester') }}</h5>
                            </a> --}}
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        @if (auth('student')->check())
                            <img src="{{ URL::asset('attachments/student_images/' . Auth::user()->file_name) }}"
                                alt="avatar">
                        @else
                            <img src="{{ URL::asset('assets/images/user_icon.png') }}" alt="avatar">
                        @endif

                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">{{ Auth::user()->name }}</h5>
                                    <span>{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('Profile.show.paren') }}"><i
                                class="text-success ti-id-badge"></i>{{ trans('header_trans.Profile') }}</a>
                        @if (auth('student')->check())
                            <form method="GET" action="{{ route('log-out', 'student') }}">
                            @elseif(auth('teacher')->check())
                                <form method="GET" action="{{ route('log-out', 'teacher') }}">
                                @elseif(auth('parent')->check())
                                    <form method="GET" action="{{ route('log-out', 'parent') }}">
                                    @else
                                        <form method="GET" action="{{ route('log-out', 'web') }}">
                        @endif

                        @csrf
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();this.closest('form').submit();"><i
                                class="fa fa-sign-out text-danger"></i></i></i>{{ trans('header_trans.signout') }}
                        </a>
                        </form>

                    </div>
                </li>
            </ul>


        </nav>
