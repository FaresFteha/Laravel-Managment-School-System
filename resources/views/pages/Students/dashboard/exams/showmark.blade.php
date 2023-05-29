@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Sections_trans.title_page') }}: {{ trans('students_trans.Studentmarks') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<!-- breadcrumb -->
<h4> {{ trans('Sections_trans.title_page') }}: {{ trans('students_trans.Studentmarks') }}</h4>
<br>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        @foreach ($StudentAc as $StudentAc)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $StudentAc->academicyear }}</a>
                                <div class="acd-des">
                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <h4 class="text-primary">
                                                            {{ trans('students_trans.Firstsemester') }}</h4>
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('students_trans.Subj') }}</th>
                                                                    <th>{{ trans('students_trans.monthlymark') }}</th>
                                                                    <th>{{ trans('students_trans.classworks') }}</th>
                                                                    <th>{{ trans('students_trans.Endoftermexam') }}
                                                                    </th>
                                                                    <th>{{ trans('students_trans.Total') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($StudentAc->academicyears as $MarkStudents)
                                                                    @if ($MarkStudents->semester === '1' && $MarkStudents->Student_id === $semester1->Student_id)
                                                                        <tr>
                                                                            <td>{{ $loop->index + 1 }}</td>
                                                                            <td>{{ $MarkStudents->subject->name }}
                                                                            </td>
                                                                            <td>{{ $MarkStudents->monthly_exam }}
                                                                            </td>
                                                                            <td>{{ $MarkStudents->school_year_work }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $MarkStudents->end_of_term_exam }}
                                                                            </td>
                                                                            <td>
                                                                                @if ($MarkStudents->mark >= 50)
                                                                                    <label class="badge badge-success">
                                                                                        {{ $MarkStudents->mark }}</label>
                                                                                @else
                                                                                    <label class="badge badge-danger">
                                                                                        {{ $MarkStudents->mark }}</label>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                    @empty
                                                                    <tr>
                                                                        <td class="alert-danger text-center" colspan="5">{{ trans('students_trans.NotData') }}</td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>
                                                        <hr>

                                                        {{-- <tfoot>
                                                            <tr>
                                                                <strong>{{ trans('students_trans.Remainingschoolsubjects') }}:
                                                                    @if ($studentMark1)
                                                                        <label class="badge badge-danger">
                                                                            {{ $studentMark1->count() }}</label>
                                                                    @else
                                                                        <label class="badge badge-danger">
                                                                            {{ 0 }}</label>
                                                                    @endif
                                                                </strong>
                                                            </tr>
                                                            <tr>
                                                                <strong
                                                                    class="float-right"">{{ trans('students_trans.Total') }}:
                                                                    <label class="badge badge-success">
                                                                        {{ $avg->Avarege }}</label>
                                                                </strong>
                                                            </tr>
                                                        </tfoot> --}}
                                                        <br>
                                                        <br>
                                                        <br>

                                                        <h4 class="text-primary">
                                                            {{ trans('students_trans.SecondSemester') }}</h4>
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('students_trans.Subj') }}</th>
                                                                    <th>{{ trans('students_trans.monthlymark') }}</th>
                                                                    <th>{{ trans('students_trans.classworks') }}</th>
                                                                    <th>{{ trans('students_trans.Endoftermexam') }}
                                                                    </th>
                                                                    <th>{{ trans('students_trans.Total') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse($StudentAc->academicyears as $MarkStudents)
                                                                    @if ($MarkStudents->semester === '2' && $MarkStudents->Student_id === $semester1->Student_id)
                                                                        <tr>
                                                                            <td>{{ $loop->index + 1 }}</td>
                                                                            <td>{{ $MarkStudents->subject->name }}</td>
                                                                            <td>{{ $MarkStudents->monthly_exam }}</td>
                                                                            <td>{{ $MarkStudents->school_year_work }}
                                                                            </td>
                                                                            <td>{{ $MarkStudents->end_of_term_exam }}
                                                                            </td>
                                                                            <td>
                                                                                @if ($MarkStudents->mark >= 50)
                                                                                    <label class="badge badge-success">
                                                                                        {{ $MarkStudents->mark }}</label>
                                                                                @else
                                                                                    <label class="badge badge-danger">
                                                                                        {{ $MarkStudents->mark }}</label>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                    @empty
                                                                    <tr>
                                                                        <td class="alert-danger text-center" colspan="5">{{ trans('students_trans.NotData') }}</td>
                                                                    </tr>
                                                                @endforelse

                                                            </tbody>
                                                        </table>
                                                        <hr>
                                                        {{-- <tfoot>
                                                            @if ($MarkStudents->semester === '2' && $MarkStudents->Student_id === $semester1->Student_id)
                                                            <tr>
                                                                <strong>{{ trans('students_trans.Remainingschoolsubjects') }}:
                                                                    @if ($studentMark2)
                                                                        <label class="badge badge-danger">
                                                                            {{ $studentMark2->count() }}</label>
                                                                    @else
                                                                        <label class="badge badge-danger">
                                                                            {{ 0 }}</label>
                                                                    @endif
                                                                </strong>
                                                            </tr>
                                                            @endif

                                                            <tr>
                                                            @if ($MarkStudents->semester === '2' && $MarkStudents->Student_id === $semester1->Student_id)

                                                                <strong
                                                                    class="float-right"">{{ trans('students_trans.Total') }}:
                                                                    <label class="badge badge-success">
                                                                        {{round($MarkStudents->avg('mark'), 2)}}</label>

                                                                </strong>
                                                                @endif
                                                            </tr>
                                                        </tfoot> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
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
@endsection
