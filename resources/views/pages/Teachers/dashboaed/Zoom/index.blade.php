@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('Zoom_trans.OnlineClasses') }}
@stop
@endsection
@section('page-header')
@section('page-header')
<!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Zoom_trans.OnlineClasses') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{ trans('Zoom_trans.OnlineClasses') }}                       </li>
                </ol>
            </div>

        </div>
    </div>
<!-- breadcrumb -->
@endsection
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{route('zoom.create')}}" class="btn btn-success" role="button" aria-pressed="true">{{ trans('Zoom_trans.Addanewonlineshare') }}</a>
                            <a class="btn btn-warning" href="{{ route('Indirect.create')}}">{{ trans('Zoom_trans.Addanewoflineshare') }}</a>
                            <br><br>
                            <div class="table-responsive">
                                <table  class="table  table-hover table-bordered p-0" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('students_trans.Grade') }}</th>
                                            <th>{{ trans('students_trans.classrooms') }}</th>
                                            <th>{{ trans('students_trans.section') }}</th>
                                            <th>{{ trans('Zoom_trans.Created_by') }}</th>
                                            <th>{{ trans('Zoom_trans.Classtitle') }} </th>
                                            <th>{{ trans('Zoom_trans.Classdateandtime') }}</th>
                                            <th>{{ trans('Zoom_trans.Classdurationinminutes') }}</th>
                                            <th>{{ trans('Zoom_trans.linkJoin') }}</th>
                                            <th>{{ trans('Zoom_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($online_classes as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $online_classe->grade->name }}</td>
                                                <td>{{ $online_classe->classroom->name_class }}</td>
                                                <td>{{ $online_classe->section->name_sections }}</td>
                                                <td>{{ $online_classe->Created_by }}</td>
                                                <td>{{ $online_classe->topic }}</td>
                                                <td>{{ $online_classe->start_at }}</td>
                                                <td>{{ $online_classe->duration }}</td>
                                                <td class="text-danger"><a href="{{ $online_classe->join_url }}"
                                                        target="_blank">{{ trans('Zoom_trans.Join_now') }}</a></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_receipt{{ $online_classe->meeting_id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.Teachers.dashboaed.Zoom.delete')
                                            @empty
                                            <tr>
                                                <td class="alert-danger text-center" colspan="10">{{ trans('students_trans.NotData') }}</td>
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
