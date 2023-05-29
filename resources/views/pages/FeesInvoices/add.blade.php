@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   {{ trans('invoices_trans.InsertNewFee') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('invoices_trans.InsertNewFee') }}:  <label style="color: red">{{ $student->name }} </label></h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('invoices_trans.InsertNewFee') }}</li>
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
                 <form class="row mb-30" action="{{ route('FeeIncoices.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Fees">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('students_trans.name') }}</label>
                                            <select class="fancyselect" name="student_id" required>
                                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('fees_trans.Type_Fees') }}</label>
                                            <div class="box">
                                                <select class="fancyselect" name="fee_id" required>
                                                    <option value="">-- {{ trans('parent_trans.Choose') }} --</option>
                                                 @foreach ($fees as $feeitem)
                                                 <option value="{{ $feeitem->id }}">{{ $feeitem->title }}</option>
                                                 @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('fees_trans.Amount') }}</label>
                                            <div class="box">
                                                <select class="fancyselect" name="amount" required>
                                                    <option value="">-- {{ trans('parent_trans.Choose') }} --
                                                    </option>
                                                    @foreach ($fees as $fee)
                                                        <option value="{{ $fee->amount }}">{{ $fee->amount }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="description"
                                                class="mr-sm-2">{{ trans('fees_trans.Notes') }}</label>
                                            <div class="box">
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('fees_trans.Process') }}:</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete type="button"
                                                value="{{ trans('classrooms_trans.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button"
                                        value="{{ trans('classrooms_trans.add_row') }}" />
                                </div>
                            </div>

                            <br>

                            {{-- classid and gradeid --}}
                            <input type="hidden" name="Grade_id" value="{{ $student->Grade_id }}">
                            <input type="hidden" name="Classroom_id" value="{{ $student->Classroom_id }}">
                            {{-- classid and gradeid --}}
                            <button type="submit" class="btn btn-success nextBtn btn-lg pull-left">{{ trans('students_trans.submit') }}</button>
                        </div>
                    </div>
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
