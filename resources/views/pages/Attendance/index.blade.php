@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('attendance_trans.Studentattendanclist') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('attendance_trans.Studentattendanclist') }}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                </li>
                <li class="breadcrumb-item active"> {{ trans('attendance_trans.Studentattendanclist') }} </li>
            </ol>
        </div>

    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ session('status') }}</li>
                        </ul>
                    </div>
                @endif
                <h5 style="font-family: 'Cairo', sans-serif;color: red">{{ trans('attendance_trans.todaysdate') }} :
                    {{ date('Y-m-d') }}</h5>
               
                    <div class="widget-search ml-0 clearfix">
                        <i class="fa fa-search"></i>
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                            placeholder="{{ trans('extra_trans.Search_here') }}">
                    </div>
                    <br>
                <form method="post" action="{{ route('Attendance.store') }}">
                    @csrf
                    <table class="table  table-hover table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th class="alert-success">#</th>
                                <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                                <th class="alert-success">{{ trans('Students_trans.email') }}</th>
                                <th class="alert-success">{{ trans('Students_trans.gender') }}</th>
                                <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                                <th class="alert-success">{{ trans('Students_trans.classrooms') }}</th>
                                <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                                <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->gender->gender }}</td>
                                    <td>{{ $student->grade->name }}</td>
                                    <td>{{ $student->classroom->name_class }}</td>
                                    <td>{{ $student->section->name_sections }}</td>
                                    <td>

                                        @if (isset($student->attendance()->where('attendance_date', date('Y-m-d'))->first()->student_id))
                                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                <input name="attendences[{{ $student->id }}]" disabled
                                                    {{ $student->attendance()->first()->attendance_status == 1 ? 'checked' : '' }}
                                                    class="leading-tight" type="radio" value="presence">
                                                <span
                                                    class="text-success">{{ trans('attendance_trans.Attend') }}</span>
                                            </label>


                                            <label class="ml-4 block text-gray-500 font-semibold">
                                                <input name="attendences[{{ $student->id }}]" disabled
                                                    {{ $student->attendance()->first()->attendance_status == 0 ? 'checked' : '' }}
                                                    class="leading-tight" type="radio" value="absent">
                                                <span
                                                    class="text-danger">{{ trans('attendance_trans.Absence') }}</span>
                                            </label>
                                        @else
                                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                <input name="attendences[{{ $student->id }}]" class="leading-tight"
                                                    type="radio" value="presence">
                                                <span
                                                    class="text-success">{{ trans('attendance_trans.Attend') }}</span>
                                            </label>

                                            <label class="ml-4 block text-gray-500 font-semibold">
                                                <input name="attendences[{{ $student->id }}]" class="leading-tight"
                                                    type="radio" value="absent">
                                                <span
                                                    class="text-danger">{{ trans('attendance_trans.Absence') }}</span>
                                            </label>
                                        @endif

                                        <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                        <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                                        <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                                        <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="alert-danger text-center" colspan="8">{{ trans('students_trans.NotData') }}</td>
                                    </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div >
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="float-right">
                                        {!! $students->appends(request()->all())->links() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </div>
                    @can('اضافة الحضور والغياب')
                    @if ($students_Display->count() > 0)
                    <P>
                        <button class="btn btn-success nextBtn btn-lg pull-left"
                            type="submit">{{ trans('Students_trans.submit') }}</button>
                    </P>
                    @endif
                    @elsecan('Add Attendance')
                    @if ($students_Display->count() > 0)
                    <P>
                        <button class="btn btn-success nextBtn btn-lg pull-left"
                            type="submit">{{ trans('Students_trans.submit') }}</button>
                    </P>
                    @endif
                    @endcan

                </form>
                <br>
            </div>
        </div>
    </div>
    < <!-- row closed -->
    @endsection
    @section('js')
        @toastr_js
        @toastr_render
        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    @endsection
