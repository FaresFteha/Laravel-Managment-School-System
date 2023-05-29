@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('Questions_trans.tested') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<h4>{{ trans('Questions_trans.tested') }}</h4><br>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  class="table  table-hover  table-bordered p-0" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('students_trans.name') }}</th>
                                            <th>{{ trans('Questions_trans.lastques') }}</th>
                                            <th>{{ trans('Questions_trans.Marke') }}</th>
                                            <th>{{ trans('Questions_trans.manipulate') }}</th>
                                            <th>{{ trans('Questions_trans.lastdate') }}</th>
                                            <th>{{ trans('fees_trans.Process') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($degrees as $degree)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $degree->student->name }}</td>
                                                <td>{{ $degree->question_id }}</td>
                                                <td>{{ $degree->score }}</td>
                                                @if ($degree->abuse == 0)
                                                    <td style="color: green">{{ trans('Questions_trans.Notamper') }}</td>
                                                @else
                                                    <td style="color: red">{{ trans('Questions_trans.tamper') }}</td>
                                                @endif
                                                <td>{{ $degree->date }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#repeat_quizze{{ $degree->student_id }}"
                                                        title="إعادة">
                                                        <i class="fa fa-repeat"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="repeat_quizze{{ $degree->student_id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('repeat.quizze',$degree->quizze_id)}}" method="post">
                                                        {{ method_field('post') }}
                                                        {{ csrf_field() }}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">{{ trans('Questions_trans.re-test') }}</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>{{ $degree->student->name }}</h6>
                                                                <input type="hidden" name="student_id"
                                                                    value="{{ $degree->student_id }}">
                                                                <input type="hidden" name="quizze_id"
                                                                    value="{{ $degree->quizze_id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('classrooms_trans.Close') }}</button>
                                                                    <button type="submit"
                                                                        class="btn btn-info">{{ trans('classrooms_trans.submit') }}</button>
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
