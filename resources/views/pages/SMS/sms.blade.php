@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
{{ trans('sms_trans.Textmessages') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('sms_trans.Textmessages') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('sms_trans.Studentmessages') }}</li>
                </ol>
            </div>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection



@section('content')
    <div class="card card-statistics mb-30">
        <div class="card-body">
            <form action="{{ route('SMS.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <label for="validationDefaultUsername">{{ trans('sms_trans.phone') }}:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend2">+970</span>
                        </div>
                        <input type="tel" class="form-control" id="number" name="number"
                            aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{ trans('sms_trans.message') }}:</label>
                        <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                    </div>
                </div>
        </div>
        <br>
        <button class="btn btn-primary" type="submit">{{ trans('sms_trans.sendmessage') }}</button>
        </form>
    </div>
    </div>
@endsection

@section('js')
    @toastr_js
    @toastr_render
@endsection
