@extends('layouts.master')

@section('css')
    @livewireStyles
@endsection

@section('title')
    {{ trans('hedartitlepage.Home') }}
@stop
@section('page-header')

    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('dashpored.Titleheader') }}: <label style="color: red">
                        {{ auth()->user()->Name }}</label></h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('hedartitlepage.from') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('hedartitlepage.to') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- main-content -->
    {{-- سكشن عدد الطلاب والاباء والفصول والمعلمين --}}
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
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
                            <h4>{{ $countofstudents }}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Students.index') }}"
                            target="_blank"><span class="text-danger">{{ trans('dashpored.Displaydata') }}</span></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-primary">
                                <h1><i class="fa fa-sort-alpha-asc" style="font-size:50px;color:#f57e2e"></i></h1>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark">{{ trans('dashpored.Sections') }}</p>
                            <h4>{{ $countofsections }}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fa fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Sections') }}"
                            target="_blank"><span class="text-danger">{{ trans('dashpored.Displaydata') }}</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
     {{-- جدول بيانات الطلاب والاباء والفصول والمعلمين  
    <div class="row">
        <div style="height: 400px;" class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="tab nav-border" style="position: relative;">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block w-100">
                                <h5 style="font-family: 'Cairo', sans-serif" class="card-title">اخر العمليات علي النظام</h5>
                            </div>
                            <div class="d-block d-md-flex nav-tabs-custom">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active show" id="students-tab" data-toggle="tab" href="#students"
                                            role="tab" aria-controls="students" aria-selected="true"> الطلاب</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                            role="tab" aria-controls="teachers" aria-selected="false">المعلمين
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                            role="tab" aria-controls="parents" aria-selected="false">اولياء الامور
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                            role="tab" aria-controls="fee_invoices" aria-selected="false">الفواتير
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
 
                            <div class="tab-pane fade active show" id="students" role="tabpanel"
                                aria-labelledby="students-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                            <tr class="table-info text-danger">
                                                <th>#</th>
                                                <th>اسم الطالب</th>
                                                <th>البريد الالكتروني</th>
                                                <th>النوع</th>
                                                <th>المرحلة الدراسية</th>
                                                <th>الصف الدراسي</th>
                                                <th>القسم</th>
                                                <th>تاريخ الاضافة</th>
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
                                                    <td class="text-success">{{ $student->created_at }}</td>
                                                @empty
                                                    <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                         
                            <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                            <tr class="table-info text-danger">
                                                <th>#</th>
                                                <th>اسم المعلم</th>
                                                <th>النوع</th>
                                                <th>تاريخ التعين</th>
                                                <th>التخصص</th>
                                                <th>تاريخ الاضافة</th>
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
                                                    <td class="text-success">{{ $teacher->created_at }}</td>
                                                @empty
                                                    <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                </tr>
                                            </tbody>
                                        @endforelse
                                    </table>
                                </div>
                            </div>
                             parents Table  
                             
                            <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                            <tr class="table-info text-danger">
                                                <th>#</th>
                                                <th>اسم ولي الامر</th>
                                                <th>البريد الالكتروني</th>
                                                <th>رقم الهوية</th>
                                                <th>رقم الهاتف</th>
                                                <th>تاريخ الاضافة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse(\App\Models\myparent::latest()->take(5)->get() as $parent)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $parent->Name_Father }}</td>
                                                    <td>{{ $parent->Email }}</td>
                                                    <td>{{ $parent->National_ID_Father }}</td>
                                                    <td>{{ $parent->Phone_Father }}</td>
                                                    <td class="text-success">{{ $parent->created_at }}</td>
                                                @empty
                                                    <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         
                            sections Table  
                            <div class="tab-pane fade" id="fee_invoices" role="tabpanel"
                                aria-labelledby="fee_invoices-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                            <tr class="table-info text-danger">
                                                <th>#</th>
                                                <th>تاريخ الفاتورة</th>
                                                <th>اسم الطالب</th>
                                                <th>المرحلة الدراسية</th>
                                                <th>الصف الدراسي</th>
                                                <th>القسم</th>
                                                <th>نوع الرسوم</th>
                                                <th>المبلغ</th>
                                                <th>تاريخ الاضافة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse(\App\Models\Fee_invoice::latest()->take(10)->get() as $section)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $section->invoice_date }}</td>
                                                    <td>{{ $section->classroom->name_class }}</td>
                                                    <td class="text-success">{{ $section->created_at }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="alert-danger" colspan="9">لاتوجد بيانات</td>
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
      جدول بيانات الطلاب والاباء والفصول والمعلمين   --}}


    {{-- Calender LiveWire --}}
    <livewire:calendar />

@endsection


@section('js')
    @livewireScripts
    @stack('scripts')
@endsection
