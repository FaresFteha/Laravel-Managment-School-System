@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')قائمة الابناء@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('parent_trans.childrenlist') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('hedartitlepage.from') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('parent_trans.childrenlist') }}</li>
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
                        <div class="table-responsive">
                            <div class="widget-search ml-0 clearfix">
                                <i class="fa fa-search"></i>
                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                                    placeholder="{{ trans('extra_trans.Search_here') }}">
                            </div>
                            <br>
                            <table class="table  table-hover table-bordered p-0" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('students_trans.name') }}</th>
                                        <th>{{ trans('students_trans.email') }}</th>
                                        <th>{{ trans('students_trans.gender') }}</th>
                                        <th>{{ trans('students_trans.Grade') }}</th>
                                        <th>{{ trans('students_trans.classrooms') }}</th>
                                        <th>{{ trans('students_trans.section') }}</th>
                                        <th>{{ trans('students_trans.Processes') }}</t </tr>
                                </thead>
                                <tbody id="myTable">
                                    @forelse($Sons as $son)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $son->name }}</td>
                                            <td>{{ $son->email }}</td>
                                            <td>{{ $son->gender->gender }}</td>
                                            <td>{{ $son->grade->name }}</td>
                                            <td>{{ $son->classroom->name_class }}</td>
                                            <td>{{ $son->section->name_sections }}</td>
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success  dropdown-toggle" href="#"
                                                        role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        {{ trans('fees_trans.Process') }}
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item"
                                                            href="{{ route('Sons.results', $son->id) }}"><i
                                                                style="color: #000000"
                                                                class="fa fa-eye "></i>&nbsp;{{ trans('parent_trans.testresults') }}</a>

                                                        <a class="dropdown-item"
                                                            href="{{ route('Sons.resultsExam', $son->id) }}"><i
                                                                style="color: #ff0707"
                                                                class="fa fa-eye "></i>&nbsp;{{ trans('parent_trans.smsterexamresults') }}</a>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td class="alert-danger text-center" colspan="8">
                                            {{ trans('students_trans.NotData') }}</td>
                                    </tr>
                                    @endforelse
                            </table>
                            <div >
                                <tfoot>
                                    <tr>
                                        <td colspan="8">
                                            <div class="float-right">
                                                {!! $Sons->appends(request()->all())->links() !!}
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
