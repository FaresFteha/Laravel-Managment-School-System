@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
@endsection

@section('title')
{{ trans('users_trans.UsersPermissions') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('users_trans.UsersPermissions') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('users_trans.UsersPermissions') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <!-- breadcrumb -->
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('roles.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{ trans('users_trans.Role_name_en') }}</strong>
                                            <input type="text" name="name_en" class="form-control" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>{{trans('users_trans.Permissions')}}</strong>
                                            <br/>
                                            @foreach ($permission as $value)
                                                <label required>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                                    {{ $value->name }}</label>
                                                <br/>
                                            @endforeach
                                        </div>
                                    </div>
                                    <button class="btn btn-success nextBtn btn-lg pull-left"
                                        type="submit">{{ trans('Teacher_trans.Submit') }}</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
@endsection
