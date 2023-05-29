@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Questions_trans.ListQuestions') }}
@stop
@endsection
@section('page-header')
@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Questions_trans.ListQuestions') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{ trans('Questions_trans.ListQuestions') }} </li>
                </ol>
            </div>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            @can( 'اضافة الاسئلة')
                            <a href="{{ route('Questions.create') }}" class="btn btn-success" role="button"
                            aria-pressed="true"> {{ trans('Questions_trans.InsertNewQuestions') }} </a>
                            @elsecan('Add Questions')
                            <a href="{{ route('Questions.create') }}" class="btn btn-success" role="button"
                            aria-pressed="true"> {{ trans('Questions_trans.InsertNewQuestions') }} </a>
                            @endcan
                            <br><br>
                                @include('pages.Questions.Filters.filtre')
                            <div class="table-responsive">
                                <table   class="table  table-hover table-sm table-bordered p-0" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"> {{ trans('Questions_trans.NmaeQuestions') }} </th>
                                            <th scope="col"> {{ trans('Questions_trans.Answers') }} </th>
                                            <th scope="col"> {{ trans('Questions_trans.RightAnswer') }} </th>
                                            <th scope="col"> {{ trans('Questions_trans.Marke') }} </th>
                                            <th scope="col"> {{ trans('Questions_trans.NameSubject') }} </th>
                                            <th scope="col"> {{ trans('Questions_trans.Processes') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $question->title }}</td>
                                                <td>{{ $question->answers }}</td>
                                                <td>{{ $question->right_answer }}</td>
                                                <td>{{ $question->score }}</td>
                                                <td>{{ $question->quizze->name }}</td>
                                                <td>

                                                    @can('تعديل الاسئلة')
                                                    <a href="{{ route('Questions.edit', $question->id) }}"
                                                        class="btn btn-info" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    @elsecan('Edit Questions')
                                                    <a href="{{ route('Questions.edit', $question->id) }}"
                                                        class="btn btn-info" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    @endcan

                                                    @can('حذف الاسئلة')
                                                    <button type="button" class="btn btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#delete_exam{{ $question->id }}"
                                                        title="حذف"><i class="fa fa-trash"></i></button>
                                                    @elsecan('Delete Questions')
                                                    <button type="button" class="btn btn-danger"
                                                        data-toggle="modal"
                                                        data-target="#delete_exam{{ $question->id }}"
                                                        title="حذف"><i class="fa fa-trash"></i></button>
                                                    @endcan


                                                </td>
                                            </tr>

                                            @include('pages.Questions.destroy')
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
                                                    {!! $questions->appends(request()->all())->links() !!}
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
