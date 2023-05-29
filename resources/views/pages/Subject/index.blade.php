@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('students_trans.ListSubj') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('students_trans.ListSubj') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{ trans('students_trans.ListSubj') }} </li>
                </ol>
            </div>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @can('اضافة المواد')
                <a href="{{ route('Subject.create') }}" class="btn btn-success" role="button"
                aria-pressed="true">{{ trans('students_trans.InsertSubj') }}</a>
                @elsecan('Add Subjects')
                <a href="{{ route('Subject.create') }}" class="btn btn-success" role="button"
                aria-pressed="true">{{ trans('students_trans.InsertSubj') }}</a>
                @endcan

                <br>
                <br>
                @include('pages.Subject.Filters.filtre')
                <div class="table-responsive">
                    <table class="table  table-hover table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('students_trans.namesubj') }}</th>
                                <th> {{ trans('students_trans.Grade') }} </th>
                                <th>{{ trans('students_trans.classrooms') }} </th>
                                <th>{{ trans('students_trans.nametrcher') }} </th>
                                <th>{{ trans('students_trans.Processes') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subjects as $subject)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->grade->name }}</td>
                                    <td>{{ $subject->classroom->name_class }}</td>
                                    <td>{{ $subject->teacher->Name }}</td>
                                    <td>
                                        @can('تعديل المواد')
                                        <a href="{{ route('Subject.edit', $subject->id) }}" class="btn btn-info"
                                            role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        @elsecan('Edit Subjects')
                                        <a href="{{ route('Subject.edit', $subject->id) }}" class="btn btn-info"
                                            role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('حذف المواد')
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete_subject{{ $subject->id }}" title="حذف"><i
                                                class="fa fa-trash"></i></button>
                                        @elsecan('Delete Subjects')
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete_subject{{ $subject->id }}" title="حذف"><i
                                                class="fa fa-trash"></i></button>
                                        @endcan


                                    </td>
                                </tr>

                                <div class="modal fade" id="delete_subject{{ $subject->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('Subject.destroy', 'test') }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                        class="modal-title" id="exampleModalLabel">
                                                        {{ trans('students_trans.deleSubj') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> {{ trans('classrooms_trans.Warning_class') }} </p>
                                                    <input type="hidden" name="id"
                                                        value="{{ $subject->id }}">
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
                                    <td class="alert-danger text-center" colspan="6">
                                        {{ trans('students_trans.NotData') }}</td>
                                </tr>
                            @endforelse
                    </table>
                    <div>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="float-right">
                                        {!! $subjects->appends(request()->all())->links() !!}
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
