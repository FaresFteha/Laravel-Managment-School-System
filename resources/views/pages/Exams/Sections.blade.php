@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Sections_trans.title_page') }}: {{ trans('exams_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<!-- breadcrumb -->
<h4> {{ trans('Sections_trans.title_page') }}: {{ trans('exams_trans.title_page') }}</h4>
<br>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
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
            <div class="card-body">
                @can('اضافة جدول امتحانات الفصل الدراسي')
                    <a href="{{ route('Exams.create') }}" class="btn btn-success" role="button"
                        aria-pressed="true">{{ trans('exams_trans.Add_exam') }}</a>
                @elsecan('Add Semester Exam Schedule')
                    <a href="{{ route('Exams.create') }}" class="btn btn-success" role="button"
                        aria-pressed="true">{{ trans('exams_trans.Add_exam') }}</a>
                @endcan
                <br><br>
                <div class="accordion gray plus-icon round">

                    @foreach ($Grades as $Grade)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{ $Grade->name }}</a>
                            <div class="acd-des">
                                <div class="row">
                                    <div class="col-xl-12 mb-30">
                                        <div class="card card-statistics h-100">
                                            <div class="card-body">
                                                <a href="{{ route('print_exams', $Grade->id) }}" class="btn btn-dark"
                                                    role="button"
                                                    aria-pressed="true">{{ trans('exams_trans.print_exam') }}</a><br><br>
                                                <div class="d-block d-md-flex justify-content-between">
                                                    <div class="d-block">
                                                    </div>
                                                </div>
                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0">
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
                                                                <th>{{ trans('grades_trans.Processes') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($Grade->Exams as $exam)
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
                                                                    <td>
                                                                        @can('تعديل جدول امتحانات الفصل الدراسي')
                                                                            <a href="{{ route('Exams.edit', $exam->id) }}"
                                                                                class="btn btn-info" role="button"
                                                                                aria-pressed="true"><i
                                                                                    class="fa fa-edit"></i></a>
                                                                        @elsecan('Edit Semester Exam Schedule')
                                                                            <a href="{{ route('Exams.edit', $exam->id) }}"
                                                                                class="btn btn-info" role="button"
                                                                                aria-pressed="true"><i
                                                                                    class="fa fa-edit"></i></a>
                                                                        @endcan

                                                                        @can('حذف جدول امتحانات الفصل الدراسي')
                                                                            <button type="button" class="btn btn-danger"
                                                                                data-toggle="modal"
                                                                                data-target="#delete_exam{{ $exam->id }}"
                                                                                title="حذف"><i
                                                                                    class="fa fa-trash"></i></button>
                                                                        @elsecan('Delete Semester Exam Schedule')
                                                                            <button type="button" class="btn btn-danger"
                                                                                data-toggle="modal"
                                                                                data-target="#delete_exam{{ $exam->id }}"
                                                                                title="حذف"><i
                                                                                    class="fa fa-trash"></i></button>
                                                                        @endcan
                                                                    </td>
                                                                </tr>

                                                                <div class="modal fade"
                                                                    id="delete_exam{{ $exam->id }}" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <form
                                                                            action="{{ route('Exams.destroy', 'test') }}"
                                                                            method="post">
                                                                            {{ method_field('delete') }}
                                                                            {{ csrf_field() }}
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('exams_trans.Delete_Exam') }}
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p> {{ trans('classrooms_trans.Warning_class') }}
                                                                                        {{ $exam->name }}</p>
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $exam->id }}">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <div class="modal-footer">
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">{{ trans('classrooms_trans.Close') }}</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger">{{ trans('classrooms_trans.submit') }}</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
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
