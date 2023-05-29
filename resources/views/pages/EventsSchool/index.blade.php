@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Events_trans.EventsSchool') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('Events_trans.EventsSchool') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                </li>
                <li class="breadcrumb-item active"> {{ trans('Events_trans.EventsSchool') }}</li>
            </ol>
        </div>

    </div>
</div>

@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{ route('Events.create') }}" class="btn btn-success" role="button"
                    aria-pressed="true">{{ trans('Events_trans.InsertEvent') }}</a>
                <br><br>
                <div class="table-responsive">
                    <table class="table  table-hover table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Events_trans.NameEvent') }}</th>
                                <th>{{ trans('Events_trans.EventDate') }}</th>
                                <th>{{ trans('grades_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Events as $event)
                                <tr>
                                    <td> <img class="img-fluid avatar-small"
                                            src="{{ asset('attachments/EventsSchool/' . $event->file_name) }}"
                                            alt="media"> </td>
                                    <td>{{ $event->name_event }}</td>
                                    <td>{{ $event->event_date }}</td>

                                    <td>
                                        <a href="{{ route('Events.edit', $event->id) }}" class="btn btn-info"
                                            role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete_exam{{ $event->id }}" title="حذف"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete_exam{{ $event->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('Events.destroy', 'test') }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">{{ trans('Events_trans.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> {{ trans('Events_trans.deleteevent') }}
                                                        {{ $event->name_event }}</p>
                                                    <input type="hidden" name="id" value="{{ $event->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('classrooms_trans.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('grades_trans.Delete') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td class="alert-danger text-center" colspan="7">
                                        {{ trans('students_trans.NotData') }}</td>
                                </tr>
                            @endforelse
                    </table>
                </div>
            </div>
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
