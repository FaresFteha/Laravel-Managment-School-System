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
                            <form action="{{ route('Events.update' , 'test') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('Events_trans.NameEvent') }}</label>
                                        <input type="text" name="name_event_ar" class="form-control" value="{{ $event->getTranslation('name_event', 'ar')}}" required>
                                        <input type="hidden" name="id" value="{{ $event->id}}" >
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('Events_trans.name_event_en') }}</label>
                                        <input type="text" name="name_event_en" class="form-control" value="{{ $event->getTranslation('name_event', 'en')}}"  required>
                                    </div>

                                    <div class="col">
                                        <label for="title">{{ trans('Events_trans.EventDate') }}</label>
                                        <input name="event_date" class="form-control" type="text"  id="datepicker-action" data-date-format="yyyy-mm-dd"  value="{{  $event ->event_date }}" required>
                                    </div>

                                </div>
                                <br>
                                <div class="col">
                                    <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('Students_trans.Attachments') }}</label>
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                            <img style="width: 100px" height="100px"
                                                src="{{ URL::asset('attachments/EventsSchool/' . $event->file_name) }}"
                                                alt="">
                                        </div>
                                        <input name="file_name" accept="image/*" type="file" class="file-input"
                                            data-show-caption="false" data-show-upload="false" data-fouc>
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
    
@endsection
