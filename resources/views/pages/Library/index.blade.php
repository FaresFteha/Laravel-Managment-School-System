@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('Library_trans.ListBooks') }}@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('page-header')
<!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Library_trans.ListBooks') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Library_trans.ListBooks') }}</li>
                </ol>
            </div>
        </div>
    </div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            @can('اضافة كتب')
                            <a href="{{ route('Library.create') }}" class="btn btn-success" role="button"
                            aria-pressed="true">{{ trans('Library_trans.InsertNameBooks ') }}</a>
                            @elsecan('Add book')
                            <a href="{{ route('Library.create') }}" class="btn btn-success" role="button"
                            aria-pressed="true">{{ trans('Library_trans.InsertNameBooks ') }}</a>
                            @endcan
                            <br><br>
                                @include('pages.Library.Filters.filtre')
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered p-0" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('Library_trans.NameBooks') }}</th>
                                            <th>{{trans('Students_trans.nametrcher')}}</th>
                                            <th>{{trans('Students_trans.Grade')}}</th>
                                            <th>{{trans('Students_trans.classrooms')}}</th>
                                            <th>{{trans('Students_trans.section')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($books as $book)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->teacher->Name }}</td>
                                                <td>{{ $book->grade->name }}</td>
                                                <td>{{ $book->classroom->name_class }}</td>
                                                <td>{{ $book->section->name_sections }}</td>
                                                <td>
                                                    @can('تحميل كتاب')
                                                    <a href="{{ route('downloadAttachment' , $book->file_name) }}"
                                                        title="تحميل الكتاب" class="btn btn-warning"
                                                        role="button" aria-pressed="true"><i class="fa fa-download"
                                                            aria-hidden="true"></i></a>
                                                    @elsecan('Download a book')
                                                    <a href="{{ route('downloadAttachment' , $book->file_name) }}"
                                                        title="تحميل الكتاب" class="btn btn-warning"
                                                        role="button" aria-pressed="true"><i class="fa fa-download"
                                                            aria-hidden="true"></i></a>
                                                    @endcan
                                                   
                                                    @can('تعديل كتب')
                                                    <a href="{{ route('Library.edit', $book->id) }}"
                                                        class="btn btn-info" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    @elsecan('Edit book')
                                                    <a href="{{ route('Library.edit', $book->id) }}"
                                                        class="btn btn-info" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    @endcan

                                                    @can('حذف كتب')
                                                    <button type="button" class="btn btn-danger "
                                                    data-toggle="modal"
                                                    data-target="#delete_book{{ $book->id }}" title="حذف"><i
                                                        class="fa fa-trash"></i></button>
                                                    @elsecan('Delete book')
                                                    <button type="button" class="btn btn-danger "
                                                    data-toggle="modal"
                                                    data-target="#delete_book{{ $book->id }}" title="حذف"><i
                                                        class="fa fa-trash"></i></button>
                                                    @endcan


                                                </td>
                                            </tr>
                                            @include('pages.Library.destroy')
                                            @empty
                                            <tr>
                                                <td class="alert-danger text-center" colspan="7">{{ trans('students_trans.NotData') }}</td>
                                            </tr>
                                        @endforelse
                                </table>
                                <div >
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="float-right">
                                                    {!! $books->appends(request()->all())->links() !!}
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
