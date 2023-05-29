@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('students_trans.ListQuizzes') }}
@stop
@endsection
@section('page-header')

<!-- breadcrumb -->
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('students_trans.ListQuizzes') }}
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#"
                        class="default-color">{{ trans('main_siadebar_trans.Home') }}</a>
                </li>
                <li class="breadcrumb-item active"> {{ trans('students_trans.ListQuizzes') }} </li>
            </ol>
        </div>

    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="table-responsive">
                        <div class="widget-search ml-0 clearfix">
                            <i class="fa fa-search"></i>
                            <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                                placeholder="{{ trans('extra_trans.Search_here') }}">
                        </div>
                        <br>
                        <table class="table table-hover table-bordered p-0" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('students_trans.Subj') }}</th>
                                    <th>{{ trans('students_trans.Namequs') }}</th>
                                    <th>{{ trans('students_trans.Entry') }}</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @forelse($quizzes as $quizze)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $quizze->subject->name }}</td>
                                        <td>{{ $quizze->name }}</td>
                                        <td>
                                            @if ($degree && $quizze->id == $degree->quizze_id )
                                            {{ $degree->score  }}
                                            @else
                                                <a  href="{{ route('Student_Exams.show', $quizze->id) }}"
                                                    class="btn btn-outline-success" role="button" aria-pressed="true"
                                                    onclick="alertAbuse()">
                                                    <i class="fa fa-braille" aria-hidden="true"></i></a>
                                                {{-- <i class="fa fa-hourglass-half" aria-hidden="true"></i>  --}}
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="alert-danger text-center" colspan="4">
                                            {{ trans('students_trans.NotData') }}</td>
                                    </tr>
                                @endforelse
                        </table>
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

<script>
    function alertAbuse() {
        alert('برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم الغاء الاختبار بشكل اوتوماتيك');
    }
</script>

@endsection
