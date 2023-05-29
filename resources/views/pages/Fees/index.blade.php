@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
    {{ trans('main_siadebar_trans.Study_Fees') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('main_siadebar_trans.Study_Fees') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('main_siadebar_trans.Study_Fees') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_siadebar_trans.Study_Fees') }}
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                @can('اضافة رسوم دراسية')
                                <a href="{{ route('Fees.Create') }}" class="btn btn-success" role="button"
                                   aria-pressed="true">{{ trans('fees_trans.Add_new_fees') }}</a>
                                @elsecan('Add Study Fees')
                                <a href="{{ route('Fees.Create') }}" class="btn btn-success" role="button"
                                aria-pressed="true">{{ trans('fees_trans.Add_new_fees') }}</a>
                                @endcan
                                <br><br>
                                   @include('pages.Fees.Filters.filtre')
                                <div class="table-responsive">
                                    <table class="table  table-hover table-bordered p-0""
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('fees_trans.Name') }}</th>
                                            <th>{{ trans('fees_trans.Amount') }}</th>
                                            <th>{{ trans('fees_trans.Grade_Stage') }}</th>
                                            <th>{{ trans('fees_trans.Classroom') }}</th>
                                            <th>{{ trans('fees_trans.Study_Year') }}</th>
                                            <th>{{ trans('fees_trans.Notes') }}</th>
                                            <th>{{ trans('fees_trans.Process') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         @forelse($fees as $fee) 
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$fee->title }}</td>
                                            <td>{{ number_format($fee->amount,2)}}</td>
                                            <td>{{ $fee->grade->name }}</td>
                                            <td>{{ $fee->Classrooms->name_class }}</td>
                                            <td>{{ $fee->year }}</td>
                                            <td>{{ $fee->description }}</td>
                                                <td>
                                                    @can('تعديل رسوم دراسية')
                                                    <a href="{{route('Fees.edit',$fee->id) }}" class="btn btn-info" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    @elsecan('Edit Study Fees')
                                                    <a href="{{route('Fees.edit',$fee->id) }}" class="btn btn-info" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                
                                                    @can('حذف رسوم دراسية')
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                    @elsecan('Delete Study Fees')
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                    @endcan
                                                   
                                                    {{-- <a  class="btn btn-warning" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a> --}}

                                                </td>
                                            </tr>
                                        @include('pages.Fees.Delete')
                                        @empty
                                        <tr>
                                            <td class="alert-danger text-center" colspan="8">{{ trans('students_trans.NotData') }}</td>
                                        </tr>
                                        @endforelse 
                                    </table>
                                    <div >
                                        <tfoot>
                                            <tr>
                                                <td colspan="8">
                                                    <div class="float-right">
                                                        {!! $fees->appends(request()->all())->links() !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
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