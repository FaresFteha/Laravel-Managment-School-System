@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('students_trans.ListQuizzes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('students_trans.ListQuizzes') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{ trans('students_trans.ListQuizzes') }} </li>
                </ol>
            </div>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @can('اضافة الاختبارات')
                    <a href="{{ route('Quizzes.create') }}" class="btn btn-success" role="button"
                    aria-pressed="true">{{ trans('students_trans.InsertQuiz') }}</a>
                    @elsecan('Add Quizzes')
                    <a href="{{ route('Quizzes.create') }}" class="btn btn-success" role="button"
                    aria-pressed="true">{{ trans('students_trans.InsertQuiz') }}</a>
                    @endcan
                    <br><br>
                    @include('pages.Quizzes.Filters.filtre')
                    <div class="table-responsive">
                        <table class="table  table-hover table-bordered p-0" style="text-align: center">
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
                            <tbody>
                                @forelse($quizzes as $quizze)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $quizze->name }}</td>
                                        <td>{{ $quizze->teacher->Name }}</td>
                                        <td>{{ $quizze->grade->name }}</td>
                                        <td>{{ $quizze->classroom->name_class }}</td>
                                        <td>{{ $quizze->section->name_sections }}</td>
                                        <td>
                                            @can( 'تعديل الاختبارات')
                                            <a href="{{ route('Quizzes.edit', $quizze->id) }}"
                                                class="btn btn-info" role="button" aria-pressed="true"><i
                                                    class="fa fa-edit"></i></a>
                                            @elsecan( 'تعديل الاختبارات')
                                            <a href="{{ route('Quizzes.edit', $quizze->id) }}"
                                                class="btn btn-info" role="button" aria-pressed="true"><i
                                                    class="fa fa-edit"></i></a>
                                            @endcan

                                            @can('حذف الاختبارات')
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete_exam{{ $quizze->id }}" title="حذف"><i
                                                    class="fa fa-trash"></i></button>
                                            @elsecan('Delete Quizzes')
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete_exam{{ $quizze->id }}" title="حذف"><i
                                                    class="fa fa-trash"></i></button>
                                            @endcan


                                        </td>
                                    </tr>

                                    <div class="modal fade" id="delete_exam{{ $quizze->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('Quizzes.destroy', 'test') }}" method="post">
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
                                                        <p> {{ trans('classrooms_trans.Warning_class') }}
                                                            <strong style="color: red">{{ $quizze->name }}</strong></p>
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
                        </table>
                        <div >
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="float-right">
                                            {!! $quizzes->appends(request()->all())->links() !!}
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
@endsection
