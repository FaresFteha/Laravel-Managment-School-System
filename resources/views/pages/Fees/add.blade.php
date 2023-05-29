@extends('layouts.master')
@section('css')
    @toastr_css
@endsection

@section('title')
    {{ trans('fees_trans.Add_new_fees') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
@endsection

@section('PageTitle')
    {{ trans('fees_trans.Add_new_fees') }}

    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ route('Fees.store') }}" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees_trans.Nmae_ar') }}</label>
                                <input type="text" value="{{ old('title_ar') }}" name="title_ar" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees_trans.Nmae_en') }}</label>
                                <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees_trans.Amount') }} </label>
                                <input type="number" value="{{ old('amount') }}" name="amount" class="form-control">
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState">{{ trans('fees_trans.Grade_Stage') }}: <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="Grade_id" name="Grade_id" required>
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fees_trans.Classroom') }}: <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="Classroom_id" name="Classroom_id" required>

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fees_trans.Study_Year') }}: <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="year" required>
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputState">{{ trans('fees_trans.Type_Fees') }}: <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="Fee_type" name="Fee_type" required>
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}</option>
                                    <option value="1">{{ trans('fees_trans.Study_Fees') }}</option>
                                    <option value="2">{{ trans('fees_trans.Bus_Fees') }}</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{ trans('fees_trans.Notes') }}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-success nextBtn btn-lg pull-left">{{ trans('fees_trans.Submite') }}</button>

                    </form>

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
