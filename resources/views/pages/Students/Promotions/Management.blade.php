@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_siadebar_trans.PromotionsStudents') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_siadebar_trans.PromotionsStudents') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                        {{ trans('students_trans.All_Back') }}
                    </button>
                    <br><br>
                    @include('pages.Students.Promotions.Filters.filtre')
                    <div class="table-responsive">
                        <table  class="table  table-hover table-bordered p-0"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="alert-info">#</th>
                                    <th class="alert-info">{{ trans('Students_trans.name') }}</th>
                                    <th class="alert-danger">{{ trans('Students_trans.Old_School_Stage') }}</th>
                                    <th class="alert-danger">{{ trans('Students_trans.academic_year') }}</th>
                                    <th class="alert-danger">{{ trans('Students_trans.classrooms_current') }}</th>
                                    <th class="alert-danger">{{ trans('Students_trans.section_current') }}</th>
                                    <th class="alert-success">{{ trans('Students_trans.current_School_Stage') }}</th>
                                    <th class="alert-success">{{ trans('Students_trans.academic_year_current') }}</th>
                                    <th class="alert-success">{{ trans('Students_trans.current_class') }} </th>
                                    <th class="alert-success">
                                        {{ trans('Students_trans.The_current_academic_section') }}</th>
                                    <th>{{ trans('Students_trans.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($promotions as $promotion)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $promotion->student->name }}</td>
                                        <td>{{ $promotion->F_grade->name }}</td>
                                        <td>{{ $promotion->academic_year }}</td>
                                        <td>{{ $promotion->F_classroom->name_class }}</td>
                                        <td>{{ $promotion->F_section->name_sections }}</td>

                                        <td>{{ $promotion->T_grade->name }}</td>
                                        <td>{{ $promotion->academic_year_New }}</td>
                                        <td>{{ $promotion->T_classroom->name_class }}</td>
                                        <td>{{ $promotion->T_section->name_sections }}</td>
                                        <td>

                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#Delete_one{{ $promotion->id }}">{{ trans('students_trans.return_student') }}</button>
                                                <br>
                                                <br>
                                            <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                                data-target="#">{{ trans('students_trans.delete_student') }}</button>
                                        </td>
                                    </tr>
                                    @include('pages.Students.Promotions.Delete_all')
                                    @include('pages.Students.Promotions.Delete_one')
                                    @empty
                                    <tr>
                                        <td class="alert-danger text-center" colspan="11">{{ trans('students_trans.NotData') }}</td>
                                    </tr>
                                @endforelse
                        </table>
                        <div >
                            <tfoot>
                                <tr>
                                    <td colspan="11">
                                        <div class="float-right">
                                            {!! $promotions->appends(request()->all())->links() !!}
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
