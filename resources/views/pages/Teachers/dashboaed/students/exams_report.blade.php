@extends('layouts.master')
@section('css')

@endsection

@section('title')
{{ trans('attendance_trans.Examreports') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<h4> {{ trans('attendance_trans.Examreports') }}</h4>
<!-- breadcrumb -->
@endsection
@section('content')
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
                    <form method="post" action="{{ route('Exam.search')}}" autocomplete="off">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{ trans('attendance_trans.Searchinformation') }}
                        </h6><br>
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

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="student">{{ trans('students_trans.Subj') }}</label>
                                    <select class="custom-select mr-sm-2" name="quizze_id">
                                        <option value="0">{{ trans('attendance_trans.All') }}</option>
                                        @foreach ($Quizzes as $Quizze)
                                            <option value="{{ $Quizze->id }}">{{ $Quizze->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success nextBtn btn-lg pull-right"
                            type="submit">{{ trans('Students_trans.submit') }}</button>
                    <br>
                    <br>
                    </form>
                    <br>
                    @isset($Students)
                        <div class="table-responsive">
                            <table class="table  table-hover table-bordered p-0" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th class="alert-success">#</th>
                                        <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                                        <th class="alert-success">{{ trans('students_trans.classrooms') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                                        <th class="alert-success">{{ trans('Questions_trans.Marke') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Students as $student)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $student->student->name }}</td>
                                            <td>{{ $student->student->grade->name }}</td>
                                            <td>{{ $student->student->classroom->name_class }}</td>
                                            <td>{{ $student->student->section->name_sections}}</td>
                                            <td>{{ $student->score }}</td>
                                        </tr>
                                    @endforeach
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

@endsection
