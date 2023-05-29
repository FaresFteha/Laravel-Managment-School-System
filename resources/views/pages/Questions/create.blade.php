@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('Questions_trans.InsertNewQuestions') }}@stop
@endsection
@section('page-header')
@section('page-header')
<!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Questions_trans.InsertNewQuestions') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active"> {{ trans('Questions_trans.InsertNewQuestions') }}</li>
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
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('Questions.store') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title"> {{ trans('Questions_trans.NmaeQuestions') }}</label>
                                        <input type="text" name="title" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                               @error('title')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('Questions_trans.Answers') }}: <small style="color: red;">{{ trans('Questions_trans.betweenquestions') }}</small> </label>
                                        <textarea name="answers" class="form-control" id="exampleFormControlTextarea1"
                                                  rows="4"></textarea>
                                                  @error('answers')
                                                  <div class="alert alert-danger">{{ $message }}</div>
                                                  @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('Questions_trans.RightAnswer') }}</label>
                                        <input type="text" name="right_answer" id="input-name"
                                               class="form-control form-control-alternative" autofocus>
                                               @error('right_answer')
                                               <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id"> {{ trans('Questions_trans.NameSubject') }}: <span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="quizze_id">
                                                <option selected disabled> {{ trans('Questions_trans.ChooesNameSubject') }}...</option>
                                                @foreach($quizzes as $quizze)
                                                    <option value="{{ $quizze->id }}">{{ $quizze->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('quizze_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id">{{ trans('Questions_trans.Marke') }} : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score">
                                                <option selected disabled> {{ trans('Questions_trans.ChooesMarke') }}...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                            </select>
                                            @error('score')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-success nextBtn btn-lg pull-left" type="submit">{{ trans('Questions_trans.submit') }}</button>
                            </form>
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