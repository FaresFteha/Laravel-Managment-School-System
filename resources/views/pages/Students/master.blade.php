@extends('layouts.master')

@section('css')
@livewireStyles
@endsection

@section('title')
{{ trans('hedartitlepage.Home') }}
 @stop
@section('page-header')

<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-15">{{ trans('students_trans.Studentcontrolpanel') }}: <span style="color: rgb(231, 9, 9)"><i class="fa fa-graduation-cap"></i> {{  auth()->user()->name }}!</span>
            </h3></div> 
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('hedartitlepage.from') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('hedartitlepage.to') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
     <!-- widgets 
     <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-danger">
                                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">Visitors</p>
                            <h4>65,650</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> 81% lower
                        growth
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-warning">
                                <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">Orders</p>
                            <h4>656</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> Total sales
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-success">
                                <i class="fa fa-dollar highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">Revenue</p>
                            <h4>$65656</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Sales Per Week
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-primary">
                                <i class="fa fa-twitter highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">Followers</p>
                            <h4>62,500+</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated
                    </p>
                </div>
            </div>
        </div>
    </div>-->

    {{-- Calender LiveWire --}}
    <livewire:calendar-student/>
@endsection


@section('js')
@livewireScripts
@stack('scripts')
@endsection
