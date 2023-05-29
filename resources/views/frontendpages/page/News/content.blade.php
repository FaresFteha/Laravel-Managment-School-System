@extends('frontendpages.layouts.master')

@section('title')
    {{ trans('content_trans.Gaza') }}
@endsection

@section('css')
@endsection

@section('pagename')
@endsection

@section('titlepage')
@endsection

@section('titlepagev2')
@endsection

@section('content')
    <style>
        .card-img {
            width: 100%;
            height: 40vh;
            object-fit: cover;
        }
    </style>
    <!-- =======================
Main Content START -->
<section class="pb-0 pt-4 pb-md-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<span>{{ $News->created_at->diffForHumans()  }}</span><span class="mx-2">|</span><div class="badge bg-success text-white"><a href="{{ route('News') }}"><h5>{{trans('content_trans.latestnews') }}</h5></a></div>
				<!-- Title and Info START -->
				<div class="row">
					<!-- Content -->
					<div class="col-lg-9 order-1">
                        <h1 class="mt-2 mb-0 display-5">{{ $News->Title }}</h1>

                        <img src="{{ asset('attachments/NewsSchool/' . $News->file_name) }}" class="rounded-3" alt="">
						<!-- Info -->
						<p class="mt-2">{!! $News->content !!}</p>
					</div>
				</div>
				<!-- Title and Info END -->
				<hr> <!-- Divider -->
			</div>
		</div> <!-- Row END -->
	</div>
</section>
<!-- =======================
Main Content END -->
@endsection
