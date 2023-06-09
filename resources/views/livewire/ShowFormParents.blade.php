@extends('layouts.master')

@section('css')
@livewireStyles
@endsection

@section('title')
    {{trans('main_siadebar_trans.Add_Parent')}}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('main_siadebar_trans.Add_Parent') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('main_siadebar_trans.Add_Parent') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('PageTitle')
    {{trans('main_siadebar_trans.Add_Parent')}}
@endsection
<!-- breadcrumb -->

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
            {{-- استدعاء كومبونينت اللايف وير --}}
            {{-- @livewire('insert-parent') --}}
            <livewire:insert-parent/>
            {{-- استدعاء كومبونينت اللايف وير --}}
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @livewireScripts
@endsection