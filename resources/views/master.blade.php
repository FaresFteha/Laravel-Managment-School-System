@extends('layouts.master')

@section('css')
    @livewireStyles
@endsection

@section('title')
    {{ trans('hedartitlepage.Home') }}
@stop

@section('content-home')
    <div class="content-wrapper header-info">
        <!-- main-content -->
        {{-- سكشن عدد الطلاب والاباء والفصول والمعلمين --}}
        <div class="page-title">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-15 text-white">{{ trans('dashpored.Wellcome') }}, <span style="color: #84ba3f"><i class="ti-user"></i> {{ Auth::user()->name }}!</span>
                    </h3>
                    <span class="mb-10 mb-md-30 text-white d-block ">{{ trans('dashpored.descriptionTop') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-success">
                                    <h1><i class=" fa fa-mortar-board" style="font-size:50px;color:#00a54a"></i></h1>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{ trans('dashpored.numberofstudents') }}</p>
                                <h4>{{ \App\Models\Student::count() }}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-binoculars mr-1" aria-hidden="true"></i><a
                                href="{{ route('StudentsTableview') }}" target="_blank"><span
                                    class="text-danger">{{ trans('dashpored.Displaydata') }}</span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-warning">
                                    <h1> <i class="fa fa-suitcase" aria-hidden="true"
                                            style="font-size:50px;color:#52bed1"></i>
                                    </h1>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{ trans('dashpored.numberofteachers') }}</p>
                                <h4>{{ \App\Models\Teacher::count() }}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-binoculars mr-1" aria-hidden="true"></i><a
                                href="{{ route('TeachersTableview') }}" target="_blank"><span
                                    class="text-danger">{{ trans('dashpored.Displaydata') }}</span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-success">
                                    <h1><i class="fa fa-users" style="font-size:50px;color:#00a54a"></i></h1>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{ trans('dashpored.numberofparents') }}</p>
                                <h4>{{ \App\Models\myparent::count() }}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Parents') }}"
                                target="_blank"><span class="text-danger">{{ trans('dashpored.Displaydata') }}</span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-primary">
                                    <h1><i class="fa fa-sort-alpha-asc" style="font-size:50px;color:#f57e2e"></i></h1>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">{{ trans('dashpored.numberofclasses') }}</p>
                                <h4>{{ \App\Models\Section::count() }}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fa fa-binoculars mr-1" aria-hidden="true"></i><a
                                href="{{ route('SectionsTableview') }}" target="_blank"><span
                                    class="text-danger">{{ trans('dashpored.Displaydata') }}</span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- جدول بيانات الطلاب والاباء والفصول والمعلمين --}}
        <div class="row">
            <div style="height: 400px;" class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="tab nav-border" style="position: relative;">
                            <div class="d-block d-md-flex justify-content-between">
                                <div class="d-block w-100">
                                    <h5 style="font-family: 'Cairo', sans-serif" class="card-title">{{ trans('dashpored.LastOperation') }}</h5>
                                </div>
                                <div class="d-block d-md-flex nav-tabs-custom">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                href="#students" role="tab" aria-controls="students"
                                                aria-selected="true">{{ trans('dashpored.Students') }}</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                                role="tab" aria-controls="teachers" aria-selected="false">{{ trans('dashpored.Teachers') }}
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                role="tab" aria-controls="parents" aria-selected="false">{{ trans('dashpored.Parents') }}                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="fee_invoices-tab" data-toggle="tab"
                                                href="#fee_invoices" role="tab" aria-controls="fee_invoices"
                                                aria-selected="false">{{ trans('dashpored.Invoices') }}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">

                                {{-- students Table --}}
                                <div class="tab-pane fade active show" id="students" role="tabpanel"
                                    aria-labelledby="students-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center"
                                            class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{ trans('students_trans.name') }}</th>
                                                    <th>{{ trans('students_trans.email') }}</th>
                                                    <th>{{ trans('students_trans.gender') }}</th>
                                                    <th>{{ trans('students_trans.Grade') }}</th>
                                                    <th>{{ trans('students_trans.classrooms') }}</th>
                                                    <th>{{ trans('students_trans.section') }}</th>
                                                    <th>{{ trans('students_trans.created_at') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->email }}</td>
                                                        <td>{{ $student->gender->gender }}</td>
                                                        <td>{{ $student->grade->name }}</td>
                                                        <td>{{ $student->classroom->name_class }}</td>
                                                        <td>{{ $student->section->name_sections }}</td>
                                                        <td class="text-success">{{ $student->created_at->format('Y/m/d') }}</td>
                                                    @empty
                                                        <td class="alert-danger text-center" colspan="8">{{ trans('students_trans.NotData') }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- teachers Table --}}
                                <div class="tab-pane fade" id="teachers" role="tabpanel"
                                    aria-labelledby="teachers-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center"
                                            class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{ trans('Teacher_trans.Name_Teacher') }}</th>
                                                    <th>{{ trans('Teacher_trans.Gender') }}</th>
                                                    <th>{{ trans('Teacher_trans.Joining_Date') }}</th>
                                                    <th>{{ trans('Teacher_trans.specialization') }}</th>
                                                    <th>{{ trans('students_trans.created_at') }}</th>
                                                </tr>
                                            </thead>

                                            @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $teacher->Name }}</td>
                                                        <td>{{ $teacher->genders->gender }}</td>
                                                        <td>{{ $teacher->Joining_Date }}</td>
                                                        <td>{{ $teacher->specializations->specialization }}</td>
                                                        <td class="text-success">{{ $teacher->created_at->format('Y/m/d') }}</td>
                                                    @empty
                                                        <td class="alert-danger" colspan="8">{{ trans('students_trans.NotData') }}</td>
                                                    </tr>
                                                </tbody>
                                            @endforelse
                                        </table>
                                    </div>
                                </div>

                                
                                {{-- parents Table --}}
                                <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center"
                                            class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{ trans('parent_trans.Name') }}</th>
                                                    <th>{{ trans('parent_trans.Email') }}</th>
                                                    <th>{{ trans('parent_trans.National_ID_Father') }}</th>
                                                    <th>{{ trans('parent_trans.Phone_Father') }}</th>
                                                    <th>{{ trans('students_trans.created_at') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(\App\Models\myparent::latest()->take(5)->get() as $parent)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $parent->Name_Father }}</td>
                                                        <td>{{ $parent->email }}</td>
                                                        <td>{{ $parent->National_ID_Father }}</td>
                                                        <td>{{ $parent->Phone_Father }}</td>
                                                        <td class="text-success">{{ $parent->created_at->format('Y/m/d') }}</td>
                                                    @empty
                                                        <td class="alert-danger" colspan="8">{{ trans('students_trans.NotData') }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- sections Table --}}
                                <div class="tab-pane fade" id="fee_invoices" role="tabpanel"
                                    aria-labelledby="fee_invoices-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center"
                                            class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                                <tr class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{ trans('invoices_trans.Invoices_date') }}</th>
                                                    <th>{{ trans('invoices_trans.StudentName') }}</th>
                                                    <th>{{ trans('invoices_trans.GradeStage') }}</th>
                                                    <th>{{ trans('invoices_trans.ClassRoom') }}</th>
                                                    <th>{{ trans('invoices_trans.TypeFee') }}</th>
                                                    <th>{{ trans('invoices_trans.Amount') }}</th>
                                                    <th>{{ trans('invoices_trans.remaining') }}</th>
                                                    <th>{{ trans('students_trans.created_at') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse(\App\Models\Fee_invoice::latest()->take(10)->get() as $Fee_invoice)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $Fee_invoice->invoice_date }}</td>
                                                        <td>{{ $Fee_invoice->student->name }}</td>
                                                        <td>{{ $Fee_invoice->grade->name }}</td>
                                                        <td>{{ $Fee_invoice->classroom->name_class }}</td>
                                                        <td>{{ $Fee_invoice->description }}</td>
                                                        <td>{{ $Fee_invoice->amount }}</td>
                                                        <td>{{ number_format($Fee_invoice->student->student_account->sum('Debit') - $Fee_invoice->student->student_account->sum('credit'), 2) }}</td>

                                                        <td class="text-success">{{ $Fee_invoice->created_at->format('Y/m/d') }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="alert-danger" colspan="9">{{ trans('students_trans.NotData') }}</td>
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

        {{-- جدول بيانات الطلاب والاباء والفصول والمعلمين --}}


        {{-- Calender LiveWire --}}
        <livewire:calendar />
        @include('layouts.footer')
    </div>
    <!-- main content wrapper end--
@endsection


@section('js')
    @livewireScripts
    @stack('scripts')
@endsection
