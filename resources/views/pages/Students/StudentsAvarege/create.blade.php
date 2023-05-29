@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('students_trans.Studentmarks') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('students_trans.Add_Marks') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            {{-- <div class="col-xs-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div> --}}
            <div class="card-body">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('StudentsAvarege.store') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{ trans('students_trans.name') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Student_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
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
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Grade_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('students_trans.classrooms') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" id="Classroom_id" name="Classroom_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        
                                    </select>
                                    @error('Classroom_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('students_trans.section') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" id="section_id" name="Section_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
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
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
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
                                    <input type="number" id="monthlyexam" name="monthlyexam" class="form-control">
                                    @error('monthlyexam')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('students_trans.classworks') }}</label>
                                    <input type="number" id="schoolyearwork" name="schoolyearwork" class="form-control">
                                    @error('schoolyearwork')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('students_trans.Endoftermexam') }}</label>
                                    <input type="number" id="endoftermexam" name="endoftermexam" onchange="calculate()" class="form-control">
                                    @error('endoftermexam')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('students_trans.Total') }}</label>
                                    <input type="number" id="mark" name="mark" class="form-control"  readonly>
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
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                          @foreach ($academic_years as $academic_year)
                                            <option value="{{ $academic_year->id }}">{{ $academic_year->academicyear }}</option>
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
