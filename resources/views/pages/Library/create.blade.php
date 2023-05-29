@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('Library_trans.InsertNameBooks ') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
<h4>{{ trans('Library_trans.InsertNameBooks ') }}</h4><br>
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
                            <form action="{{route('Library.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">{{ trans('Library_trans.NameBooks') }}: <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" id="Grade_id" name="Grade_id" required>
                                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" id="Classroom_id" name="Classroom_id" required>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">{{trans('Students_trans.section')}} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" id="section_id" name="section_id" required>

                                            </select>
                                        </div>
                                    </div>

                                </div><br>



                                <div class="row pt-4">
                                    <div class="col-12">
                                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                                            <label for="academic_year">{{ trans('Library_trans.attachments ') }} : <span class="text-danger">*</span></label>
                                        </h6>
                                        <br>
                                        <div class="file-loading">
                                            <input type="file" class="file-input-overview" accept="application/pdf" name="file_name" id="pdf" required>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success nextBtn btn-lg pull-left" type="submit">{{trans('Students_trans.submit')}}</button>
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
    <script>
        $(function() {
            $("#pdf").fileinput({
                theme: "fa",
                maxFileCount: 5,
                allowedFileTypes: ['pdf'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false
            });
        });
    </script>
@endsection