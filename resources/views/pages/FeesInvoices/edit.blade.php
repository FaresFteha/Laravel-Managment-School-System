@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('invoices_trans.EditSchoolFees') }}
@stop
@endsection
    
@section('page-header')
<!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('invoices_trans.EditSchoolFees') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('invoices_trans.EditSchoolFees') }}</li>
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

                    <form action="{{ route('FeeIncoices.update') }}"   method="post" autocomplete="off">
                     
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('invoices_trans.StudentName') }}</label>
                                <input type="text" value="{{$fee_invoices->student->name}}" readonly name="title_ar" disabled class="form-control">
                                <input type="hidden" value="{{$fee_invoices->id}}" name="id" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('invoices_trans.Amount') }}: <span class="text-danger">*</span></label>
                                <input type="number" value="{{$fee_invoices->amount}}"  name="amount" class="form-control" required>
                            </div>

                        </div>
               
                        {{-- <select id="fee_id" name="fee_id"
                                class="custom-select"
                                onclick="console.log($(this).val())">
                                <!--placeholder-->
                                <option
                                    value="{{ $fee_invoices->id }}">
                                    {{ $fee_invoices->fees->title }}
                                </option>
                                @foreach ($fees as $feesitem)
                                    <option
                                        value="{{$feesitem->id}}">
                                        {{ $feesitem->title }}
                                    </option>
                                @endforeach
                            </select>
                            --}}

                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputZip">{{ trans('invoices_trans.TypeFee') }}</label>
                                <select class="custom-select mr-sm-2" name="fee_id">
                                    @foreach($fees as $fee)
                                        <option value="{{$fee->id}}" {{$fee->id == $fee_invoices->fee_id ? 'selected':"" }}>{{$fee->title}}</option>
                                    @endforeach
                                </select>    
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">{{ trans('invoices_trans.Description') }}</label>
                            <textarea class="form-control" value="{{$fee->description}}" name="description" id="exampleFormControlTextarea1" disabled rows="4">{{$fee_invoices->description}}</textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-success nextBtn btn-lg pull-left">{{ trans('invoices_trans.Submit') }}</button>

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