@extends('layouts.master')
@section('css')
    @toastr_css
@endsection
@section('title')
    {{ trans('students_trans.list_Graduate') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('students_trans.list_Graduate') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('main_siadebar_trans.add_Graduate') }}</li>
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
                <div class="card card-statistics h-100">
                    <div class="card-body">

                        <div class="widget-search ml-0 clearfix">
                            <i class="fa fa-search"></i>
                            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                                placeholder="{{ trans('extra_trans.Search_here') }}">
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table  table-hover table-sm table-bordered p-0" style="text-align: center">
                                <thead>
                                    <tr class="alert-success">
                                        <th>#</th>
                                        <th>{{ trans('Students_trans.name') }}</th>
                                        <th>{{ trans('Students_trans.email') }}</th>
                                        <th>{{ trans('Students_trans.gender') }}</th>
                                        <th>{{ trans('Students_trans.Grade') }}</th>
                                        <th>{{ trans('Students_trans.classrooms') }}</th>
                                        <th>{{ trans('Students_trans.section') }}</th>
                                        <th>{{ trans('Students_trans.Processes') }}</th>
                                    </tr>
                                </thead>
                                <tbody  id="myTable">
                                    @forelse($students as $student)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->gender->gender }}</td>
                                            <td>{{ $student->grade->name }}</td>
                                            <td>{{ $student->classroom->name_class }}</td>
                                            <td>{{ $student->section->name_sections }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#Return_Student{{ $student->id }}"
                                                    title="{{ trans('students_trans.return_student') }}">{{ trans('students_trans.return_student') }}</button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#Delete_Student{{ $student->id }}"
                                                    title="{{ trans('students_trans.delete_student') }}">{{ trans('students_trans.delete_student') }}</button>

                                            </td>
                                        </tr>
                                        @include('pages.Students.Graudated.return')
                                        @include('pages.Students.Graudated.Delete')
                                    @empty

                                        <tr>
                                            <td class="alert-danger text-center" colspan="8">
                                                {{ trans('students_trans.NotData') }}</td>
                                        </tr>
                                    @endforelse

                            </table>
                            <div>
                                <tfoot>
                                    <tr>
                                        <td colspan="8">
                                            <div class="float-right">
                                                {!! $students->appends(request()->all())->links() !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
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
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
