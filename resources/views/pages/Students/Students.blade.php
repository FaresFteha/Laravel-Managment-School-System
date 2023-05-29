@extends('layouts.master')
@section('css')
    @toastr_css
@endsection

@section('title')
    {{ trans('main_siadebar_trans.students') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{ trans('main_siadebar_trans.students') }}</h4>
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
    {{ trans('main_siadebar_trans.students') }}
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">

                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="table-responsive">

                            <div class="widget-search ml-0 clearfix">
                                <i class="fa fa-search"></i>
                                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                                    placeholder="{{ trans('extra_trans.Search_here') }}">
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <table class="table table-hover  table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('Students_trans.name') }}</th>
                                        <th>{{ trans('Students_trans.email') }}</th>
                                        <th>{{ trans('Students_trans.gender') }}</th>
                                        <th>{{ trans('Students_trans.Grade') }}</th>
                                        <th>{{ trans('Students_trans.classrooms') }}</th>
                                        <th>{{ trans('Students_trans.section') }}</th>
                                        <th>{{ trans('Students_trans.Processes') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @forelse ($students as $student)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->gender->gender }}</td>
                                            <td>{{ $student->grade->name }}</td>
                                            <td>{{ $student->classroom->name_class }}</td>
                                            <td>{{ $student->section->name_sections }}</td>
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success dropdown-toggle" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        {{ trans('students_trans.Processes') }}
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        @can('عرض الطلاب')
                                                            <a class="dropdown-item"
                                                                href="{{ route('Students.show', $student->id) }}"><i
                                                                    style="color: #ffc107" class="fa fa-eye "></i>&nbsp;
                                                                {{ trans('students_trans.Viewstudentdata') }}</a>
                                                        @elsecan('show Student')
                                                            <a class="dropdown-item"
                                                                href="{{ route('Students.show', $student->id) }}"><i
                                                                    style="color: #ffc107" class="fa fa-eye "></i>&nbsp;
                                                                {{ trans('students_trans.Viewstudentdata') }}</a>
                                                        @endcan

                                                        @can('تعديل الطلاب')
                                                            <a class="dropdown-item"
                                                                href="{{ route('Students.edit', $student->id) }}"><i
                                                                    style="color:green" class="fa fa-edit"></i>&nbsp;
                                                                {{ trans('students_trans.Editstudentdata') }}</a>
                                                        @elsecan('Edit Student')
                                                            <a class="dropdown-item"
                                                                href="{{ route('Students.edit', $student->id) }}"><i
                                                                    style="color:green" class="fa fa-edit"></i>&nbsp;
                                                                {{ trans('students_trans.Editstudentdata') }}</a>
                                                        @endcan

                                                        @can('أضف فاتورة رسوم')
                                                            <a class="dropdown-item"
                                                                href="{{ route('FeeIncoices.show', $student->id) }}"><i
                                                                    style="color: #0000cc"
                                                                    class="fa fa-edit"></i>&nbsp;{{ trans('students_trans.Addafeeinvoice') }}&nbsp;</a>
                                                        @elsecan('Add a fee invoice')
                                                            <a class="dropdown-item"
                                                                href="{{ route('FeeIncoices.show', $student->id) }}"><i
                                                                    style="color: #0000cc"
                                                                    class="fa fa-edit"></i>&nbsp;{{ trans('students_trans.Addafeeinvoice') }}&nbsp;</a>
                                                        @endcan

                                                        @can('سند قبض')
                                                            <a class="dropdown-item"
                                                                href="{{ route('ReceiptStudent.show', $student->id) }}"><i
                                                                    style="color: #718fa1" class="fa fa-money"></i>&nbsp;
                                                                &nbsp;{{ trans('invoices_trans.receipt') }}</a>
                                                        @elsecan('Receipt')
                                                            <a class="dropdown-item"
                                                                href="{{ route('ReceiptStudent.show', $student->id) }}"><i
                                                                    style="color: #718fa1" class="fa fa-money"></i>&nbsp;
                                                                &nbsp;{{ trans('invoices_trans.receipt') }}</a>
                                                        @endcan

                                                        @can('استبعاد الرسوم')
                                                            <a class="dropdown-item"
                                                                href="{{ route('ProccessingFeesStudent.show', $student->id) }}"><i
                                                                    style="color: #ce4343" class="fa fa-money"></i>&nbsp;
                                                                &nbsp;{{ trans('invoices_trans.excludefee') }}</a>
                                                        @elsecan('Exclude fee')
                                                            <a class="dropdown-item"
                                                                href="{{ route('ProccessingFeesStudent.show', $student->id) }}"><i
                                                                    style="color: #ce4343" class="fa fa-money"></i>&nbsp;
                                                                &nbsp;{{ trans('invoices_trans.excludefee') }}</a>
                                                        @endcan

                                                        @can('سند الصرف')
                                                            <a class="dropdown-item"
                                                                href="{{ route('Payment.show', $student->id) }}"><i
                                                                    style="color:goldenrod" class="fa fa-usd"></i>&nbsp;
                                                                {{ trans('invoices_trans.voucherofexchange') }}</a>
                                                        @elsecan('Voucher of Exchange')
                                                            <a class="dropdown-item"
                                                                href="{{ route('Payment.show', $student->id) }}"><i
                                                                    style="color:goldenrod" class="fa fa-usd"></i>&nbsp;
                                                                {{ trans('invoices_trans.voucherofexchange') }}</a>
                                                        @endcan

                                                        @can('اطبع المدفوعات')
                                                            <a class="dropdown-item"
                                                                href="{{ route('Invoice_Accoints', $student->id) }}"><i
                                                                    style="color: rgb(10, 187, 134)"
                                                                    class="fa fa-print"></i>&nbsp;
                                                                {{ trans('students_trans.Print_Account_statement') }}</a>
                                                        @elsecan('Print with Payments')
                                                            <a class="dropdown-item"
                                                                href="{{ route('Invoice_Accoints', $student->id) }}"><i
                                                                    style="color: rgb(10, 187, 134)"
                                                                    class="fa fa-print"></i>&nbsp;
                                                                {{ trans('students_trans.Print_Account_statement') }}</a>
                                                        @endcan

                                                        @can('كشف حساب')
                                                            <a class="dropdown-item"
                                                                href="{{ route('Accounts_Statment', $student->id) }}"><i
                                                                    style="color: rgb(71, 86, 223)"
                                                                    class="fa fa-filter"></i>&nbsp;
                                                                {{ trans('students_trans.Account_statement') }}</a>
                                                        @elsecan('Account statement')
                                                            <a class="dropdown-item"
                                                                href="{{ route('Accounts_Statment', $student->id) }}"><i
                                                                    style="color: rgb(71, 86, 223)"
                                                                    class="fa fa-filter"></i>&nbsp;
                                                                {{ trans('students_trans.Account_statement') }}</a>
                                                        @endcan


                                                        @can('حذف الطلاب')
                                                            <a class="dropdown-item"
                                                                data-target="#Delete_Student{{ $student->id }}"
                                                                data-toggle="modal"
                                                                href="##Delete_Student{{ $student->id }}"><i
                                                                    style="color: red" class="fa fa-trash"></i>&nbsp;
                                                                {{ trans('Grades_trans.Delete') }}</a>
                                                        @elsecan('Delete Student')
                                                            <a class="dropdown-item"
                                                                data-target="#Delete_Student{{ $student->id }}"
                                                                data-toggle="modal"
                                                                href="##Delete_Student{{ $student->id }}"><i
                                                                    style="color: red" class="fa fa-trash"></i>&nbsp;
                                                                {{ trans('Grades_trans.Delete') }}</a>
                                                        @endcan


                                                    </div>
                                                </div>
                                            </td>

                                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                        </tr>
                                        @include('pages.Students.Delete')
                                    @empty
                                        <tr>
                                            <td class="alert-danger text-center" colspan="8">
                                                {{ trans('students_trans.NotData') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>

                            <div>
                                <tfoot>
                                    <tr>
                                        <td colspan="8">
                                            <div class="float-right">
                                                {!! $students->appends(request()->all())->links() !!}
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

    {{-- 
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

   <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            if($value){
                $('.allData').hide();
                $('.searchdata').show();
            }else{
                $('.allData').show();
                $('.searchdata').hide();
            }
            $.ajax({
                
                type: 'get',
                url: '{{ URL::to('search')}}',
                data: {
                    'search': $value
                },

                success:function(data) {
                    console.log(data);
                    $('#content').html(data);
                }
            });
        })
    </script> --}}
@endsection
