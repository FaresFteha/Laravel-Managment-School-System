<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

<!-- Bootstrap JS -->
<script src="{{ asset('assetshome/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{ asset('assetshome/vendor/purecounterjs/dist/purecounter_vanilla.js')}}"></script>

@if (App::getLocale() == 'en')
<script src="{{  URL::asset('assetshome/vendor/tiny-slider/tiny-slider.js')}}"></script>
@else
<script src="{{  URL::asset('assetshome/vendor/tiny-slider/tiny-slider-rtl.js')}}"></script>
@endif
<!-- Template Functions -->
<script src="{{ asset('assetshome/js/functions.js')}}"></script>

@yield('script')