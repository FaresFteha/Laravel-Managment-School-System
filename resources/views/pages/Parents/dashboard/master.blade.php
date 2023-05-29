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
                <h3 class="mb-15">{{ trans('parent_trans.Cpanelparents') }}: <span style="color: #84ba3f"><i
                            class="fa fa-users"></i> {{ auth()->user()->Name_Father }}!</span>
                </h3>
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
    <style>
        .card-img-top {
            width: 100%;
            height: 40vh;
            object-fit: cover;
        }

        .mg {
            margin-right: 90px
        }
    </style>
    <h4 class="text-center">{{ trans('parent_trans.studentchilde') }}</h4>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($sons as $son)
                    <div class="col-md-8 col-l g-6 col-xl-2 mg">
                        <a href="">
                            <div class="card text-black" style="width: 18rem;">
                                <img src="{{ URL::asset('attachments/student_images/' . $son->file_name) }}"
                                    class="card-img-top" />
                                <div class="card-body">
                                    <div class="text-center">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">
                                            {{ $son->name }}</h5>
                                        <p class="text-muted mb-4">{{ trans('parent_trans.Studentinformation') }}</p>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <span>{{ trans('students_trans.Grade') }}</span><span>{{ $son->grade->name }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>{{ trans('students_trans.classrooms') }}</span><span>{{ $son->classroom->name_class }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>{{ trans('students_trans.section') }}</span><span>{{ $son->section->name_sections }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            @if (\App\Models\Degree::where('student_id', $son->id)->count() == 0)
                                                <span>{{ trans('students_trans.numberofquizzes') }}</span><span
                                                    class="text-danger">{{ \App\Models\Degree::where('student_id', $son->id)->count() }}</span>
                                            @else
                                                <span>{{ trans('students_trans.numberofquizzes') }}</span><span
                                                    class="text-success">{{ \App\Models\Degree::where('student_id', $son->id)->count() }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


@section('js')
    @livewireScripts
    @stack('scripts')
@endsection
