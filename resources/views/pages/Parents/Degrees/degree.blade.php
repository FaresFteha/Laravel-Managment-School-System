@extends('layouts.master')
@section('css')
    @toastr_css

@endsection
@section('title'){{ trans('students_trans.Resultslist') }}
@stop
@section('page-header')
    <!-- breadcrumb -->
@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">

                <h4 class="mb-0" style="color:red">{{ trans('students_trans.Studentresults') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('hedartitlepage.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('students_trans.Resultslist') }}</li>
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
                        <div class="card card-statistics h-100">
                            <div class="card-body"><br><br>
                                <div class="table-responsive">
                                    <table class="table  table-hover table-bordered p-0" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('students_trans.name') }}</th>
                                                <th>{{ trans('exams_trans.Name_exam') }}</th>
                                                <th>{{ trans('Questions_trans.Marke') }}</th>
                                                <th>{{ trans('students_trans.Thedateoftheexam') }}</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($degrees as $degree)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $degree->student->name }}</td>
                                                    <td>{{ $degree->quizze->name }}</td>
                                                    <td>{{ $degree->score }}</td>
                                                    <td>{{ $degree->date }}</td>
                                                </tr>
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
