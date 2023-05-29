@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_siadebar_trans.Quizzesas') }}@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<h4>
{{ trans('main_siadebar_trans.Quizzesas') }}</h4>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{ route('quizzes.create') }}" class="btn btn-success" role="button"
                        aria-pressed="true">{{ trans('students_trans.InsertQuiz') }}</a><br><br>
                    <div class="table-responsive">
                        <div class="widget-search ml-0 clearfix">
                            <i class="fa fa-search"></i>
                            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                                placeholder="{{ trans('extra_trans.Search_here') }}">
                        </div>
                        <br>
                        <table class="table  table-hover  table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('students_trans.Namequs') }}</th>
                                    <th>{{ trans('students_trans.nametrcher') }}</th>
                                    <th>{{ trans('students_trans.Grade') }}</th>
                                    <th>{{ trans('students_trans.classrooms') }}</th>
                                    <th>{{ trans('students_trans.section') }}</th>
                                    <th>{{ trans('students_trans.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @forelse($Quizze as $quizze)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $quizze->name }}</td>
                                        <td>{{ $quizze->teacher->Name }}</td>
                                        <td>{{ $quizze->grade->name }}</td>
                                        <td>{{ $quizze->classroom->name_class }}</td>
                                        <td>{{ $quizze->section->name_sections }}</td>
                                        <td>
                                            <a href="{{ route('quizzes.edit', $quizze->id) }}" class="btn btn-info"
                                                role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete_exam{{ $quizze->id }}" title="حذف"><i
                                                    class="fa fa-trash"></i></button>

                                            <a href="{{ route('quizzes.show', $quizze->id) }}" class="btn btn-warning "
                                                title="الاسئلة" role="button" aria-pressed="true"><i class="fa fa-eye"
                                                    aria-hidden="true"></i>
                                            </a>

                                            <a href="{{ route('Student_Quizze', $quizze->id) }}" class="btn btn-dark "
                                                title="الطلاب المقدمين للاختبار" role="button" aria-pressed="true"><i
                                                    class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_exam{{ $quizze->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('quizzes.destroy', $quizze->id) }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title" id="exampleModalLabel">
                                                            {{ trans('students_trans.DeleteQuizzes') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <strong> {{ trans('classrooms_trans.Warning_class') }}<p style="color: red"> {{ $quizze->name }}</p></strong>
                                                        <input type="hidden" name="id"
                                                            value="{{ $quizze->id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('classrooms_trans.Close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('classrooms_trans.submit') }}</button>
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
                            </tbody>
                        </table>
                        <div>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="float-right">
                                            {!! $Quizze->appends(request()->all())->links() !!}
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
</div>
</div>
<!-- row closed -->
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
