@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('exams_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('exams_trans.title_page') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                </li>
                <li class="breadcrumb-item active">  {{ trans('exams_trans.title_page') }}</li>
            </ol>
        </div>

    </div>
</div>

@endsection
@section('content')
<!-- row -->
<div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            @can('اضافة جدول امتحانات الفصل الدراسي')
                            <a href="{{ route('Exams.create') }}" class="btn btn-success" role="button"
                            aria-pressed="true">{{trans('exams_trans.Add_exam')}}</a>
                            @elsecan('Add Semester Exam Schedule')
                            <a href="{{ route('Exams.create') }}" class="btn btn-success" role="button"
                            aria-pressed="true">{{trans('exams_trans.Add_exam')}}</a>
                            @endcan
                            <br><br>
                            <div class="table-responsive">
                                <table  class="table  table-hover table-bordered p-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('exams_trans.Name_exam') }}</th>
                                            <th>{{ trans('exams_trans.Semester') }}</th>
                                            <th>{{ trans('exams_trans.day_exam') }}</th>
                                            <th>{{ trans('exams_trans.start_exam') }}</th>
                                            <th>{{ trans('exams_trans.exam_time') }}</th>
                                            <th>{{ trans('exams_trans.academic_year') }}</th>
                                            <th>{{ trans('grades_trans.Name') }}</th>
                                            <th>{{ trans('grades_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $exam->subject->name }}</td>
                                                <td>{{ $exam->term }}</td>
                                                <td>{{ $exam->day_exam }}</td>
                                                <td>{{ $exam->start_exam }}</td>
                                                <td>{{ $exam->exam_time }}</td>
                                                <td>{{ $exam->academic_year }}</td>
                                                <td>{{ $exam->grade->name }}</td>
                                                <td>
                                                    @can('تعديل جدول امتحانات الفصل الدراسي')
                                                    <a href="{{ route('Exams.edit', $exam->id) }}"
                                                        class="btn btn-info" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    @elsecan('Edit Semester Exam Schedule')
                                                    <a href="{{ route('Exams.edit', $exam->id) }}"
                                                        class="btn btn-info" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    @endcan

                                                    @can('حذف جدول امتحانات الفصل الدراسي')
                                                    <button type="button" class="btn btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#delete_exam{{ $exam->id }}" title="حذف"><i
                                                            class="fa fa-trash"></i></button>
                                                    @elsecan('Delete Semester Exam Schedule')
                                                    <button type="button" class="btn btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#delete_exam{{ $exam->id }}" title="حذف"><i
                                                            class="fa fa-trash"></i></button>
                                                    @endcan


                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_exam{{ $exam->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('Exams.destroy', 'test') }}" method="post">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">حذف
                                                                    امتحان</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('My_Classes_trans.Warning_Grade') }}
                                                                    {{ $exam->name }}</p>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $exam->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">{{ trans('My_Classes_trans.submit') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
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
