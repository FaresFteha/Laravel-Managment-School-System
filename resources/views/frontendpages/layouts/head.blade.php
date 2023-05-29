<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <title>@yield('title')</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="Fares Fteha" content="">
	<meta name="Fares Fteha"content="">

	<!-- Favicon -->
	<link rel="shortcut icon"  href="{{ asset('assetshome/images/favicon.ico') }}">

	<!-- Google Font -->
	<link rel="preconnect" href="../../fonts.googleapis.com/index.html">
	<link rel="preconnect" href="../../fonts.gstatic.com/index.html" crossorigin>
	<link rel="stylesheet" href="../../fonts.googleapis.com/css23ab4.css?family=Heebo:wght@400;500;700&amp;family=Roboto:wght@400;500;700&amp;display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assetshome/vendor/font-awesome/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetshome/vendor/bootstrap-icons/bootstrap-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetshome/vendor/tiny-slider/tiny-slider.css') }}">

	<!-- Theme CSS -->
  <!--- Style css -- If statment if en or ar-->
@if (App::getLocale() == 'en')
<link href="{{ URL::asset('assetshome/css/style.css') }}" rel="stylesheet">
@else
<link rel="stylesheet" type="text/css" href="{{  URL::asset('assetshome/css/style-rtl.css') }}">
@endif

@yield('css')