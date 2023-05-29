@extends('layouts.master')
@section('css')
    @toastr_css
@endsection

@section('title')
    {{ trans('main_siadebar_trans.List_Teachers') }}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('main_siadebar_trans.List_Teachers') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('main_siadebar_trans.List_Teachers') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_siadebar_trans.List_Teachers') }}
@endsection

<!-- breadcrumb -->
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card card-statistics h-100">
                            <div class="card-body">
                                @can('اضافة المعلمين')
                                <a href="{{ route('createTeachers') }}" class="button x-small" role="button"
                                aria-pressed="true">{{ trans('Teacher_trans.Add_Teacher') }}</a>
                                @elsecan('Add Teachers')
                                <a href="{{ route('createTeachers') }}" class="button x-small" role="button"
                                aria-pressed="true">{{ trans('Teacher_trans.Add_Teacher') }}</a>
                                @endcan
                                <br>
                                <br>
                                @include('pages.Teachers.Filters.filtre')
                                <div class="table-responsive">
                                    <table  class="table table-striped table-bordered p-0"
                                        style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('Teacher_trans.Name_Teacher') }}</th>
                                                <th>{{ trans('Teacher_trans.Gender') }}</th>
                                                <th>{{ trans('Teacher_trans.Joining_Date') }}</th>
                                                <th>{{ trans('Teacher_trans.specialization') }}</th>
                                                <th>{{ trans('Teacher_trans.Operasion') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($Teachers as $Teacher)
                                                <tr>

                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $Teacher->Name }}</td>
                                                    <td>{{ $Teacher->genders->gender }}</td>
                                                    <td>{{ $Teacher->Joining_Date }}</td>
                                                    <td>{{ $Teacher->specializations->specialization }}</td>
                                                    <td>
                                                        @can('تعديل المعلمين')
                                                        <a href="{{ route('Teachers.Edit', $Teacher->id) }}"
                                                            class="btn btn-info" role="button" aria-pressed="true"><i
                                                                class="fa fa-edit"></i></a>
                                                        @elsecan('Edit Teachers')
                                                        <a href="{{ route('Teachers.Edit', $Teacher->id) }}"
                                                            class="btn btn-info" role="button" aria-pressed="true"><i
                                                                class="fa fa-edit"></i></a>
                                                        @endcan

                                                        @can('حذف المعلمين')
                                                        <button type="button" class="btn btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#delete_Teacher{{ $Teacher->id }}"
                                                        title="{{ trans('Grades_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                        @elsecan('Delete Teachers')
                                                        <button type="button" class="btn btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#delete_Teacher{{ $Teacher->id }}"
                                                        title="{{ trans('Grades_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                        @endcan

                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="delete_Teacher{{ $Teacher->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="{{ route('Teachers.destroy') }}" method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                        class="modal-title" id="exampleModalLabel">
                                                                        {{ trans('Teacher_trans.Delete_Teacher') }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p> {{ trans('Teacher_trans.Warning_Teacher') }}</p>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $Teacher->id }}">
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('Teacher_trans.Close') }}</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">{{ trans('Teacher_trans.Delete') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                    </table>
                                    <div >
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="float-right">
                                                        {!! $Teachers->appends(request()->all())->links() !!}
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
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
