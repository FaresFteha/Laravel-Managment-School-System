@extends('layouts.master')
@section('css')
    @toastr_css

@endsection

@section('title')
    {{ trans('Students_trans.Student_details') }}
@stop


@section('page-header')
    <!-- breadcrumb -->
@endsection


@section('PageTitle')
    {{ trans('Students_trans.Student_details') }}
    <!-- breadcrumb -->
@endsection


@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                        role="tab" aria-controls="home-02"
                                        aria-selected="true">{{ trans('Students_trans.Student_details') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                        role="tab" aria-controls="profile-02"
                                        aria-selected="false">{{ trans('Students_trans.Attachments') }}</a>
                                </li>
                            </ul>
                            {{-- First Tab Details Student --}}
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                    aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{ trans('Students_trans.name') }}</th>
                                                <td>{{ $Student->name }}</td>
                                                <th scope="row">{{ trans('Students_trans.email') }}</th>
                                                <td>{{ $Student->email }}</td>
                                                <th scope="row">{{ trans('Students_trans.gender') }}</th>
                                                <td>{{ $Student->gender->gender }}</td>
                                                <th scope="row">{{ trans('Students_trans.Nationality') }}</th>
                                                <td>{{ $Student->Nationality->Nationalities }}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">{{ trans('Students_trans.Grade') }}</th>
                                                <td>{{ $Student->grade->name }}</td>
                                                <th scope="row">{{ trans('Students_trans.classrooms') }}</th>
                                                <td>{{ $Student->classroom->name_class }}</td>
                                                <th scope="row">{{ trans('Students_trans.section') }}</th>
                                                <td>{{ $Student->section->name_sections }}</td>
                                                <th scope="row">{{ trans('Students_trans.Date_of_Birth') }}</th>
                                                <td>{{ $Student->Date_Birth }}</td>
                                            </tr>

                                            <tr>
                                                <th scope="row">{{ trans('Students_trans.parent') }}</th>
                                                <td>{{ $Student->myparent->Name_Father }}</td>
                                                <th scope="row">{{ trans('Students_trans.academic_year') }}</th>
                                                <td>{{ $Student->academic_year }}</td>
                                                <th scope="row"></th>
                                                <td></td>
                                                <th scope="row"></th>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- Scound Tab Attachemnts --}}
                                <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        @can('اضافة مرفقات للطلاب')
                                            <div class="card-body">
                                                <form action="{{ route('Students.Upbloade_Attachment') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row pt-4">
                                                        <div class="col-12">
                                                            <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                                                                <label for="images">{{ trans('Students_trans.Attachments') }}
                                                                </label>
                                                            </h6>
                                                            <br>
                                                            <div class="file-loading">
                                                                <input type="file" accept="image/*" name="photos[]"
                                                                    id="photos" class="file-input-overview"
                                                                    multiple="multiple" required>

                                                            </div>
                                                            <input type="hidden" name="student_name"
                                                                value="{{ $Student->name }}">
                                                            <input type="hidden" name="student_id"
                                                                value="{{ $Student->id }}">
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <button type="submit" class="button button-border x-small pull-left">
                                                        {{ trans('Students_trans.submit') }}
                                                    </button>
                                                </form>
                                            </div>
                                        @elsecan('Add attachments for students')
                                            <div class="card-body">
                                                <form action="{{ route('Students.Upbloade_Attachment') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row pt-4">
                                                        <div class="col-12">
                                                            <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                                                                <label for="images">{{ trans('Students_trans.Attachments') }}
                                                                </label>
                                                            </h6>
                                                            <br>
                                                            <div class="file-loading">
                                                                <input type="file" accept="image/*" name="photos[]"
                                                                    id="photos" class="file-input-overview"
                                                                    multiple="multiple" required>

                                                            </div>
                                                            <input type="hidden" name="student_name"
                                                                value="{{ $Student->name }}">
                                                            <input type="hidden" name="student_id"
                                                                value="{{ $Student->id }}">
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <button type="submit" class="button button-border x-small pull-left">
                                                        {{ trans('Students_trans.submit') }}
                                                    </button>
                                                </form>
                                            </div>
                                        @endcan

                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                            style="text-align:center">
                                            <thead>
                                                <tr class="table-secondary">
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ trans('Students_trans.filename') }}</th>
                                                    <th scope="col">{{ trans('Students_trans.created_at') }}</th>
                                                    <th scope="col">{{ trans('Students_trans.Processes') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Student->images as $attachment)
                                                    <tr style='text-align:center;vertical-align:middle'>
                                                        <td>{{ $loop->iteration }}</td>{{--  --}}
                                                        <td>{{ $attachment->filename }}</td>
                                                        <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                                        {{--  --}}
                                                        <td colspan="2">
                                                            @can('تحميل مرفقات للطلاب')
                                                                <a class="btn btn-outline-info"
                                                                    href="{{ url('Students.Download_attachement') }}/{{ $attachment->imageable->name }}/{{ $attachment->filename }}"
                                                                    role="button"><i class="fa fa-download"></i>&nbsp;
                                                                    {{ trans('Students_trans.Download') }}</a>
                                                            @elsecan('download attachments for students')
                                                                <a class="btn btn-outline-info"
                                                                    href="{{ url('Students.Download_attachement') }}/{{ $attachment->imageable->name }}/{{ $attachment->filename }}"
                                                                    role="button"><i class="fa fa-download"></i>&nbsp;
                                                                    {{ trans('Students_trans.Download') }}</a>
                                                            @endcan

                                                            @can('حذف مرفقات للطلاب')
                                                                <button type="button" class="btn btn-outline-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#Delete_img{{ $attachment->id }}"
                                                                    title="{{ trans('Grades_trans.Delete') }}">{{ trans('Students_trans.delete') }}
                                                                </button>
                                                            @elsecan('Delete attachments for students')
                                                                <button type="button" class="btn btn-outline-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#Delete_img{{ $attachment->id }}"
                                                                    title="{{ trans('Grades_trans.Delete') }}">{{ trans('Students_trans.delete') }}
                                                                </button>
                                                            @endcan

                                                        </td>
                                                    </tr>
                                                    @include('pages.Students.Delete_img')
                                                @endforeach
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
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        $(function() {
            $("#photos").fileinput({
                theme: "fa",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false
            });
        });
    </script>
@endsection
