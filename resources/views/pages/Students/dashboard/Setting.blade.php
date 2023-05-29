@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    الملف الشخصي
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<h4> الملف الشخصي</h4><br>
<!-- breadcrumb -->
@endsection
@section('content')
{{-- <style>
    img {
        border-radius: 70%;
    }
</style> --}}
<!-- row -->
<div class="card-body">

    <section style="background-color: #eee;">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img class="rounded float-start"  src="{{ URL::asset('attachments/student_images/' . $information->file_name) }}"
                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 style="font-family: Cairo" class="my-3">{{ $information->name }}</h5>
                        <p class="text-muted mb-1">{{ $information->email }}</p>
                        <p class="text-muted mb-4">طالب</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('profile-student.update', $information->id) }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{trans('users_trans.UsernameinArabic')}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="text" name="Name_ar"
                                            value="{{ $information->getTranslation('name', 'ar') }}"
                                            class="form-control">
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{trans('users_trans.UsernameinEnglish')}}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="text" name="Name_en"
                                            value="{{ $information->getTranslation('name', 'en') }}"
                                            class="form-control">
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ trans('parent_trans.Password') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <input type="password" id="password" class="form-control" name="password">
                                    </p><br><br>
                                    <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                        id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">{{ trans('students_trans.Showpassword') }}</label>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success">{{ trans('grades_trans.Edit') }}</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection
