@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Library_trans.ListBooks') }}@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('page-header')
    <!-- breadcrumb -->
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ trans('Library_trans.ListBooks') }}
                </h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#"
                            class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ trans('Library_trans.ListBooks') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    <style>
        .card-img-top {
            width: 100%;
            height: 25vh;
            object-fit: cover;
        }
    </style>
    <section style="background-color: rgb(243, 243, 243);">
        <br>
        <h5 style="color: red">{{ trans('Students_trans.schoollibrary') }}</h5>
        <div class="container py-5">
            
            <div class="row justify-content-center">
                @foreach ($books as $book)
                    <div class="col-md-8 col-l g-6 col-xl-4">
                        <a>
                            <div class="card text-black" style="width: 18rem;">
                                <embed class="card-img-top"
                                    src="{{ URL::asset('attachments/library/' . $book->file_name) }}"
                                    type="application/pdf">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">
                                            {{ $book->title }}</h5>
                                        <p class="text-muted mb-4">{{ trans('Students_trans.infodbooks') }}</p>
                                    </div>
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <span>{{ trans('Students_trans.Grade') }}</span><span>{{ $book->grade->name }}</span>
                                        </div>

                                    </div>

                                </div>
                                <div class="card-body">
                                    <a href="{{ route('student.downloadAttachment', $book->file_name) }}"
                                        class="button btn-block" role="button"
                                        aria-pressed="true">{{ trans('students_trans.Domlowadbooks') }}</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <div>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <div class="float-right">
                                {!! $books->appends(request()->all())->links() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </div>
        </div>

    </section>

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
