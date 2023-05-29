<style>
    .navbar-expand-xl .navbar-brand .navbar-brand-item {
       height: 40px;
   }
</style>
<header class="navbar-light navbar-sticky header-static">
    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-xl">
        <div class="container">
            <!-- Logo START -->
            <a class="navbar-brand" href="index-2.html">
                <img class="light-mode-item navbar-brand-item" src="{{ asset('assets/logo-new-gen/logo-new-gen.png') }}" alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="{{ asset('assetshome/images/logo-light.svg') }}"
                    alt="logo">
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-animation">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>

            <!-- Main navbar START -->
            <div class="navbar-collapse w-100 collapse" id="navbarCollapse">

                <!-- Nav Main menu START -->
                <ul class="navbar-nav navbar-nav-scroll mx-auto">
                    <!-- Nav item 1 Demos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="{{ route('selection') }}" "><i class="fas fa-home"></i> {{ trans('header_trans.home') }}</a>
                    </li>

                    <!-- Nav item 2 Pages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('About.school') }}"><i class="fas fa-globe"></i> {{ trans('header_trans.aboutschool') }}</a>
                    </li>

                    <!-- Nav item 3 Account -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('login.show', 'teacher') }}"><i class="bi bi-person-workspace"></i> {{ trans('header_trans.Lecturergateway') }}</a>
                    </li>

                    <!-- Nav item 4 Component-->
                    <li class="nav-item"><a class="nav-link"  href="{{ route('login.show', 'parent') }}"><i class="fa fa-users"></i> {{ trans('header_trans.Parentgateway') }}</a></li>
                    <!-- Nav item 4 Component-->
                   <li class="nav-item"><a class="nav-link"  href="{{ route('login.show', 'student') }}"><i class="fas fa-user-graduate"></i> {{ trans('header_trans.Studentgateway') }}</a></li>

                            <!-- Nav item 4 Component-->
                    <li class="nav-item"><a class="nav-link" href="{{ route('login.show', 'admin') }}"><i class="fas fa-user-tie"></i> {{ trans('header_trans.Staffgateway') }}</a></li>

                            
                    <!-- Language -->
                    <ul class="navbar-nav navbar-nav-scroll me-3 d-none d-xl-block">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="language"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-globe me-2"></i>
                                <span class="d-none d-lg-inline-block">{{ trans('header_trans.language') }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end min-w-auto" aria-labelledby="language">
                                <li>
                                                  @foreach (LaravelLocalization::getSupportedLocales() as $localeCode=> $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                            @endforeach

                    </li>
                </ul>

                </ul>
                </ul>
                <!-- Nav Main menu END -->
                <!-- Nav Search START -->

                {{-- <div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
                    <div class="nav-item w-100">
                        <form class="position-relative">
                            <input class="form-control pe-5 bg-transparent" type="search" placeholder="Search"
                                aria-label="Search">
                            <button
                                class="btn bg-transparent px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                                type="submit"><i class="fas fa-search fs-6 "></i></button>
                        </form>
                    </div>
                </div> --}}
                <!-- Nav Search END -->

            </div>
            <!-- Main navbar END -->
            <li class="list-inline-item"> <a class="btn btn-white  shadow px-2 text-facebook" href="#"><i
                        class="fab fa-fw fa-facebook-f"></i></a> </li>
            <li class="list-inline-item"> <a class="btn btn-white  shadow px-2 text-instagram" href="#"><i
                        class="fab fa-fw fa-instagram"></i></a> </li>
            <li class="list-inline-item"> <a class="btn btn-white shadow px-2 text-twitter" href="#"><i
                        class="fab fa-fw fa-twitter"></i></a> </li>
            <li class="list-inline-item"> <a class="btn btn-white shadow px-2 text-linkedin" href="#"><i
                        class="fab fa-fw fa-linkedin-in"></i></a> </li>
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>