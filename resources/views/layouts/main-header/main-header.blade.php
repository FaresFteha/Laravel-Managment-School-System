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
                @if (Auth::user()->roles_name == ['Owner'])
                    <li class="nav-item dropdown ">
                        <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti-bell"></i>
                            <span id="newNotification" class="badge badge-danger notification-status"
                                style="height: 15%"><strong>{{ auth()->user()->unreadNotifications->count() }}</strong></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                            <div class="dropdown-header notifications">
                                <strong>{{ trans('header_trans.Notifications') }}</strong>
                                <br>
                                <a href="{{ route('Fees.read') }}">
                                    <h7>{{ trans('header_trans.readall') }}</h7>
                                </a>
                                <span id="newNotification"
                                    class="badge badge-pill badge-warning">{{ auth()->user()->unreadNotifications->count() }}</span>
                            </div>
                            <div class="dropdown-divider"></div>
                            @forelse(auth()->user()->unreadNotifications->take(10) as $notification)
                                <div id="listNotification">
                                    <a href="{{ $notification->data['url'] }}?notify_id={{ $notification->id }}"
                                        class="dropdown-item">{{ $notification->data['title'] . ' ' . $notification->data['Fees'] }}<small
                                            class="float-right text-muted time">{{ $notification->data['date'] }}</small>
                                    </a>
                                </div>

                            @empty
                                <tr>
                                    <td class="alert-danger text-center" colspan="8">لا يوجد اشعارات
                                    </td>
                                </tr>
                            @endforelse
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
                                <a href="{{ route('StudentsTableview') }}" class="nav-grid-item"><i
                                        class="ti-blackboard text-primary"></i>
                                    <h5>{{ trans('header_trans.Students') }}</h5>
                                </a>
                                <a href="{{ route('Zoom.index') }}" class="nav-grid-item"><i
                                        class="ti-video-camera text-success"></i>
                                    <h5>{{ trans('header_trans.Zoom') }}</h5>
                                </a>
                            </div>
                            <div class="nav-grid">
                                <a href="{{ route('ReceiptStudent.index') }}" class="nav-grid-item"><i
                                        class="ti-money text-warning"></i>
                                    <h5>{{ trans('header_trans.Accounts') }}</h5>
                                </a>
                                <a href="{{ route('users.index') }}" class="nav-grid-item"><i
                                        class="ti-user text-danger "></i>
                                    <h5>{{ trans('header_trans.Users') }}</h5>
                                </a>
                            </div>
                        </div>
                    </li>
                @endif

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
                        <a class="dropdown-item" href="{{ route('settings.index') }}"><i
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
                                class="fa fa-sign-out text-danger"></i></i></i>{{ trans('header_trans.signout') }}</a>
                        </form>

                    </div>
                </li>
            </ul>


        </nav>
