@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('students_trans.editeQuiz') }} : {{$quizz->name}}
@stop
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('students_trans.editeQuiz') }} : <strong style="color: red">{{$quizz->name}}</strong>
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{ trans('students_trans.editeQuiz') }}</li>
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

                    @if(session()->has('error'))
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
                            <form action="{{route('quizzes.update','test')}}" method="post">
                                @csrf
                          @method('PATCH')
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">{{ trans('students_trans.NameQuizzesjar') }}</label>
                                        <input type="text" name="Name_ar" value="{{$quizz->getTranslation('name','ar')}}" class="form-control">
                                        @error('Name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" name="id" value="{{$quizz->id}}">
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('students_trans.NameQuizzesjen') }}</label>
                                        <input type="text" name="Name_en" value="{{$quizz->getTranslation('name','en')}}" class="form-control">
                                        @error('Name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{ trans('students_trans.Subj') }} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="subject_id">
                                                @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}" {{$subject->id == $quizz->subject_id ? "selected":""}}>{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('subject_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
 

                                </div>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" id="Grade_id" name="Grade_id">
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}" {{$grade->id == $quizz->grade_id ? "selected":""}}>{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('Grade_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" id="Classroom_id" name="Classroom_id">
                                                <option value="{{$quizz->Classroom_id}}">{{$quizz->classroom->name_class}}</option>                                            </select>
                                        </div>
                                        @error('Classroom_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                            <select class="custom-select mr-sm-2" id="section_id" name="section_id">
                                                <option value="{{$quizz->Section_id}}">{{$quizz->section->name_sections}}</option>
                                            </select>
                                            @error('section_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div><br>
                                <button class="btn btn-success nextBtn btn-lg pull-left" type="submit">{{ trans('students_trans.submit') }}</button>
                            </form>
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