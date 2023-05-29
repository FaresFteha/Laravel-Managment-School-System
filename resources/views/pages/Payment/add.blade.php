@extends('layouts.master')
@section('css')
    @toastr_css
@endsection
@section('title')
    سند صرف
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <h4 class="mb-0"> {{ trans('invoices_trans.voucherofexchange') }}:  <label style="color: red">{{ $student->name }} </label></h4>
        </div>
    </div>
    <!-- breadcrumb -->.
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

                    <form method="post" action="{{ route('Payment.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('invoices_trans.Amount') }} : <span class="text-danger" required>*</span></label>
                                    <input class="form-control" name="Debit" type="number">
                                    <input type="hidden" name="student_id" value="{{ $student->id }}" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ trans('invoices_trans.Studentcredit') }} : </label>
                                    <input class="form-control" name="final_balance"
                                        value="{{ number_format($student->student_account->sum('Debit') - $student->student_account->sum('credit'), 2) }}"
                                        type="text" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ trans('invoices_trans.Description') }}: <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success nextBtn btn-lg pull-left"
                            type="submit">{{ trans('Students_trans.submit') }}</button>
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
