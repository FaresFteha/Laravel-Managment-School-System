@extends('layouts.master')
@section('css')
    @toastr_css
@endsection

@section('title')
{{ trans('exams_trans.Add_exam') }}
@endsection

@section('page-header')
    <h4>{{ trans('exams_trans.Add_exam') }}</h4>
@endsection


@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (session()->has('error'))
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
                            <form action="{{ route('Exams.store') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">{{ trans('exams_trans.Name_exam_ar') }}</label>
                                        <input type="text" name="day_exam_ar" class="form-control">
                                        @error('day_exam_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('exams_trans.Name_exam_en') }}</label>
                                        <input type="text" name="day_exam_en" class="form-control">
                                        @error('day_exam_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('exams_trans.Semester') }}</label>
                                        <input type="number" name="term" class="form-control">
                                        @error('term')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">{{ trans('exams_trans.start_exam') }}</label>
                                        <input type="date" name="start_exam" class="form-control">
                                        @error('start_exam')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('exams_trans.exam_time') }}</label>
                                        <input type="time"  name="exam_time" class="form-control">
                                        @error('exam_time')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('exams_trans.exam_duration') }}</label>
                                        <input type="text" name="exam_duration" class="form-control">
                                        @error('exam_duration')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 
                                </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="Subject_id">{{ trans('students_trans.Subj') }}</label>
                                        <div>
                                            <select Class="custom-select mr-sm-2"  id="Subject_id" name="Subject_id">
                                                @foreach ($subj as $subjitem)
                                                    <option value="{{ $subjitem->id }}">
                                                        {{ $subjitem->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('Subject_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                    </div>


                                    <div class="form-group col">
                                        <label for="academic_year">{{ trans('Students_trans.academic_year') }} : <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="academic_year">
                                            <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                            @php
                                                $current_year = date('Y');
                                            @endphp
                                            @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                        @error('academic_year')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    
                                    <div class="form-group col">
                                        <label for="Name_en">{{ trans('classrooms_trans.Name_Grade') }}:</label>
                                        <div>
                                            <select Class="custom-select mr-sm-2"  id="grade_id" name="grade_id">
                                                @foreach ($grades as $Gradeitem)
                                                    <option value="{{ $Gradeitem->id }}">
                                                        {{ $Gradeitem->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('grade_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                    </div>
                                </div>

                                
                                <button class="btn btn-success nextBtn btn-lg pull-left" type="submit">{{ trans('classrooms_trans.submit') }}</button>
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
