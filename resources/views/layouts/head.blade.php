<!-- Title -->
<title>@yield('title')</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!--- Style css -->

<link href="{{ URL::asset('assets/css/wizard.css') }}" rel="stylesheet">
<!--- Style css -- If statment if en or ar-->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
<link rel="stylesheet" href="{{ asset('assets/bootstrap-fileinput/css/fileinput.min.css') }}">


@yield('css')