@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Sections_trans.title_page') }}: {{ trans('main_siadebar_trans.students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<!-- breadcrumb -->
<h4> {{ trans('Sections_trans.title_page') }}: {{ trans('main_siadebar_trans.students') }}</h4>
<br>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            @can('اضافة العلامات')
            <div class="card-body">
                <a href="{{ route('StudentsAvarege.create') }}" class="btn btn-success" role="button"
                aria-pressed="true">{{ trans('students_trans.Add_Marks') }}</a>
            </div>
            @elsecan('Add marks')
            <div class="card-body">
                <a href="{{ route('StudentsAvarege.create') }}" class="btn btn-success" role="button"
                aria-pressed="true">{{ trans('students_trans.Add_Marks') }}</a>
            </div>
            @endcan


            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-statistics h-100">
                <div class="card-body">
        
                    <div class="accordion gray plus-icon round">
                        @foreach ($Grades as $Grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $Grade->name }}</a>
                                <div class="acd-des">
                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('Sections_trans.Name_Section') }}
                                                                    </th>
                                                                    <th>{{ trans('Sections_trans.Name_Class') }}</th>
                                                                    <th>{{ trans('Sections_trans.Status') }}</th>
                                                                    <th>{{ trans('Sections_trans.Processes') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               
                                                                @foreach ($Grade->Sections as $list_Sections)
                                                                    <tr>
                                                                        <td>{{ $loop->index + 1 }}</td>
                                                                        <td>{{ $list_Sections->name_sections }}</td>
                                                                        <td>{{ $list_Sections->Classrooms->name_class }}
                                                                        </td>
                                                                        <td>
                                                                            <label
                                                                                class="badge badge-{{ $list_Sections->status == 1 ? 'success' : 'danger' }}">{{ $list_Sections->status == 1 ?   trans('attendance_trans.Active')  :  trans('attendance_trans.Inactive') }}</label>
                                                                        </td>

                                                                        <td>
                                                                            <a href="{{ route('StudentsAvarege.show' , $list_Sections->id) }}"
                                                                                class="btn btn-warning"
                                                                                role="button" aria-pressed="true">{{ trans('attendance_trans.ListStudent') }}</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
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
