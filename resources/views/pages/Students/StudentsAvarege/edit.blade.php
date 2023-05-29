@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('students_trans.Studentmarks') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<h4>{{ trans('students_trans.Add_Marks') }}</h4>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="col-xs-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            </div>
            <div class="card-body">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('StudentsAvarege.update' , $StudentAverage->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="hidden" name="id" value="{{ $StudentAverage->id }}">
                                    <label for="inputCity">{{ trans('students_trans.name') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Student_id">
                                        <option value="{{$StudentAverage->Student_id}}">{{$StudentAverage->student->name}}</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Student_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('students_trans.Grade') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" id="Grade_id" name="Grade_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}" {{$grade->id == $StudentAverage->Grade_id ? 'selected' : ""}}>{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Grade_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('students_trans.Grade') }}</label>
                                    
                                    <select class="custom-select my-1 mr-sm-2" id="Classroom_id" name="Classroom_id">
                                        <option value="{{$StudentAverage->Classroom_id}}">{{$StudentAverage->classroom->name_class}}</option>
                                    </select>
                                    @error('Classroom_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('sections_trans.Name_Section') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" id="section_id" name="section_id">
                                        <option value="{{$StudentAverage->Section_id}}">{{$StudentAverage->section->name_sections}}</option>
                                    </select>
                                    @error('Section_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('students_trans.Subj') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Subject_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{$subject->id == $StudentAverage->Subject_id ? 'selected' : ""}}>{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Subject_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('students_trans.monthlymark') }}</label>
                                    <input type="number" id="monthlyexam" name="monthlyexam" class="form-control" value="{{ $StudentAverage->monthly_exam }}">
                                    @error('monthlyexam')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('students_trans.classworks') }}</label>
                                    <input type="number" id="schoolyearwork" name="schoolyearwork" class="form-control"  value="{{ $StudentAverage->school_year_work }}">
                                    @error('schoolyearwork')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('students_trans.Endoftermexam') }}</label>
                                    <input type="number" id="endoftermexam" name="endoftermexam" onchange="calculate()" class="form-control"  value="{{ $StudentAverage->end_of_term_exam }}">
                                    @error('endoftermexam')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('students_trans.Total') }}</label>
                                    <input type="number" id="mark" name="mark" class="form-control"  readonly  value="{{ $StudentAverage->mark }}">
                                    @error('mark')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                   


                            </div>
                            <br>
                            <div class="form-row">
                           
                                <div class="form-group col">
                                    <label for="academic_year">{{ trans('Students_trans.academic_year') }} : <span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="Academic_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                          @foreach ($academic_years as $academic_year)
                                            <option value="{{ $academic_year->id }}" {{$academic_year->id == $StudentAverage->Academic_id ? 'selected' : ""}}>{{ $academic_year->academicyear }}</option>
                                          @endforeach
                                    </select>
                                    @error('academic_year')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="semester">{{ trans('exams_trans.Semester') }}<span
                                            class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="semester">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        <option selected readonly value="{{$StudentAverage->semester}}">
                                        @if ($StudentAverage->semester === '1')
                                        {{ trans('students_trans.Firstsemester') }}
                                        @else
                                        {{ trans('students_trans.SecondSemester') }}
                                        @endif
                                        </option>
                                            <option value="1">{{ trans('students_trans.Firstsemester') }}</option>
                                            <option value="2">{{ trans('students_trans.SecondSemester') }}</option>
                                    </select>
                                    @error('semester')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
 
                        </div>
                            <br>

                            <button class="btn btn-success nextBtn btn-lg pull-left"
                                type="submit">{{ trans('Teacher_trans.Submit') }}</button>
                        </form>
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
function calculate() {
    var monthlyexam =parseFloat( document.getElementById("monthlyexam").value);
    var schoolyearwork = parseFloat(document.getElementById("schoolyearwork").value);
    var endoftermexam = parseFloat(document.getElementById("endoftermexam").value);
   

    if (typeof endoftermexam === 'undefined' || !endoftermexam) {
        alert('يرجي ادخال علامة الاختبار النهائي ');
    }
    else{
        var total = monthlyexam + schoolyearwork + endoftermexam;
        document.getElementById("mark").value = total;
    }
   
}
</script>
@endsection
