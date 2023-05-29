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
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <h5 class="mb-0" style="color: red">{{ trans('main_siadebar_trans.Zoom') }}
                            </h5>
                            <br>
                            <div class="table-responsive">
                                <table  class="table  table-hover table-bordered p-0" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('Zoom_trans.Classtitle') }} </th>
                                            <th>{{ trans('Zoom_trans.Classdateandtime') }}</th>
                                            <th>{{ trans('Zoom_trans.Classdurationinminutes') }}</th>
                                            <th>{{ trans('Zoom_trans.linkJoin') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($online_classes as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $online_classe->topic }}</td>
                                                <td>{{ $online_classe->start_at }}</td>
                                                <td>{{ $online_classe->duration }}</td>
                                                <td class="text-danger"><a href="{{ $online_classe->join_url }}"
                                                        target="_blank">{{ trans('Zoom_trans.Join_now') }}</a></td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="alert-danger text-center" colspan="5">{{ trans('students_trans.NotData') }}</td>
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
