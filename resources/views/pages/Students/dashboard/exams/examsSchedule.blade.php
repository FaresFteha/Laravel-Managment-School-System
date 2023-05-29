@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('students_trans.ListQuizzes') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.ListQuizzes') }}: <span
                    style="color: rgb(231, 9, 9)">{{ Auth::user()->grade->name }}</span>
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                </li>
                <li class="breadcrumb-item active"> {{ trans('students_trans.ListQuizzes') }} </li>
            </ol>
        </div>

    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered p-0" style="text-align: center">
                            <thead>
                                <tr class="text-dark">
                                    <th>#</th>
                                    <th>{{ trans('exams_trans.Name_exam') }}</th>
                                    <th>{{ trans('exams_trans.Semester') }}</th>
                                    <th>{{ trans('exams_trans.day_exam') }}</th>
                                    <th>{{ trans('exams_trans.start_exam') }}</th>
                                    <th>{{ trans('exams_trans.exam_time') }}</th>
                                    <th>{{ trans('exams_trans.exam_duration') }}</th>
                                    <th>{{ trans('exams_trans.academic_year') }}</th>
                                    <th>{{ trans('grades_trans.Name') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($examsschedule as $exam)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $exam->subject->name }}</td>
                                        <td>{{ $exam->term }}</td>
                                        <td>{{ $exam->day_exam }}</td>
                                        <td>{{ $exam->start_exam }}</td>
                                        <td>{{ $exam->exam_time }}</td>
                                        <td>{{ $exam->exam_duration }}</td>
                                        <td>{{ $exam->academic_year }}</td>
                                        <td>{{ $exam->grade->name }}</td>
                                    </tr>
                                @empty
                                <tr>
                                    <td class="alert-danger text-center" colspan="9">{{ trans('students_trans.NotData') }}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
