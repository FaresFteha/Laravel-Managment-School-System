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
                    <div class="mb-20"><img class="logo-small mt-0" src="{{ asset('assets/logo-new-gen/logo-new-gen.png') }}"
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
                            {{ $Fee_invoice->student->name }}</h4>
                    </div>
                    <ul class="addresss-info invoice-addresss list-unstyled">
                        <li><strong>{{ trans('grades_trans.Name') }}:</strong>{{ $Fee_invoice->grade->name }}</li>
                        <li><strong>{{ trans('sections_trans.Name_Class') }}:</strong>{{ $Fee_invoice->classroom->name_class }}
                        </li>
                        <li><strong></strong></li>

                        <li><span><strong>{{ trans('Invoice_Accoints_trans.Email') }}: </strong>
                                {{ $Fee_invoice->student->email }}</span></li>
                        <li><span><strong>{{ trans('Invoice_Accoints_trans.academic_year') }}: </strong> <a>
                                    {{ $Fee_invoice->student->academic_year }} </a></span></li>
                    </ul>
                    <span>{{ trans('Invoice_Accoints_trans.Invoice_Date') }}: {{ $Fee_invoice->invoice_date }}</span>
                    <br>
                    {{-- <span>Due Date: February 24, 2018</span> --}}
                </div>
            </div>

            <div class="page-invoice-table table-responsive">
                <table class="table table-hover text-right">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">{{ trans('invoices_trans.Description') }}</th>
                            <th class="text-right">{{ trans('invoices_trans.Amount') }}</th>
                            <th class="text-right">{{ trans('Invoice_Accoints_trans.Billpayment_date') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($receipt_students as $Invoice)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $Invoice->description }}</td>
                                <td>$ {{ $Invoice->Debit }}</td>
                                <td class="text-success">{{ $Invoice->created_at->format('Y/m/d') }}</td>
                            </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div class="text-right clearfix mb-3 mt-2 ">
                <div class="float-right mt-30">
                    {{-- 
                    <h6>{{ trans('Invoice_Accoints_trans.Study_Fees_Cruent') }}: <strong>${{ $Fee_invoice->amount }}</strong>
                    </h6>
                   
                    <h6>{{ trans('Invoice_Accoints_trans.Study_Fees') }}: <strong>
                            @if (number_format($Fee_invoice->student->student_account->sum('Debit') - $Fee_invoice->student->student_account->sum('credit'), 2) == 0)
                                ${{ number_format(0, 2) }}
                            @else
                                ${{ number_format( $Fee_invoice->sum('amount') - $Fee_invoice->student->student_account->sum('Debit'), 2 ) }}
                            @endif
                        </strong></h6>
                      
                    <h6>{{ trans('Invoice_Accoints_trans.Rest_of_Fees') }}: <strong>$
                            {{ number_format($Fee_invoice->student->student_account->sum('Debit') - $Fee_invoice->student->student_account->sum('credit'), 2) }}</strong>
                    </h6>
                      --}}
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
    {{-- <script>
        function printpdf() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script> --}}
@endsection
