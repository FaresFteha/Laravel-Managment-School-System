@extends('layouts.master')
@section('css')
    @toastr_css
@endsection

@section('title')
    {{ trans('students_trans.Account_statement') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('students_trans.Account_statement') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ trans('main_siadebar_trans.students') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('students_trans.Account_statement') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ trans('students_trans.Account_statement') }} : <span
                            style="color: red">{{ $Fee_invoice->student->name }}</span></h5>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="tab nav-center">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="research-tab" data-toggle="tab" href="#research"
                                            role="tab" aria-controls="research"
                                            aria-selected="true">{{ trans('students_trans.Payment_statement') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="design-tab" data-toggle="tab" href="#design" role="tab"
                                            aria-controls="design" aria-selected="false">
                                            {{ trans('students_trans.student_acounnts') }} </a>
                                    </li>

                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    {{-- Tab2 --}}
                                    <div class="tab-pane fade active show" id="research" role="tabpanel"
                                        aria-labelledby="research-tab">
                                        <div class="accordion accordion-border mb-30">
                                            <div class="acd-group acd-active">
                                                <div class="row">
                                                    <div class="col-md-12 mb-30">
                                                        <div class="card card-statistics h-100">

                                                            <div class="card card-statistics h-100">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">

                                                                        <div class="widget-search ml-0 clearfix">
                                                                            <i class="fa fa-search"></i>
                                                                            <input type="text" id="myInput2"
                                                                                onkeyup="myFunction()" class="form-control"
                                                                                placeholder="{{ trans('extra_trans.Search_here') }}">
                                                                        </div>
                                                                        <br>
                                                                        <table
                                                                            class="table table-hover  table-bordered p-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-center">#</th>
                                                                                    <th class="text-left">
                                                                                        {{ trans('invoices_trans.Description') }}
                                                                                    </th>
                                                                                    <th class="text-right">
                                                                                        {{ trans('invoices_trans.Amount') }}
                                                                                    </th>
                                                                                    <th class="text-right">
                                                                                        {{ trans('Invoice_Accoints_trans.Billpayment_date') }}
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="myTable2">
                                                                                @forelse ($receipt_students as $Invoice)
                                                                                    <tr>
                                                                                        <td class="text-center">
                                                                                            {{ $loop->iteration }}</td>
                                                                                        <td class="text-left">
                                                                                            {{ $Invoice->description }}
                                                                                        </td>
                                                                                        <td>$ {{ $Invoice->Debit }}</td>
                                                                                        <td class="text-success">
                                                                                            {{ $Invoice->created_at->format('Y/m/d') }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @empty
                                                                                    <tr>
                                                                                        <td class="alert-danger text-center"
                                                                                            colspan=4">
                                                                                            {{ trans('students_trans.NotData') }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforelse

                                                                            </tbody>

                                                                        </table>

                                                                        <div>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <td colspan="4">
                                                                                        <div class="float-right">
                                                                                            {!! $receipt_students->appends(request()->all())->links() !!}
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tfoot>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- Tab2 --}}
                                    <div class="tab-pane fade" id="design" role="tabpanel" aria-labelledby="design-tab">
                                        <div class="accordion accordion-border mb-30">
                                            <div class="acd-group acd-active">
                                                <div class="row">
                                                    <div class="col-md-12 mb-30">
                                                        <div class="card card-statistics h-100">

                                                            <div class="card card-statistics h-100">
                                                                <div class="card-body">
                                                                    <div class="table-responsive">

                                                                        <div class="widget-search ml-0 clearfix">
                                                                            <i class="fa fa-search"></i>
                                                                            <input type="text" id="myInput"
                                                                                onkeyup="myFunction()" class="form-control"
                                                                                placeholder="{{ trans('extra_trans.Search_here') }}">
                                                                        </div>
                                                                        <br>
                                                                        <table
                                                                            class="table table-hover  table-bordered p-0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th class="text-center">#</th>
                                                                                    <th class="text-left">
                                                                                        {{ trans('invoices_trans.Description') }}
                                                                                    </th>
                                                                                    <th> {{ trans('invoices_trans.typeranc') }} </th>
                                                                                    <th>{{ trans('invoices_trans.Commitment') }}</th>
                                                                                    <th>{{ trans('invoices_trans.paid') }}</th>
                                                                                    <th>
                                                                                        {{ trans('invoices_trans.Invoices_date') }}
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="myTable">
                                                                                @forelse ($student_acounnts as $Invoice)
                                                                                    <tr>
                                                                                        <td class="text-center">
                                                                                            {{ $loop->iteration }}</td>
                                                                                        <td class="text-left">
                                                                                            {{ $Invoice->description }}
                                                                                        </td>
                                                                                        <td>
                                                                                            @if($Invoice->type == 'invoice')
                                                                                              <span class="text-primary">{{ trans('invoices_trans.invoice') }}</span>
                                                                                            @elseif ( $Invoice->type == 'receipt')
                                                                                            <span class="text-success">{{ trans('invoices_trans.receipt_SA') }}</span>
                                                                                            @elseif ( $Invoice->type == 'ProcessingFee')
                                                                                            <span class="text-danger">{{ trans('invoices_trans.exclude_fee') }}</span>
                                                                                            @elseif ( $Invoice->type == 'payment')
                                                                                            <span class="text-warning">{{ trans('invoices_trans.payment') }}</span>
                                                                                            @else
                                                                                            <span class="text-info">{{ trans('invoices_trans.notranc') }}</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td class="text-danger">$
                                                                                            {{ $Invoice->Debit }}</td>
                                                                                        <td class="text-primary">$
                                                                                            {{ $Invoice->credit }}</td>
                                                                                        <td class="text-success">
                                                                                            {{ $Invoice->date }}</td>
                                                                                    </tr>
                                                                                @empty
                                                                                    <tr>
                                                                                        <td class="alert-danger text-center"
                                                                                            colspan=4">
                                                                                            {{ trans('students_trans.NotData') }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforelse

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
@section('js')
    @toastr_js
    @toastr_render

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

<script>
    $(document).ready(function() {
        $("#myInput2").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable2 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection
