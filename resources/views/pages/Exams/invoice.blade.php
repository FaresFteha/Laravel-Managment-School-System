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
                </div>
                <div class="row">
                    <ul class="addresss-info invoice-addresss list-unstyled ">
                        @php
                            $current_year = date('Y');
                        @endphp
                        <li><strong>{{ trans('exams_trans.Semester_Exam') }}:
                                {{ $current_year . '/' . $current_year + 1 }}</strong></li>
                        <li class="text-center"><strong>{{ trans('exams_trans.Semester_Exam_Schedule') }}</strong></li><br>
                    </ul>
                </div>
            </div>

            <div class="page-invoice-table table-responsive">
                <table class="table table-hover text-right">
                    <thead>
                        <tr>
                            <th class="text-left">#</th>
                            <th>{{ trans('exams_trans.Name_exam') }}</th>
                            <th>{{ trans('exams_trans.Semester') }}</th>
                            <th>{{ trans('exams_trans.day_exam') }}</th>
                            <th>{{ trans('exams_trans.start_exam') }}</th>
                            <th>{{ trans('exams_trans.exam_time') }}</th>
                            <th>{{ trans('exams_trans.exam_duration') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Exams as $item)
                            <tr>
                                <td ">{{ $loop->iteration }}</td>
                                        <td>{{ $item->subject->name }}</td>
                                        <td >{{ $item->term }}</td>
                                        <td>{{ $item->day_exam }}</td>
                                        <td >{{ $item->start_exam }}</td>
                                        <td >{{ $item->exam_time }}</td>
                                        <td>{{ $item->exam_duration }}</td>
                                    </tr>
                        @empty
     @endforelse
                    </tbody>
                </table>
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
