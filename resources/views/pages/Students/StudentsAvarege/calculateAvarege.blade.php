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
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <h5 class="card-title">{{ trans('students_trans.Avgcalculation')}}: <span
                        style="color: red">{{ $studentGet->student->name }}</span></h5>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="tab nav-center">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="research-tab" data-toggle="tab" href="#research"
                                        role="tab" aria-controls="research"
                                        aria-selected="true">{{ trans('students_trans.Avgcalculation')}}</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="design-tab" data-toggle="tab" href="#design" role="tab"
                                        aria-controls="design" aria-selected="false">
                                        الفصل الثاني </a>
                                </li> --}}

                            </ul>

                            <div class="tab-content" id="myTabContent">
                                {{-- Tab2 --}}
                                <div class="tab-pane fade active show" id="research" role="tabpanel"
                                    aria-labelledby="research-tab">
                                    <div class="accordion accordion-border mb-30">
                                        <div class="acd-group acd-active">
                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <div class="card card-statistics h-100">

                                                        <div class="card card-statistics h-100">
                                                            <div class="card-body">
                                                                <div class="col-md-12">
                                                                    <br>
                                                                    <form action="{{ route('Calculatesmesterfirst.store') }}" method="post">
                                                                        @csrf
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">{{ trans('students_trans.NumbersSubject')}}</label>
                                                                                <input type="number" id="numberSubj" name="numberSubj"  class="form-control" >
                                                                                @error('monthlyexam')
                                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">{{ trans('students_trans.totalmarks')}}</label>
                                                                                <input type="number" id="sumMarks" name="sumMarks" onchange="calculate()" class="form-control">
                                                                                @error('monthlyexam')
                                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="col">
                                                                                <label for="title">{{ trans('students_trans.theaverage')}}</label>
                                                                                <input readonly type="number" id="avgMarks" name="avgMarks" class="form-control" >
                                                                                @error('monthlyexam')
                                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="col">
                                                                                <input readonly type="hidden" id="semester" name="semester" class="form-control" value="1">
                                                                                @error('monthlyexam')
                                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                            
                                                                            <input  type="hidden" id="Student_id" name="Student_id" class="form-control" value="{{$studentGet->Student_id  }}">

                                                                        </div>
                                                                        <br>                                                                        <br>
                                                                        {{-- <button class="btn btn-success nextBtn btn-lg pull-left"
                                                                            type="submit">{{ trans('Teacher_trans.Submit') }}</button> --}}
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                {{-- Tab2
                                <div class="tab-pane fade" id="design" role="tabpanel" aria-labelledby="design-tab">
                                    <div class="accordion accordion-border mb-30">
                                        <div class="acd-group acd-active">
                                            <div class="row">
                                                <div class="col-md-12 mb-30">
                                                    <div class="card card-statistics h-100">

                                                        <div class="card card-statistics h-100">
                                                            <div class="card-body">
                                                                <div class="col-md-12">
                                                                    <br>
                                                                    <form action="{{route('Calculatesmesterfirst.store') }}" method="post">
                                                                        @csrf
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <label for="title">مجموع العلامات</label>
                                                                                <input readonly type="number" id="monthlyexam" name="monthlyexam" class="form-control" value="{{ $maekCalculate2 }}">
                                                                                @error('monthlyexam')
                                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="col">
                                                                                <label for="title">المعدل</label>
                                                                                <input readonly type="number" id="Avarege" name="Avarege" class="form-control" value="{{ number_format($maekCalculate_avg2 , 1) }}">
                                                                                @error('monthlyexam')
                                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="col">
                                                                                <input readonly type="hidden" id="semester" name="semester" class="form-control" value="2">
                                                                                @error('monthlyexam')
                                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>
                                                                          

                                                                            <input  type="hidden" id="Student_id" name="Student_id" class="form-control" value="{{$studentGet->Student_id  }}">
                                                                            
                                                                        </div>
                                                                        <br>
                                                                   
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
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
@endsection
@section('js')
@toastr_js
@toastr_render

 <script>
function calculate() {
    var numberSubj = parseFloat(document.getElementById("numberSubj").value);
    var sumMarks = parseFloat(document.getElementById("sumMarks").value);
    var avgMarks = parseFloat(document.getElementById("avgMarks").value);
   

    if (typeof sumMarks === 'undefined' || !sumMarks) {
        alert('يرجي ادخال علامة الاختبار النهائي ');
    }
    else{
        var total = sumMarks / numberSubj;
        document.getElementById("avgMarks").value = total.toFixed(1);
    }
   
}
</script> 
@endsection
