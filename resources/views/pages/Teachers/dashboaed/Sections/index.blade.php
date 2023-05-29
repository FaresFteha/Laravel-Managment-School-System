@extends('layouts.master')
@section('css')
@toastr_css

@section('title')
{{ trans('main_siadebar_trans.sections_table') }}
@stop
@endsection
@section('page-header')
<h4>
{{ trans('main_siadebar_trans.sections_table') }}
</h4>
<br>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="widget-search ml-0 clearfix">
                            <i class="fa fa-search"></i>
                            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                                placeholder="{{ trans('extra_trans.Search_here') }}">
                        </div>
                        <br>
                        <table class="table  table-hover table-bordered p-0" style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('students_trans.Grade') }}</th>
                                <th>{{ trans('students_trans.classrooms') }}</th>
                                <th>{{ trans('students_trans.section') }}</th>
                                <th>{{ trans('Students_trans.Processes') }}</th>
                             </tr>
                            </thead>
                            <tbody id="myTable">
                            @forelse($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $section->Grades->name }}</td>
                                    <td>{{ $section->Classrooms->name_class }}</td>
                                    <td>{{ $section->name_sections }}</td>

                                    <td>
                                        <a href="{{ route('StudentsListTeacher.index' , $section->id) }}" 
                                        class="btn btn-warning" role="button" aria-pressed="true"><i class="fa fa-eye"></i>
                                       </a>

                                       <a target="_blank" href="{{ route('AttendanceStudents.index' , $section->id) }}" 
                                        class="btn btn-success" role="button" aria-pressed="true"><i  class="fa fa-calendar" aria-hidden="true"></i>
                                       </a>
                                    </td>
                                 </tr>
                            @empty
                            <tr>
                                <td class="alert-danger text-center" colspan="4">{{ trans('students_trans.NotData') }}</td>
                                </tr>
                            @endforelse
                        </table>
                        <div >
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <div class="float-right">
                                            {!! $sections->appends(request()->all())->links() !!}
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