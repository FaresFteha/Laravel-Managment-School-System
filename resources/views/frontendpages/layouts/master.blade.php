<!DOCTYPE html>
<html>

<head>
    {{-- css i nclude --}}
    @include('frontendpages.layouts.head')
</head>

<body>

    <!-- Header START -->
    @if (App::getLocale() == 'en')
        @include('frontendpages.layouts.main_header')
    @else
        @include('frontendpages.layouts.main_header_ar')
    @endif

    <!-- Header END -->

    <!----Main Banner START -->
    <main>
    @yield('content')
    </main>
    {{-- Footer --}}
    @if (App::getLocale() == 'en')
@include('frontendpages.layouts.footer')
@else
@include('frontendpages.layouts.footer_ar')
@endif


    {{-- Scripts --}}
    @include('frontendpages.layouts.scripts')
</body>

</html>
