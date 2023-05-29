@extends('layouts.master')
@section('css')
    @toastr_css
@endsection

@section('title')
{{trans('Events_trans.InsertEvent')}}
@endsection

@section('page-header')
    <h4>{{trans('Events_trans.InsertEvent')}}</h4>
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
                            <form action="{{ route('Events.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">{{ trans('Events_trans.NameEvent') }}</label>
                                        <input type="text" name="name_event_ar" class="form-control" required>
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('Events_trans.name_event_en') }}</label>
                                        <input type="text" name="name_event_en" class="form-control" required>
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('Events_trans.EventDate') }}</label>
                                        <input name="event_date" class="form-control" type="text"  id="datepicker-action" data-date-format="yyyy-mm-dd" required>
                                    </div>

                                </div>
                                <br>
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
@endsection
