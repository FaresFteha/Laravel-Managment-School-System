@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   {{ trans('Questions_trans.ListQuestions') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
<h4> {{ trans('Questions_trans.ListQuestions') }}: <span class="text-danger">{{$quizz->name}}</span></h4>
<br>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                                <a href="{{ route('question.show',$quizz->id) }}" class="btn btn-success" role="button" aria-pressed="true">{{ trans('Questions_trans.InsertNewQuestions') }}</a><br><br>
                                <div class="table-responsive">
                                    <table   class="table table-hover  table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
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
                                        @foreach($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$question->title}}</td>
                                                <td>{{$question->answers}}</td>
                                                <td>{{$question->right_answer}}</td>
                                                <td>{{$question->score}}</td>
                                                <td>{{$question->quizze->name}}</td>
                                                <td>
                                                    <a href="{{ route('question.edit',$question->id) }}"
                                                       class="btn btn-info" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger"
                                                            data-toggle="modal"
                                                            data-target="#delete_exam{{ $question->id }}" title="حذف"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                          @include('pages.Teachers.dashboaed.Questions.destroy') 
                                        @endforeach
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