@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('news_trans.schoolnews') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('news_trans.schoolnews') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                </li>
                <li class="breadcrumb-item active"> {{ trans('news_trans.schoolnews') }}</li>
            </ol>
        </div>

    </div>
</div>

@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{ route('News.create') }}" class="btn btn-success" role="button"
                    aria-pressed="true">{{ trans('news_trans.InsertNews') }}</a>
                <br><br>
                <div class="table-responsive">
                    <table class="table  table-hover table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('news_trans.Title') }}</th>
                                {{-- <th>{{ trans('news_trans.Content') }}</th> --}}
                                <th>{{ trans('grades_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($News as $new)
                                <tr>
                                    <td> <img class="img-fluid avatar-small" src="{{ asset('attachments/NewsSchool/' . $new->file_name) }}"alt="media"> </td>
                                    <td>{{  $new->Title  }}  </td>
                                    {{-- <td>{!! $new->content !!}</td> --}}
                                    <td>
                                        <a href="{{ route('News.edit', $new->id) }}" class="btn btn-info"
                                            role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete_exam{{ $new->id }}" title="حذف"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete_exam{{ $new->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('News.destroy', 'test') }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">{{ trans('news_trans.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> {{ trans('news_trans.deleteNews') }}
                                                        {{ $new->Title }}</p>
                                                    <input type="hidden" name="id" value="{{ $new->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('classrooms_trans.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('grades_trans.Delete') }}</button>
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
