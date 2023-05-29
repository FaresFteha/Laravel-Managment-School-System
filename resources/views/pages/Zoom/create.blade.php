@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
 {{ trans('Zoom_trans.Addanewonlineshare') }} 
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<h4>{{ trans('Zoom_trans.Addanewonlineshare') }}</h4>
<br>
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

                <form method="post" action="{{ route('Zoom.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Grade_id">{{ trans('Students_trans.Grade') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="Grade_id" name="Grade_id" required>
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="Classroom_id" name="Classroom_id" required>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id">{{ trans('Students_trans.section') }} : <span
                                    class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="section_id" name="section_id" required>

                                </select>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ trans('Zoom_trans.Classtitle') }}: <span class="text-danger">*</span></label>
                                <input class="form-control" name="topic" type="text" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ trans('Zoom_trans.Classdateandtime') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" type="datetime-local" name="start_time" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ trans('Zoom_trans.Classdurationinminutes') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="duration" type="text" required>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success  nextBtn btn-lg pull-left"
                        type="submit">{{ trans('Students_trans.submit') }}</button>
                </form>

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