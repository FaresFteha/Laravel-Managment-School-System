@extends('layouts.master')
@section('css')
    @toastr_css
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
        .logo-small {
            height: 60px;
        }
    </style>
@endsection

@section('content')
    <div class="card mb-30">
        <div class="card-body container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-20"><img class="logo-small mt-0"  src="{{ asset('assets/logo-new-gen/logo-new-gen.png') }}" 
                            alt="logo"></div>
                    <ul class="addresss-info invoice-addresss list-unstyled">
                        <li>{{ trans('Invoice_Accoints_trans.Country') }}<br>
                            {{ trans('Invoice_Accoints_trans.City') }}</li>
                        <li><strong>{{ trans('Invoice_Accoints_trans.Email') }}: </strong>easySchool@gmail.com</li>
                        <li><strong>{{ trans('Invoice_Accoints_trans.Phone') }}: </strong> <a href="tel:7042791249"> +(704)
                                279-1249 </a></li>
                        <li><strong>{{ trans('Invoice_Accoints_trans.Fax') }}: </strong>+(704) 213-7895 </li>
                    </ul>
                </div>
                <div class="col-sm-6 text-left text-sm-right mb-5">
                    <h4>{{ trans('Invoice_Accoints_trans.Invoice_Information') }}</h4>
                    <div>
                        <h4><small>{{ trans('Invoice_Accoints_trans.Invoice_to') }}:</small>
                            {{ $Receipt->student->name }}</h4>  
                        
                       
                    </div>
                    <ul class="addresss-info invoice-addresss list-unstyled">
                        <li><strong>{{ trans('grades_trans.Name') }}:</strong>{{ $Receipt->student->grade->name }}</li>
                        <li><strong>{{ trans('sections_trans.Name_Class') }}:</strong>{{$Receipt->student->classroom->name_class }}
                        </li> 
                        <li><strong></strong></li>

                        <li><span><strong>{{ trans('Invoice_Accoints_trans.Email') }}: </strong>
                                {{ $Receipt->student->email }}</span></li>
                        <li><span><strong>{{ trans('Invoice_Accoints_trans.academic_year') }}: </strong> <a>
                                    {{ $Receipt->student->academic_year }} </a></span></li>
                    </ul>
                    <span>{{ trans('Invoice_Accoints_trans.Invoice_Date') }}: {{ date('Y-m-d') }}</span>
                    <br>
                    {{-- <span>Due Date: February 24, 2018</span> --}}
                </div>
            </div>
            
            <div class="text-left clearfix mb-3 mt-2 border">
                <h4>{{ trans('invoices_trans.voucherofexchange') }}</h4>
                <div class="float-left mt-30">
                    
                    <h6>{{ trans('Invoice_Accoints_trans.Study_Fees_Cruent') }}: <strong>${{ $Receipt->Debit }}</strong>
                    </h6>
                </div>
            </div>
        
            <div class="text-left clearfix mb-3 mt-2">
                <div class="float-left mt-30">
                    <h6>{{ trans('Invoice_Accoints_trans.signature') }} :</h6>
                    <h6>-----------------</h6>
                </div>
                <div class="text-right clearfix mb-3 mt-2">
                    <div class="float-right mt-30">
                        <h6>{{ trans('Invoice_Accoints_trans.signature_School') }} :</h6>
                        <h6 class="float-right">-----------------</h6>
                    </div>
                </div>
            </div>


          

            <div class="text-right">
                <button type="button" class="btn btn-success" id="print_Button" onclick="javascript:window.print();">
                    <span><i class="fa fa-print"></i> {{ trans('Invoice_Accoints_trans.Print') }}</span>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @toastr_js
    @toastr_render

@endsection
