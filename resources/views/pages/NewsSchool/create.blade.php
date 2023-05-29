@extends('layouts.master')
@section('css')
    @toastr_css
    <link rel="stylesheet" href="{{ asset('assets/summernotes/summernote-bs4.min.css')}}">
@endsection

@section('title')
    {{ trans('news_trans.InsertNews') }}
@endsection

@section('page-header')
    <h4>{{ trans('news_trans.InsertNews') }}</h4>
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
                            <form action="{{ route('News.store') }}" method="post" enctype="multipart/form-data"
                                autocomplete="off">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('news_trans.Title') }}</label>
                                        <input type="text" name="Title" class="form-control" required>
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('news_trans.Title_en') }}</label>
                                        <input type="text" name="Title_en" class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12 mb-30">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="description">{{ trans('news_trans.Content') }}</label>
                                            <textarea name='content' rows="3" class="form-control summernote">
                                                {{ old('content') }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-30">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="content_en">{{ trans('news_trans.Content_en') }}</label>
                                            <textarea name='content_en' rows="3" class="form-control summernote">
                                                {{ old('content_en') }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-4">
                                    <div class="col-12">
                                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                                            <label for="images">{{ trans('Students_trans.Attachments') }} </label>
                                        </h6>
                                        <br>
                                        <div class="file-loading">
                                            <input type="file" name="file_name" id="photos"
                                                class="file-input-overview">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success nextBtn btn-lg pull-left"
                                    type="submit">{{ trans('classrooms_trans.submit') }}</button>
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
    <script src="{{ asset('assets/summernotes/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            $("#photos").fileinput({
                theme: "fa",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false
            });
        });
    </script>

<script>
    $(function() {
        $('.summernote').summernote({
            tabSize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        })
    });
</script>
@endsection
