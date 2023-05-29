<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ trans('hedartitlepage.Titleschool') }}</title>

    @include('frontendpages.layouts.head')

</head>

<body>

    <div class="wrapper">
        <section class="p-0 d-flex align-items-center position-relative overflow-hidden">
            <div class="container-fluid">
                <div class="row">
                    <!-- left -->
                    <div
                        class="col-12 col-lg-6 d-md-flex align-items-center justify-content-center bg-primary bg-opacity-10 vh-lg-100">
                        <div class="p-3 p-lg-5">
                            <!-- Title -->
                            <div class="text-center">
                                <h2 class="fw-bold">{{ trans('login_trans.wellcome') }}</h2>
                                <p class="mb-0 h6 fw-light">{{ trans('login_trans.wellcome2') }}</p>
                            </div>
                            <!-- SVG Image -->
                            <img src="{{ asset('assetshome/images/element/02.svg') }}" class="mt-5" alt="">
                            <!-- Info -->
                            <div class="d-sm-flex mt-5 align-items-center justify-content-center">
                                <!-- Avatar group -->
                                <ul class="avatar-group mb-2 mb-sm-0">
                                    <li class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle"
                                            src="{{ asset('assetshome/images/avatar/01.jpg') }}" alt="avatar">
                                    </li>
                                    <li class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle"
                                            src="{{ asset('assetshome/images/avatar/02.jpg') }}" alt="avatar">
                                    </li>
                                    <li class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle"
                                            src="{{ asset('assetshome/images/avatar/03.jpg') }}" alt="avatar">
                                    </li>
                                    <li class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle"
                                            src="{{ asset('assetshome/images/avatar/04.jpg') }}" alt="avatar">
                                    </li>
                                </ul>
                                <!-- Content -->
                            </div>
                        </div>
                    </div>

                    <!-- Right -->
                    <div class="col-12 col-lg-6 m-auto">
                        <div class="row my-5">
                            <div class="col-sm-10 col-xl-8 m-auto">
                                <!-- Title -->
                                <span class="mb-0 fs-1">👋</span>
                                <div class="login-fancy pb-40 clearfix">
                                    @if ($type == 'student')
                                        <h1 class="fs-2">{{ trans('login_trans.Student') }}</h1>
                                    @elseif($type == 'parent')
                                        <h1 class="fs-2">{{ trans('login_trans.Parent') }}</h1>
                                    @elseif($type == 'teacher')
                                        <h1 class="fs-2">{{ trans('login_trans.Teacher') }}</h1>
                                    @else
                                        <h1 class="fs-2">{{ trans('login_trans.Admin') }}</h1>
                                    @endif

                                    @if (\Session::has('message'))
                                        <div class="alert alert-danger">
                                            <li>{!! \Session::get('message') !!}</li>
                                        </div>
                                    @endif
                                </div>
                                <p class="lead mb-4">{{ trans('login_trans.title_login') }}</p>
                                <!-- Form START -->
                                <form method="POST" action="{{ route('log-in') }}" autocomplete="off">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name"
                                            class="form-label">{{ trans('users_trans.Email') }}*</label>
                                        <div class="input-group input-group-lg">
                                            <span
                                                class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                    class="bi bi-envelope-fill"></i></span>
                                            <input id="email" type="email"
                                                class="form-control border-0 bg-light rounded-end ps-1  @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required
                                                autocomplete="email" placeholder="{{ trans('users_trans.Email') }}"
                                                autofocus>
                                            <input type="hidden" value="{{ $type }}" name="type">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="password"
                                            class="form-label">{{ trans('parent_trans.Password') }}*</label>
                                        <div class="input-group input-group-lg">
                                            <span
                                                class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                    class="fas fa-lock"></i></span>
                                            <input id="password" type="password"
                                                class="form-control border-0 bg-light rounded-end ps-1 @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Check box -->
                                    <div class="mb-4 d-flex justify-content-between mb-4">

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="two">{{ trans('login_trans.Rememberme') }}</label>
                                        </div>

                                        <div class="text-primary-hover">
                                           
                                                <a href="{{ route('password.request') }}" class="text-secondary">
                                                    <u>{{ trans('login_trans.Forgot') }}</u>
                                                </a>
                                        
                                        </div>
                                    </div>

                                    {{-- 								
                                    <div class="section-field">
                                        <div class="remember-checkbox mb-30">
                                            <input type="checkbox" class="form-control" name="two" id="two" />
                                            <label for="two"> تذكرني</label>
                                        </div>
                                    </div> --}}

                                    <!-- Button -->
                                    <div class="align-items-center mt-0">
                                        <div class="d-grid">
                                            <button
                                                class="btn btn-primary mb-0"><span>{{ trans('login_trans.Login') }}</span><i
                                                    class="fa fa-check"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Form END -->
                            </div>
                        </div> <!-- Row END -->
                    </div>
                </div> <!-- Row END -->
            </div>
        </section>


        <!--=================================
login-->

    </div>
    @include('frontendpages.layouts.scripts')
</body>

</html>
