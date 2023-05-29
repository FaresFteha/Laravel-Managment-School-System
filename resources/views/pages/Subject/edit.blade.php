@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    اضافة مادة دراسية
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    اضافة مادة دراسية
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
                        <form action="{{ route('Subject.update', 'test') }}" method="post" autocomplete="off">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('students_trans.Namesubjar') }}</label>
                                    <input type="text" name="Name_ar"
                                        value="{{ $subject->getTranslation('name', 'ar') }}" class="form-control">
                                    @error('Name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" name="id" value="{{ $subject->id }}">
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('students_trans.Namesubjen') }}</label>
                                    <input type="text" name="Name_en"
                                        value="{{ $subject->getTranslation('name', 'en') }}" class="form-control">
                                        @error('Name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputState">{{ trans('students_trans.Grade') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" id="Grade_id" name="Grade_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($grades as $Grade)
                                            <option value="{{ $Grade->id }}"
                                                {{ $Grade->id == $subject->Grade_id ? 'selected' : '' }}>
                                                {{ $Grade->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Grade_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('students_trans.classrooms') }}</label>
                                    <select id='Classroom_id' name="Classroom_id" class="custom-select">
                                        <option value="{{ $subject->classroom->id }}">
                                            {{ $subject->classroom->name_class }}
                                        </option>
                                    </select>
                                    @error('Classroom_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('students_trans.nametrcher') }} </label>
                                    <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                {{ $teacher->id == $subject->teacher_id ? 'selected' : '' }}>
                                                {{ $teacher->Name }}</option>
                                        @endforeach
                                    </select>
                                    @error('teacher_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <button class="btn btn-success nextBtn btn-lg pull-right" type="submit">
                                {{ trans('students_trans.submit') }}
                            </button>
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
