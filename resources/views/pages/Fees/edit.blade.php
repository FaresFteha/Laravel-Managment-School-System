@extends('layouts.master')

@section('css')
    @toastr_css
@endsection

@section('title')
    تعديل الرسوم الدراسية
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('fees_trans.Edit_new_fees') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('main_siadebar_trans.Study_Fees') }}</li>
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

                    <form action="{{ route('Fees.update') }}" method="post" autocomplete="off">

                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees_trans.Nmae_ar') }}</label>
                                <input type="text" value="{{ $fee->getTranslation('title', 'ar') }}" name="title_ar"
                                    class="form-control">
                                <input type="hidden" value="{{ $fee->id }}" name="id" class="form-control">
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees_trans.Nmae_en') }}</label>
                                <input type="text" value="{{ $fee->getTranslation('title', 'en') }}" name="title_en"
                                    class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees_trans.Amount') }}</label>
                                <input type="number" value="{{ $fee->amount }}" name="amount" class="form-control" >
                            </div>

                        </div>


                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputState">{{ trans('fees_trans.Grade_Stage') }}: <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="Grade_id" name="Grade_id" required>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}"
                                            {{ $Grade->id == $fee->Grade_id ? 'selected' : '' }}>{{ $Grade->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fees_trans.Classroom') }}: <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" id="Classroom_id" name="Classroom_id" required>
                                    <option value="{{ $fee->Classroom_id }}">{{ $fee->Classrooms->name_class }}</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="inputZip">{{ trans('fees_trans.Study_Year') }}: <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="year" required>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}" {{ $year == $fee->year ? 'selected' : ' ' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{ trans('fees_trans.Notes') }}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                rows="4">{{ $fee->description }}</textarea>
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
