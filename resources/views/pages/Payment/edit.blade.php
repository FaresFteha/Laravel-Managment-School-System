@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('invoices_trans.editvoucherofexchange') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('page-header')
    <!-- breadcrumb -->
        <!-- breadcrumb -->
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                   <h4>{{ trans('invoices_trans.editvoucherofexchange') }}  : <label style="color: red">{{$payment_student->student->name}}</label></h4> 
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="#"
                                class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('invoices_trans.editvoucherofexchange') }} </li>
                    </ol>
                </div>
    
            </div>
        </div>
    <!-- breadcrumb -->
    @endsection
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

                            <form action="{{route('Payment.update','test')}}" method="post" autocomplete="off">
                                @method('PUT')
                                @csrf
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> {{ trans('invoices_trans.Amount') }} : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="Debit" value="{{$payment_student->amount}}" type="number" required>
                                        <input  type="hidden" name="student_id" value="{{$payment_student->student->id}}" class="form-control">
                                        <input  type="hidden" name="id"  value="{{$payment_student->id}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ trans('invoices_trans.Description') }}  : <span class="text-danger">*</span></label>
                                        <textarea class="form-control"  value="{{$payment_student->description}}" name="description" id="exampleFormControlTextarea1" rows="3" required>{{$payment_student->description}}</textarea>
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success nextBtn btn-lg pull-left" type="submit">{{trans('Students_trans.submit')}}</button>
                        </form>

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