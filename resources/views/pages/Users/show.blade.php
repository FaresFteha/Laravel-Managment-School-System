@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
{{ trans('users_trans.Users') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card card-statistics h-100">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <a href="{{ route('users.index') }}" class="button x-small" role="button"
                            aria-pressed="true">{{ trans('users_trans.Users') }}</a>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ trans('users_trans.UsersName') }}:</strong>
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ trans('users_trans.Email') }}:</strong>
                                    {{ $user->email }}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ trans('users_trans.Role_name') }} :</strong>
                                    @if (!empty($user->roles_name))
                                        @foreach ($user->roles_name as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    @toastr_js
    @toastr_render
@endsection
