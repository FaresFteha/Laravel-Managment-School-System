@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
{{ trans('attendance_trans.Attendancereports') }}
@endsection

@section('page-header')

@section('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4> {{ trans('attendance_trans.Attendancereports') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                </li>
                <li class="breadcrumb-item active"> {{ trans('attendance_trans.Attendancereports') }} </li>
            </ol>
        </div>

    </div>
</div>
@endsection

@endsection

@section('content')
<!-- row -->
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('Sons.attendances.search')}}" autocomplete="off">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{ trans('attendance_trans.Searchinformation') }}</h6><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student">{{ trans('dashpored.Students') }}</label>
                                <select class="custom-select mr-sm-2" name="student_id">
                                    <option value="0">{{ trans('attendance_trans.All') }}</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control range-from date-picker-default"
                                    placeholder="{{ trans('attendance_trans.start') }}" required name="from">
                                <span class="input-group-addon">{{ trans('attendance_trans.Todate') }}</span>
                                <input class="form-control range-to date-picker-default" placeholder="{{ trans('attendance_trans.end') }}"
                                    type="text" required name="to">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg pull-right"
                        type="submit">{{ trans('Students_trans.submit') }}</button>
                </form>
                <br>
                <br>
                <br>
                @isset($Students)
                <div class="table-responsive">
                    <table class="table  table-hover table-bordered p-0" 
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                            <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                            <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                            <th class="alert-success">{{ trans('attendance_trans.Date') }}</th>
                            <th class="alert-warning">{{ trans('attendance_trans.Status') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($Students as $student)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $student->Students->name }}</td>
                            <td>{{ $student->Grades->name }}</td>
                            <td>{{ $student->Sections->name_sections }}</td>
                            <td>{{ $student->attendance_date }}</td>
                            <td>

                                @if ($student->attendance_status == 0)
                                    <label class="badge badge-danger">{{ trans('attendance_trans.Absence') }}</label>
                                @else
                                <label class="badge badge-success">{{ trans('attendance_trans.Attend') }}</label>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="alert-danger text-center" colspan="6">
                                {{ trans('students_trans.NotData') }}</td>
                        </tr>
                    @endforelse
                    </table>
                </div>
            @endisset
            </div>
        </div>
    </div>
</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
