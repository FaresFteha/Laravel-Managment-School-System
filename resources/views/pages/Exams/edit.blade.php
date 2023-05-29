@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    تعديل امتحان
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    تعديل امتحان
@stop
<!-- breadcrumb -->
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
                        <form action="{{ route('Exams.update', 'test') }}" method="post">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('exams_trans.Name_exam_ar') }}</label>
                                    <input type="text" name="day_exam_ar"
                                        value="{{ $exam->getTranslation('day_exam', 'ar') }}" class="form-control">
                                        @error('day_exam_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    <input type="hidden" name="id" value="{{ $exam->id }}">

                                </div>

                                <div class="col">
                                    <label for="title">{{ trans('exams_trans.Name_exam_en') }}</label>
                                    <input type="text" name="day_exam_en"
                                        value="{{ $exam->getTranslation('day_exam', 'en') }}" class="form-control">
                                        @error('day_exam_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                </div>

                                <div class="col">
                                    <label for="title">{{ trans('exams_trans.Semester') }}</label>
                                    <input type="number" name="term" value="{{ $exam->term }}"
                                        class="form-control">
                                        @error('term')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                </div>

                            </div>
                            <br>

                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{ trans('exams_trans.start_exam') }}</label>
                                    <input type="date" name="start_exam" value="{{ $exam->start_exam }}"
                                        class="form-control">
                                        @error('start_exam')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                </div>

                                <div class="col">
                                    <label for="title">{{ trans('exams_trans.exam_time') }}</label>
                                    <input type="time" name="exam_time" value="{{ $exam->exam_time }}"
                                        class="form-control">
                                        @error('exam_time')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                </div>

                                <div class="col">
                                    <label for="title">{{ trans('exams_trans.exam_duration') }}</label>
                                    <input type="text" name="exam_duration" value="{{ $exam->exam_duration }}"
                                        class="form-control">
                                        @error('exam_duration')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                </div>

                            </div>

                    </div>
                    <br>

                    <div class="form-row">

                        <div class="col">
                            <label for="Subject_id">{{ trans('classrooms_trans.Name_Grade') }}:</label>
                            <div>
                                <select Class="custom-select mr-sm-2" id="Subject_id" name="Subject_id">
                                    @foreach ($subj as $subj)
                                        <option value="{{ $subj->id }}"
                                            {{ $subj->id == $exam->Subject_id ? 'selected' : '' }}>{{ $subj->name }}
                                        </option>
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
                                    <option value="{{ $year }}"
                                        {{ $year == $exam->academic_year ? 'selected' : '' }}>{{ $year }}
                                    </option>
                                @endfor
                            </select>
                            @error('academic_year')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="col">
                            <label for="Name_en">{{ trans('classrooms_trans.Name_Grade') }}:</label>
                            <div>
                                <select Class="custom-select mr-sm-2" id="grade_id" name="grade_id">
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}"
                                            {{ $grade->id == $exam->grade_id ? 'selected' : '' }}>{{ $grade->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success nextBtn btn-lg pull-left" type="submit">{{ trans('grades_trans.submit') }}</button>
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
