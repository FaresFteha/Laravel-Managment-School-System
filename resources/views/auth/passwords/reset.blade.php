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
                    <div class="col-12 col-lg-6 d-flex justify-content-center">
                        <div class="row my-5">
                            <div class="col-sm-10 col-xl-12 m-auto">

                                <!-- Title -->
                                <h1 class="fs-2">{{ trans('login_trans.Forgot') }}</h1>
                                <h5 class="fw-light mb-4">{{ trans('login_trans.resettitle') }}
                                </h5>
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <!-- Form START -->
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <!-- Email -->
                                    <div class="mb-4">
                                        <label for="exampleInputEmail1"
                                            class="form-label">{{ trans('Setting_trans.Email') }}</label>
                                        <div class="input-group input-group-lg">
                                            <span
                                                class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                    class="bi bi-envelope-fill"></i></span>
                                            <input type="email"
                                                class="form-control border-0 bg-light rounded-end ps-1 @error('email') is-invalid @enderror"
                                                placeholder="{{ trans('Setting_trans.Email') }}" id="email" name="email" value="{{ $email ?? old('email') }}"
                                                required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="input-group input-group-lg">
                                            <span
                                                class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                    class="bi bi-envelope-fill"></i></span>
                                            <input
                                                class="form-control border-0 bg-light rounded-end ps-1 @error('password') is-invalid @enderror"
                                                placeholder="{{ trans('parent_trans.Password') }}" id="password"
                                                type="password" name="password" required autocomplete="new-password"
                                                autofocus>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="input-group input-group-lg">
                                            <span
                                                class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                    class="bi bi-envelope-fill"></i></span>
                                            <input
                                                class="form-control border-0 bg-light rounded-end ps-1 @error('password') is-invalid @enderror"
                                                placeholder="{{ trans('parent_trans.Password') }}"
                                                id="password-confirm" type="password" name="password_confirmation"
                                                required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="align-items-center">
                                        <div class="d-grid">
                                            <button class="btn btn-primary mb-0"
                                                type="submit">{{ trans('login_trans.Restpassword2') }}</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Form END -->
                            </div>
                        </div> <!-- Row END -->
                    </div </div> <!-- Row END -->
                </div>
        </section>


        <!--=================================
login-->

    </div>
    @include('frontendpages.layouts.scripts')
</body>

</html>
