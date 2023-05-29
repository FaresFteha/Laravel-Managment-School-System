@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('invoices_trans.excludefee') }}
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
                <h4 class="mb-0">{{ trans('invoices_trans.excludefee') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('invoices_trans.excludefee') }}</li>
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
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="widget-search ml-0 clearfix">
                            <i class="fa fa-search"></i>
                            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                                placeholder="{{ trans('extra_trans.Search_here') }}">
                        </div>
                        <br>
                        <table class="table  table-hover table-sm table-bordered p-0">
                            <thead>
                                <tr class="alert-success">
                                    <th>#</th>
                                    <th>{{ trans('invoices_trans.Invoices_date') }}</th>
                                    <th>{{ trans('invoices_trans.Name') }}</th>
                                    <th>{{ trans('invoices_trans.Amount') }}</th>
                                    <th>{{ trans('invoices_trans.Description') }}</th>
                                    <th>{{ trans('invoices_trans.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @forelse($ProcessingFees as $ProcessingFee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ProcessingFee->date }}</td>
                                        <td>{{ $ProcessingFee->student->name }}</td>
                                        <td>{{ number_format($ProcessingFee->amount, 2) }}</td>
                                        <td>{{ $ProcessingFee->description }}</td>
                                        <td>
                                            @can('تعديل استثناء الرسوم')
                                                <a href="{{ route('ProccessingFeesStudent.edit', $ProcessingFee->id) }}"
                                                    class="btn btn-info" role="button" aria-pressed="true"><i
                                                        class="fa fa-edit"></i></a>
                                            @elsecan('Edit Exclude Fee')
                                                <a href="{{ route('ProccessingFeesStudent.edit', $ProcessingFee->id) }}"
                                                    class="btn btn-info" role="button" aria-pressed="true"><i
                                                        class="fa fa-edit"></i></a>
                                            @endcan

                                            @can('حذف استثناء الرسوم')
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#Delete_receipt{{ $ProcessingFee->id }}"><i
                                                        class="fa fa-trash"></i></button>
                                            @elsecan('Delete Exclude Fee')
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#Delete_receipt{{ $ProcessingFee->id }}"><i
                                                        class="fa fa-trash"></i></button>
                                            @endcan

                                        </td>
                                    </tr>
                                    @include('pages.ProccessingFees.Delete')
                                @empty
                                    <tr>
                                        <td class="alert-danger text-center" colspan="5">
                                            {{ trans('students_trans.NotData') }}</td>
                                    </tr>
                                @endforelse
                        </table>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <div class="float-right">
                                        {!! $ProcessingFees->appends(request()->all())->links() !!}
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
<!-- row closed -->
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
@endsection
